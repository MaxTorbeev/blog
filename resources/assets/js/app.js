/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import Vue from 'vue';
import notify from 'Core/Notification';

/**
 * Vue is a modern JavaScript library for building interactive web interfaces
 * using reactive data binding and reusable components. Vue's API is clean
 * and simple, leaving you to focus on building your next great project.
 */

window.Vue = Vue;
window.events = new Vue();

window.flash = function (message, level = 'success') {
    notify.create(message, level).show();
};

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

Vue.component('tinymce', require('./Components/system/ui/TinyMCE.vue'));
Vue.component('delete', require('./Components/global/Delete'));

new Vue({
    el: '#app',
    components: {
    }
});

