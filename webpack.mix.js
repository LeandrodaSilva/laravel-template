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

mix.js('resources/js/app.js', 'public/js')
    .webpackConfig(require('./webpack.config'))
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ]);

mix.copy( 'resources/images/public', 'public/images', false);
mix.js('resources/js/service-worker.js', 'public')
mix.js('resources/js/workbox-c0c7782e.js', 'public')

if (mix.inProduction()) {
    mix.version();
}

mix.browserSync('localhost:8000');
