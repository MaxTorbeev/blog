<template id="hits-counter">
    <div class="hits-counter">
        <i class="fa fa-eye"></i> <span>{{hits}}</span>
        <slot></slot>
    </div>
</template>

<script type="text/babel">

    export default {
        template: '#hits-counter',

        data() {
            return {
                hits: '0'
            }
        },

        props: [
            'postId',
            'component',
            'apiUrl'
        ],

        created() {},

        computed: {},

        methods: {
            fetchHitsCount(requestType = 'get') {
                var vm = this;

                axios[requestType]('/' + this.component + '/api/post-hits/' + this.postId)
                        .then(function (response) {
                            vm.hits = response.data;
                        })
                        .catch(function (error) {
                            vm.hits = error.response.statusText;
                        });
            }
        },

        beforeMount() {
            this.hits = this.fetchHitsCount('post');
        },

        mounted() {
            setInterval(() => {
                if (this.hits === this.fetchHitsCount('get')){
                    this.hits = this.fetchHitsCount('get');
                }
            }, 10000)
        },

        beforeDestroy() {}
    }
</script>