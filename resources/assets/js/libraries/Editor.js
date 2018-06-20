import NativeComponent from '../core/NativeComponent';
import Asset from '../core/Asset';

class Editor extends NativeComponent {

    init() {
        if (window.tinymce)
            this.getEditor();
        else
            Asset.scriptUrl('/editor/tinymce/tinymce.min.js').then(() => this.getEditor());
    }

    getEditor() {
        tinymce.init({
            baseURL: "/editor/tinymce/",
            document_base_url: '/',
            selector: this.selector,
            language: 'ru',
            height: '480',
            content_css: `${window.location.origin}/css/reboot.css, ${window.location.origin}/css/app.css`,

            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen codesample',
                'insertdatetime media table contextmenu paste code link imageupload'
            ],

            toolbar: 'codesample | undo redo | link image | code | link | insertfile undo redo | styleselect | bold italic ' +
            '| alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | imageupload ',

            codesample_languages: [
                {text: 'HTML/XML', value: 'markup'},
                {text: 'JavaScript', value: 'javascript'},
                {text: 'CSS', value: 'css'},
                {text: 'PHP', value: 'php'}
            ],



            relative_urls: false,
            remove_script_host: true
        });
    }
}

document.addEventListener("DOMContentLoaded", () => {
    new Editor('textarea#editor')
});