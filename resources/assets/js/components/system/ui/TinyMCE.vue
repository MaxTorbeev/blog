<template id="tinymce-template">
    <textarea id="editor" :name="name" v-text="this.$slots.default[0].text" class="wysiwyg" cols="30" rows="10">
    </textarea>
</template>

<script>
    var tinymce = require('tinymce'); // or require
    require('tinymce');

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

            tinymce.baseURL = "/editor";
            tinymce.document_base_url = '/';

            tinymce.init({
                selector            : '#editor',
                skin_url            : window.location.origin + '/editor/skins/lightgray/',
                plugin_url          : window.location.origin + '/editor/plugins/',
                height              : 650,
                plugins             : [
                                        'advlist autolink lists link image charmap print preview anchor',
                                        'searchreplace visualblocks code fullscreen codesample',
                                        'insertdatetime media table contextmenu paste code link imageupload'
                                       ],
                toolbar             : 'codesample | undo redo | link image | code | link | insertfile undo redo | styleselect | bold italic ' +
                                      '| alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | imageupload ',

                codesample_languages: [
                    {text: 'HTML/XML', value: 'markup'},
                    {text: 'JavaScript', value: 'javascript'},
                    {text: 'CSS', value: 'css'},
                    {text: 'PHP', value: 'php'}
                ],

                content_css: [
                    '/css/app.editor.css',
                ],

                relative_urls: false,

            });
        },

        beforeDestroy: function(){
            tinymce.remove()
        }
    }
</script>
