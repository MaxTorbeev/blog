export default class Asset {

    /**
     * Загружает ассинхронно стили
     */
    static styleUrl(url) {
        let link = document.createElement("link"),
            isDuplicated = false,
            linkWhereHref = _.filter(document.getElementsByTagName("head")[0].childNodes, {href: location.origin + '/' + url});
        if (linkWhereHref.length > 0)
            isDuplicated = true;
        if (!isDuplicated) {
            link.type = "text/css";
            link.rel = "stylesheet";
            link.href = url;
            document.getElementsByTagName("head")[0].appendChild(link);
        }
    }

    /**
     * Загружаем ассинхронно скрипты.
     *
     * @use Helper.scriptUrl('//api-maps.yandex.ru/2.1/?lang=ru_RU').then(() => { const ymaps = global.ymaps;   });
     * @param url
     * @returns {Promise}
     */
    static scriptUrl(url) {
        if (Array.isArray(url)) {
            let self = this;
            let prom = [];
            url.forEach(function (item) {
                prom.push(self.script(item));
            });
            return Promise.all(prom);
        }

        return new Promise(function (resolve, reject) {
            let r = false;
            let t = document.getElementsByTagName('script')[0];
            let s = document.createElement('script');

            s.type = 'text/javascript';
            s.src = url;
            s.async = true;
            s.onload = s.onreadystatechange = function () {
                if (!r && (!this.readyState || this.readyState === 'complete')) {
                    r = true;
                    resolve(this);
                }
            };
            s.onerror = s.onabort = reject;
            t.parentNode.insertBefore(s, t);
        });
    }

    static xhrResponseUrl(requestType = 'get', url, data = null) {
        return new Promise((resolve, reject) => {
            axios[requestType](url, data)
                .then(function (response) {
                    resolve(response.data);
                })
                .catch(function (error) {
                    notify.error(`${error.response.status} - ${error.response.statusText} in ${error.response.request.responseURL}`);
                    reject(error.response.data);
                });
        });
    }
}