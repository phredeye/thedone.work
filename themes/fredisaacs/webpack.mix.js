const mix = require('laravel-mix')

mix.js('js/app.js', '../../public/js')
    .sass('scss/app.scss', '../../public/css');

