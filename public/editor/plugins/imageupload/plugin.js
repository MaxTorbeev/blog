tinymce.PluginManager.add('imageupload', function(editor, url) {
    editor.addButton('imageupload', {
        tooltip: 'Upload an image',
        icon : 'image',
        text: 'Upload',
        onclick: function() {
            editor.windowManager.open({
                title: 'Upload an image',

                //change this route to the one that returns the 'image-dialog.blade.php' file as a view
                file : '/admin/editor/upload-image',
                width : 600,
                height: 600,
                buttons: [
                    {
                        text: 'Close',
                        onclick: 'close'
                    }]
            });
        }
    });
});