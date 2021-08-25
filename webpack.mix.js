const mix = require("laravel-mix");

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

mix.styles(
    [
        "public/libs/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css",
        "public/libs/select2/css/select2.min.css",
        "public/libs/sweetalert2/sweetalert2.min.css",
        "public/libs/toastr/build/toastr.min.css",
        "public/css/bootstrap.min.css",
        "public/css/icons.min.css",
        "public/css/filepond.min.css",
        "public/css/filepond-plugin-image-preview.min.css",
        "public/css/style.css",
        "public/css/preloading.css",
    ],
    "public/css/app.css"
);
