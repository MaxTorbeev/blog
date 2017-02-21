<template id="tinymce-template">
    <textarea id="editor" :name="name" class="wysiwyg" cols="30" rows="10">
        <slot></slot>
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

            tinymce.init({
                selector            : '#editor',
                height              : 700,
//                document_base_url   : "/",
                plugins             : [
                                        'advlist autolink lists link image charmap print preview anchor',
                                        'searchreplace visualblocks code fullscreen codesample',
                                        'insertdatetime media table contextmenu paste code link'
                                       ],
                toolbar             : 'codesample | undo redo | link image | code | link | insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | ',

                codesample_languages: [
                    {text: 'HTML/XML', value: 'markup'},
                    {text: 'JavaScript', value: 'javascript'},
                    {text: 'CSS', value: 'css'},
                    {text: 'PHP', value: 'php'},
                    {text: 'Ruby', value: 'ruby'},
                    {text: 'Python', value: 'python'},
                    {text: 'Java', value: 'java'},
                    {text: 'C', value: 'c'},
                    {text: 'C#', value: 'csharp'},
                    {text: 'C++', value: 'cpp'}
                ],

                image_title         : true,                    // enable title field in the Image dialog
                automatic_uploads   : true,
                images_upload_url   : '/postAcceptor.php',
                file_picker_types   : 'image',                 // here we add custom filepicker only to Image dialog
                // and here's our custom image picker
                file_picker_callback: function(cb, value, meta) {
                    var input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.setAttribute('accept', 'image/*');

                    // Note: In modern browsers input[type="file"] is functional without
                    // even adding it to the DOM, but that might not be the case in some older
                    // or quirky browsers like IE, so you might want to add it to the DOM
                    // just in case, and visually hide it. And do not forget do remove it
                    // once you do not need it anymore.

                    input.onchange = function() {
                        var file = this.files[0];

                        // Note: Now we need to register the blob in TinyMCEs image blob
                        // registry. In the next release this part hopefully won't be
                        // necessary, as we are looking to handle it internally.
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        var blobInfo = blobCache.create(id, file);
                        blobCache.add(blobInfo);

                        // call the callback and populate the Title field with the file name
                        cb(blobInfo.blobUri(), {
                            title: file.name
                        });
                    };

                    input.click();
                }
            });
        },

        beforeDestroy: function(){
            tinymce.remove()
        }
    }
</script>
