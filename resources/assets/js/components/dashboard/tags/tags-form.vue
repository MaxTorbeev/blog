<template id="tagsForm-template">
    <div>
        <form @submit.prevent="onSubmit" @keydown="errors.clear($event.target.name)">

            <div class="form-group">
                <label class="form-control-label">Новый тег</label>
                <input type="text" name="name" class="form-control" placeholder="Новый тег" v-model="name">
                <small class="form-text text-muted" v-if="errors.has('name')" v-text="errors.get('name')"></small>
            </div>

            <div class="form-group">
                <input type="text" name="alias" class="form-control form-control-sm" v-model="alias">
                <small class="form-text text-muted" v-text="errors.get('alias')"></small>
            </div>
            
            <div class="form-group">
                <textarea name="description" class="form-control form-control-sm" v-model="description"></textarea>
            </div>

            <input type="submit" class="btn btn-success" value="Сохранить" :disabled="errors.any()">

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
            console.log(field);
            delete this.errors[field];
        }
    }

    export default {
        template: '#tagsForm-template',

        props: [
            'action',
        ],

        data() {
            return {
                name: '',
                alias: '',
                description: '',
                errors: new Errors()
            }
        },

        methods: {
            onSubmit() {
                axios.post('/tags', this.$data)
                    .then(this.onSuccess)
                    .catch(error => this.errors.record(error.response.data))
            },

            onSuccess(response){
                alert(response.data.message);

                this.name = '';
                this.alias = '';
                this.description = '';
            }
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
