<template id="menu-template">
    <div>
        <h1>Menu</h1>
        <ul v-for="item in menuItems">
            <li>
                {{ item.title }}
                <strong @click="deleteItem(item)">x</strong>
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
            this.fetchMenuList();
        },

        methods: {
            fetchMenuList() {
                var vm = this;
                var resource = vm.$resource('/admin/manage-menus/api/');

                resource.get({id : 5})
                    .then(function(response){
                        vm.menuItems = response.body
                    });
            },
            deleteItem(item) {
                var index = this.menuItems.indexOf(item);
                this.menuItems.splice(index, 1);
            }
        },
        computed: {},

        mounted() {
            console.log('Component Menu ready.')
        }
    }
</script>
