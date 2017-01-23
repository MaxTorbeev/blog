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

<script>
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
        constructor(data) {
            this.originalData = data;

            for (let field in data) {
                this[field] = data[field]
            }

            this.errors = new Errors();
        }

        data(){
            let data = Object.assign({}, this);

            delete data.originalData;
            delete data.errors;

            return data;
        }

        submit(requestType, url){
            axios[requestType](url, this.data())
                .then(this.onSuccess.bind(this))
                .catch(this.onFail.bind(this))
        }

        onSuccess(response){
            alert(response.data.message);
            this.errors.clear();
            this.reset();
        }

        onFail(error){
            this.errors.record(error.response.data);
        }

        reset() {
            for (let field in this.originalData){
                this[field] = null
            }
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
                this.form.submit('post', '/tags');
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
