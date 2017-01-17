<template id="modal-template">

    <div class="modal-component">
        <div class="modal show" style="display: block;">
            <div class="modal-dialog" style="display: block;" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <slot name="header"></slot>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <slot>
                            Default content hear
                        </slot>
                    </div>
                    <div class="modal-footer">
                        <slot name="footer">
                            <button type="button" class="btn btn-primary">Save changes</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </slot>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>

    export default {
        template: '#modal-template',

        props: [
            'name'
        ],

        created() {
            tinymce.init({
                selector:'#editor',
            });
        },

        beforeDestroy: function(){
            tinymce.remove()
        }
    }
</script>