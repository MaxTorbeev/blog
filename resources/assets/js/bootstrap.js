window._ = require('lodash');
window.Popper = require('popper.js').default;

window.rusToLat = require('translitit-cyrillic-russian-to-latin');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */
try {
    window.$ = window.jQuery = require('jquery');
    require('bootstrap');
} catch (e) {
    console.log(e);
}


/**
 * Sweet alert
 * @link: http://t4t5.github.io/sweetalert/
 */
// window.swal = require('sweetalert');

/**
 * Dropzone js
 * @link: http://dropzonejs.com/
 */
// window.Dropzone = require("./components/dropzone/dropzone");
//
// require("./components/select2/select2");
// require("./components/swiper/swiper");
// require("./vendor/prism");

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */
window.axios = require('axios');

window.axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest',
    'xsrfHeaderName': Laravel.csrfToken
};