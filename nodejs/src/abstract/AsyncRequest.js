class AsyncRequest {

    /**
     * Получение данных из запроса
     * @param {*} url string
     * @param {*} method GET, POST
     * @param {*} body object
     * @param {*} headers object
     * @returns Promise
     */
    async getData(url, method, body = null, headers) {
        let fetchInit = this.#setFetchInit(method, body, headers);

        if (!this.#isURL(url)) {
            throw new Error(`Error: ${url} is not url`);
        }

        let response = await fetch(url, fetchInit);

        let result = this.#checkErrors(response);

        return result;
    }

    /**
     * Возвращает объект с данными для запроса
     * @param {*} method string
     * @param {*} body object
     * @param {*} headers object
     * @returns object
     */
    #setFetchInit(method, body, headers) {
        headers = (!headers) ? {"Content-Type": "application/json"} : headers;
        body = (!body) ? null : JSON.stringify(body);

        let fetchInit = {
            method: method,
            headers: headers
        };

        if (method != "GET" && method != "HEAD") {
            fetchInit["body"] = body;
        }

        return fetchInit;
    }

    /**
     * Проверка запроса на ошибки
     * @param {*} response 
     * @returns Promise
     */
    async #checkErrors(response) {
        if (response.ok) {
            return await response.json();
        }
        // Недостижимый код?
        throw new Error(`
			Error status: ${response.status}
			Error text: ${response.statusText}
	 	`);
    }

    /**
     * Проверка на URL
     * @param {*} str string
     * @returns boolean
     */
    #isURL(str) {
        let url = new RegExp("^(http|https)://", "i");

        return str.length < 2083 && url.test(str);
    }

}
  