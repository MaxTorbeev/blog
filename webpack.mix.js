const {mix} = require('laravel-mix');
const path = require('path');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.dashboard.scss', 'public/css')
    .sass('resources/assets/sass/app.editor.scss', 'public/css')
    .sass('resources/assets/sass/reboot.scss', 'public/css')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .webpackConfig({
        resolve: {
            alias: {
                Components: path.resolve(__dirname, 'resources/assets/js/Components'),
                Core: path.resolve(__dirname, 'resources/assets/js/Core'),
                Libraries: path.resolve(__dirname, 'resources/assets/js/Libraries')
            }
        }
    });
