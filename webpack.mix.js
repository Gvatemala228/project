const mix = require('laravel-mix');

mix.css('resources/css/style.css','public/css')
mix.copyDirectory('vendor/tinymce/tinymce', 'public/js/tinymce')
mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();
