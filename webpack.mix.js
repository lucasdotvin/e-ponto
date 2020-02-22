const mix = require('laravel-mix');

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

mix.sass(
    'resources/sass/e-ponto-bulma-theme.scss',
    'public/assets/css'
);

mix.sass(
    'resources/sass/form-page/index.scss',
    'public/assets/css/form-page'
);

mix.copyDirectory(
    'node_modules/@fortawesome/fontawesome-free',
    'public/assets/js/fontawesome'
);

mix.copyDirectory('resources/js', 'public/assets/js');
mix.copyDirectory('resources/img', 'public/assets/img');

if (mix.inProduction()) {
    mix.version();
}
