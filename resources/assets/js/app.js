/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */


var Alert = require('./components/system/ui/Alert.vue');
var Editor = require('./components/system/ui/TinyMCE.vue');

window.VueTinyMCE = {};
VueTinyMCE.install = function (Vue) {
    Vue.component('tinymce', require('./components/system/ui/TinyMCE.vue'));
}


Vue.component('form-table', require('./components/system/forms/form-table.vue'));
Vue.component('menu-items', require('./components/dashboard/menu/Menu.vue'));
Vue.component('menu-types-form', require('./components/dashboard/menu/MenuTypesForm.vue'));

new Vue({
    el: '#app',
    components: {
        'alert' : Alert,
        'editor' : Editor
    }
});

