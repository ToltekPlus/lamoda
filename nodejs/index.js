const http = require('http')
const port = 8080
const apiUrl = 'http://php:80/api/'

// Получим данные из api
// Для этого http.get обернем
const apiFetch = () => {
    return new Promise((resolve, reject) => {

        // документация => https://nodejs.org/api/http.html#http_http_get_options_callback
        http.get(apiUrl, res => {
            const contentType = res.headers['content-type']
            let error
            let data = ''

            if (res.statusCode !== 200) {
                error = new Error('api error / statusCode: ' + res.statusCode)
            } else if (!/^application\/json/.test(contentType)) {
                error = new Error('api error / contentType: ' + contentType)
            }

            if (error) {
                console.error(error.message)
                res.resume()
                reject(error)
            }

            res.setEncoding('utf-8')
            res.on('data', chunk => { data += chunk })
            res.on('end', () => {
                try {
                    const apiJson = JSON.parse(data)
                    console.log('api success / apiJson: ', apiJson)
                    resolve(apiJson)
                } catch (e) {
                    console.error('api error / response: ', e.message)
                    reject(e.message)
                }
            })
        }).on('error', e => {
            console.error('api error / get: ', e.message)
            reject(e.message)
        })
    })
}

// html вызовем через строку
const htmlTemplateCreate = htmlString => `<!DOCTYPE html>
<html>
<head>
  <title>Test</title>
  <meta charset="utf-8">
</head>
<body>
  <div id="client-list">
    <h2>Работа клиентской части</h2>
  </div>
  <div id="server-list">
    <h2>А вот и серверная часть</h2>
    ${htmlString}
  </div>
  <script src="/static/scripts.js"></script>
</body>
</html>`

// Получаем данные из json
const htmlListCreate = json => {
    let htmlListString = '<ul>'
    json.map(entry => {
        htmlListString += `<li>
  <img src="${entry.img}" width="150px">
</li>`
    })
    htmlListString += '</ul>'
    return htmlListString
}

// Сервер работает
const server = http.createServer((req, res) => {
    console.log('request: ' + req)
    res.writeHead(200, { 'Content-Type': 'text/html' })

    // Запрос к апи
    apiFetch().then(json => {
        res.write(htmlTemplateCreate(htmlListCreate(json)))
        res.end()
    }).catch(error => {
        res.write(htmlTemplateCreate(`<p>${error}</p>`))
        res.end()
    })
})

server.listen(port)
console.log('Сервер стартанул на http://localhost:' + port + '/')