<template>
    <div>
        <textarea></textarea>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('TinyMCE component ready.')
        }
    }
</script>

<!--<template id="tinymce-template">-->
    <!--<textarea id="editor" class="wysiwyg" cols="30" rows="10">-->
        <!--<slot></slot>-->
    <!--</textarea>-->
<!--</template>-->

<!--<script>-->
    <!--var tinymce = require('tinymce'); // or require-->

    <!--export default {-->
        <!--template: '#tinymce-template',-->

        <!--props: ['name'],-->

<!--//        bind() {-->
<!--//            tinymce.init({-->
<!--//                selector: `editor`,-->
<!--//                theme: 'modern'-->
<!--//            });-->
<!--//        },-->

        <!--mounted() {-->
            <!--tinymce.init({-->
                <!--selector: 'editor',-->
                <!--theme: 'modern'-->
            <!--});-->
        <!--}-->
    <!--}-->
<!--</script>-->
