class AsyncRequest {
	//TODO: доставать данные из promise(пока что доступ к данным только через .then())
    async getData(url, method, body = null, headers) {
        let fetchInit = this.#setFetchInit(method, body, headers);

        if (!this.#isURL(url)) {
            throw new Error(`Error: ${url} is not url`);
        }

        let response = await fetch(url, fetchInit);

        let result = this.#checkErrors(response);

        return result;
    }

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

    async #checkErrors(response) {
        if (response.ok) {
            return await response.json();
        }

        throw new Error(`
			Error status: ${response.status}
			Error text: ${response.statusText}
	 	`);
    }

    #isURL(str) {
        let url = new RegExp("^(http|https)://", "i");

        return str.length < 2083 && url.test(str);
    }

}
  