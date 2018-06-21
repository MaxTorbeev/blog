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
                axios[requestType]('/' + this.component + '/api/post-hits/' + this.postId)
                        .then((response) =>  this.hits = response.data)
                        .catch((error) => vm.hits = error.response.statusText);
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
    }
</script>