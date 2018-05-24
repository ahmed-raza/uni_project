let mix = require('laravel-mix');

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

mix.scripts([
    'resources/assets/js/app.js',
    'resources/assets/js/select2.min.js',
    'resources/assets/ckeditor/ckeditor.js',
    'resources/assets/colorbox/jquery.colorbox-min.js',
    'resources/assets/flexslider/jquery.flexslider.js',
    'resources/assets/js/custom.js',
  ], 'public/js/all.js');
mix.styles([
    'resources/assets/css/app.css',
    'resources/assets/flexslider/flexslider.css',
    'resources/assets/css/style.css',
    'resources/assets/css/select2.min.css',
    'resources/assets/css/select2-bootstrap.min.css',
    'resources/assets/colorbox/colorbox.css',
], 'public/css/all.css');
