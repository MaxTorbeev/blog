<template id="tinymce-template">
    <textarea id="editor" :name="name" v-html="html" class="wysiwyg" cols="30" rows="10"></textarea>
</template>

<script type="text/babel">
    import Editor from 'Libraries/Editor'

    export default {

        props: {
            name: {
                default: '',
                type: String
            },

            html: {
                default: '',
                type: String
            }
        },

        data() {
            return {
                editor: Object
            }
        },

        created() {
            this.editor = new Editor('#editor');
        },
    }
</script>
