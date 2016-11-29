<template id="tinymce-template">
    <textarea class="wysiwyg" cols="30" rows="10">
        <slot></slot>
    </textarea>
    <!--<div :class="alertClass" role="alert">-->
        <!--<slot></slot>-->
        <!--<button type="button" class="close"  @click="show = false" data-dismiss="alert" aria-label="Close">-->
            <!--<span aria-hidden="true">&times;</span>-->
        <!--</button>-->
    <!--</div>-->
</template>

<script>
    var tinymce = require('tinymce'); // or require

    export default {
        template: '#tinymce-template',

//        props: ['type'],

        bind() {
            tinymce.init({
                selector: `.wysiwyg`,
                theme: 'modern'
            });
        },

//        data() {
//            return {
//                show: true
//            };
//        },
//
//        computed: {
//            alertClass() {
//                var type = this.type;
//
//                return {
//                    'alert ': true,
//                    'alert alert-success': type == 'success',
//                    'alert alert-danger': type == 'error',
//                    'alert alert-warning': type == 'warning',
//                    'alert alert-info': type == 'info',
//                }
//            }
//        },

        mounted() {
            console.log('Component ready.')
        }
    }
</script>
