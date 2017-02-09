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

    import Form from '../../../core/Form';

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
