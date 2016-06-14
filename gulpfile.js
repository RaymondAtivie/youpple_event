var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss')
    .version('public/css/all.css');

    mix.styles([
        'app.css',
        'bootstrap.css',
        'bootstrap-datetimepicker.css',
        'bootstrap-nav.css',
        'font-awesome.min.css',
        'jquery.bxslider.css',
        'owl.carousel.css',
        'prettyPhoto.css',
        'responsive.css',
        'select2.min.css'
    ], null, 'public/css');
});
