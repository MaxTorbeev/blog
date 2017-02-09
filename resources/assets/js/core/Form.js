import Errors from './Errors';

class Form {

    /**
     * Create a new Form instance.
     *
     * @param data
     */
    constructor(data) {
        this.originalData = data;

        for (let field in data) {
            this[field] = data[field]
        }

        this.errors = new Errors();
    }

    posr(url){
        return this.submit('POST', url)
    }

    delete(url){
        return this.submit('DELETE', url)
    }

    /**
     * Fetch all relevants data for the form.
     *
     * @returns {*|void}
     */
    data(){
        let data = {}

        for(let property in this.originalData){
            data[property] = this[property];
        }

//            let data = Object.assign({}, this);
//
//            delete data.originalData;
//            delete data.errors;

        return data;
    }

    /**
     * Submit the form.
     *
     * @param {string} requestType
     * @param {string} url
     */
    submit(requestType, url){
        return new Promise((resolve, reject) => {
            axios[requestType](url, this.data())
                .then(response => {
                    this.onSuccess(response.data);

                    resolve(response.data);
                })
                .catch(error => {
                    this.onFail(error.response.data);

                    reject(error.response.data);
                })
        });
    }

    /**
     * Handle a successful form submission.
     *
     * @param {object} data
     */

    onSuccess(data){
        alert(data.message);

        this.reset();
    }

    /**
     * Handle a failed form submission.
     *
     * @param {object} errors
     */
    onFail(errors){
        this.errors.record(errors);
    }

    /**
     * Reset the form fields.
     */
    reset() {
        for (let field in this.originalData){
            this[field] = null
        }

        this.errors.clear();

    }
}

export default Form;