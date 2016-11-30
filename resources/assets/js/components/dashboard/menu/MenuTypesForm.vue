<template id="form-template">
    <div class="form-table input-group">
        <div class="tr">
            <form action="" method="POST" >
                <div class="td" v-for="(field, index) in fieldList">
                    <span class="input-group-addon input-group-addon-sm">{{ getLabel(field, index) }}</span>

                    <input-select v-if="field.type == 'select'" :name="index" :optionsList="getSelectOptions(field)">Yes</input-select>
                    <input v-if="getInputTile(field)" :type="getInputTile(field)" :name="index" class="form-control form-control-sm" :value="field">
                </div>
                <div class="td">
                    <button type="submit" class="btn btn-primary btn-block" @click.prevent="send">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        template: '#form-template',
        props: [
            'id',
            'action',
        ],
        data() {
            return {
                fieldList: []
            }
        },
//        components: [Alert],

        created() {
            this.fieldList = this.fetchFieldList();
        },

        methods: {
            fetchFieldList() {
                var vm = this;
                var resource = vm.$resource(this.action + '{/id}');

                resource.get({id:this.id})
                        .then(function(response){
                            vm.fieldList = response.body
                        });
            },

            getLabel(item, index) {
                return (item.label ? item.label : index)
            },

            getInputTile(field) {
                if (field.type == 'text'
                    || field.type == 'email'
                    || field.type == 'password'
                    || field.type == 'submit'
                    || field.type == 'reset'
                    || field.type == 'radio'
                    || field.type == 'checkbox'
                    || field.type == 'button'
                ) {
                    return field.type
                } else {
                    return false;
                }
            },

            getSelectOptions(filed){
                return filed.options ? filed.options : false;
            },

            send() {
                this.$http.post(this.action, this.$data)
                    .then(function(response) {
                        swal("Good job!", response.body, "success")
                        console.log(response.body)
                    });
            },
        },

        computed: {

        }

    }
</script>
