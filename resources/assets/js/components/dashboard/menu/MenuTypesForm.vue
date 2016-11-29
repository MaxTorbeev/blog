<template id="form-template">
    <div class="form-table input-group">
        <div class="tr">
            <form action="" method="POST" >
                <div class="td" v-for="(field, index) in fieldList">
                    <span class="input-group-addon input-group-addon-sm">{{ index }}</span>
                    <input type="text" :name="index" class="form-control form-control-sm" :value="field">
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

        created() {
            this.fieldList = this.fetchFieldList();

            console.log(this.id)
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
            send() {
//                var requestType = this.getRequestType();
//                this.$http[requestType](this.el.action)
                this.$http.post(this.action, this.$data)
                        .then(function(response) {
                            swal("Good job!", response.body, "success")
                            console.log(response.body)
                        });
            },

//            getRequestType: function() {
//                var method = this.el.querySelector('input[name="_method"]');
//
//                return (method ? method.value : this.el.method).toLowerCase();
//            },
        }

    }
</script>
