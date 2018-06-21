<template id="alert-template">
    <div :class="alertClass" role="alert">
        <slot></slot>
        <button type="button" class="close"  @click="show = false" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</template>

<script>
    export default {
        template: '#alert-template',

        props: ['type'],

        data() {
            return {
                show: true
            };
        },

        computed: {
            alertClass() {
                var type = this.type;

                return {
                    'alert ': true,
                    'alert alert-success': type == 'success',
                    'alert alert-danger': type == 'error',
                    'alert alert-warning': type == 'warning',
                    'alert alert-info': type == 'info',
                }
            }
        },

        mounted() {
            console.log('Component ready.')
        }
    }
</script>
