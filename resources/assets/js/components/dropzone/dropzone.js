window.Dropzone = require("dropzone");

Dropzone.options.addPhotoForm = {
    paramName: 'photo',
    maxFilesize: 3,
    acceptedFiles: '.jpg, .jpeg, .png'
};
