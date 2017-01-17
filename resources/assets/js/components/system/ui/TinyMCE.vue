<template id="tinymce-template">
    <textarea id="editor" name="name" class="wysiwyg" cols="30" rows="10">
        <slot></slot>
    </textarea>
</template>

<script>
    var tinymce = require('tinymce'); // or require

    require('tinymce/themes/modern/theme');
    require('tinymce/plugins/paste/plugin');
    require('tinymce/plugins/link/plugin');
    require('tinymce/plugins/autoresize/plugin');

    export default {
        template: '#tinymce-template',

        props: [
            'name'
        ],

        created() {
            console.log(this.name);
            tinymce.init({
                selector:'#editor',
            });
        },

        computed: {
            name() {
                return this.name;
            }
        },

        beforeDestroy: function(){
            tinymce.remove()
        }
    }
</script>
