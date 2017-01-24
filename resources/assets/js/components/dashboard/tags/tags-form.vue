<template id="tagsForm-template">
    <div>
        <form @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">

            <div class="form-group">
                <label class="form-control-label">Новый тег</label>
                <input type="text" name="name" class="form-control" placeholder="Новый тег" v-model="form.name">
                <small class="form-text text-muted" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></small>
            </div>

            <div class="form-group">
                <input type="text" name="alias" class="form-control form-control-sm" v-model="form.alias">
                <small class="form-text text-muted" v-text="form.errors.get('alias')"></small>
            </div>
            
            <div class="form-group">
                <textarea name="description" class="form-control form-control-sm" v-model="form.description"></textarea>
            </div>

            <input type="submit" class="btn btn-success" value="Сохранить" :disabled="form.errors.any()">

        </form>
    </div>
</template>

<script type="text/babel">
    class Errors {
        constructor() {
            this.errors = {};
        }

        get(field) {
            if(this.errors[field]){
                return this.errors[field][0]
            }
        }

        record(errors) {
            this.errors = errors;
        }

        has(field){
            return this.errors.hasOwnProperty(field)
        }

        any(){
            return Object.keys(this.errors).length > 0;
        }

        clear(field) {
            if (field){
                delete this.errors[field];

                return;
            }

            this.errors = {};
        }
    }

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

    export default {
        template: '#tagsForm-template',

        props: [
            'action',
        ],

        data() {
            return {
                form: new Form({
                    name: '',
                    alias: '',
                    description: '',
                }),
            }
        },

        methods: {
            onSubmit() {
                this.form.submit('post', '/tags')
                        .then(data => console.log(data))
                        .catch(errors => console.log(errors))
            },
        },

        watch: {
            name(value){
                this.alias = rusToLat(value);
            }
        },

        mounted() {
            console.log('Component ready.')
        }
    }
</script>
