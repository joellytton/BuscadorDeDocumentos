const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js').postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);


mix.styles([
    'public/assets/css/bootstrap.min.css',
    'public/assets/css/style.css',
    'public/assets/css/owl.carousel.min.css',
    'public/assets/css/owl.theme.default.min.css',
    'public/assets/css/font-awesome.min.css',
    'public/assets/css/themify-icons.css',
    'public/assets/css/ionicons.min.css',
    'public/assets/css/et-line.css',
    'public/assets/css/feather.css',
    'public/assets/css/metisMenu.css',
    'public/assets/css/slicknav.min.css',
    'public/assets/css/feather.css',
    'node_modules/toastr/build/toastr.css',
    'public/assets/vendors/sweetalert2/css/sweetalert2.min.css',
    'public/assets/vendors/select2/css/select2.min.css',
    'resources/css/style.css'
], 'public/css/all.css');

mix.combine([
    'public/assets/js/jquery.min.js',
    'public/assets/js/popper.min.js',
    'public/assets/js/bootstrap.min.js',
    'public/assets/js/owl.carousel.min.js',
    'public/assets/js/metisMenu.min.js',
    'public/assets/js/jquery.slimscroll.min.js',
    'public/assets/js/jquery.slicknav.min.js',
    'public/assets/js/modernizr-2.8.3.min.js',
    'public/assets/js/main.js',
    'node_modules/toastr/build/toastr.min.js',
    'public/assets/vendors/sweetalert2/js/sweetalert2.all.min.js',
    'public/assets/vendors/jquery-mask/jquery.mask.min.js',
    'resources/js/delete.js',
    'resources/js/submitForm.js',
    'resources/js/mascaras.js',
    'public/assets/vendors/select2/js/select2.min.js',
    'resources/js/selects.js'
], 'public/js/all.js');
