<template id="menu-template">
    <div>
        <h1>Menu</h1>
        <ul v-for="item in menuItems">
            <li>
                {{ item.title }}
            </li>
        </ul>

    </div>

</template>

<script>
    export default {
        template: '#menu-template',

        data() {
            return {
                menuItems: []
            }
        },

        created() {
            var vm = this;

            this.$http.get('/admin/manage-menu/api')
                .then(function(response){
                    vm.menuItems = response.body
                });
        },

        methods: {
            deleteMenuItem(){

            }
        },
        computed: {},
//        mounted() {
//            console.log('Component Menu ready.')
//        }
    }
</script>
