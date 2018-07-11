<template>
    <div>
        <a href="#" class="btn btn-sm btn-danger" @click.prevent="deleteItem()">
            <slot></slot>
        </a>

        <form action="#" method="POST" v-show="false">
            <input type="hidden" name="_method" value="DELETE">
        </form>
    </div>
</template>

<script>
    export default {
        props: [
            'action',
            'is-reload-page',
            'execute-event'
        ],
        data() {
            return {
                body: '',
                show: false,
                events: []
            }
        },

        methods: {
            deleteItem() {
                if (confirm('Вы действительное хотите удалить?')) {
                    axios({method: 'delete', url: this.action,})
                        .then((response) => {
                            events.$emit(this.executeEvent, response);
                            if (this.isReloadPage !== false || this.isReloadPage === undefined) location.reload();
                        });
                }
            }
        },
    }
</script>
