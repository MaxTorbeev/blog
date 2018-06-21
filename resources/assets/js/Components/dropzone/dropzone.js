window.Dropzone = require("dropzone");

Dropzone.options.addPhotoForm = {
    paramName: 'photo',
    maxFilesize: 3,
    acceptedFiles: '.jpg, .jpeg, .png',
    //error(file, response) {
    //   console.error(file + '-' + response)
    //},
    //success(file, response, action) {
    //    console.info(file + '-' + response)
    //}
};
