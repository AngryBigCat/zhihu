let mix = require('laravel-mix');
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
   .sass('resources/assets/sass/app.scss', 'public/css').version();

mix.webpackConfig({
    resolve: {
        alias: {
            'components': 'assets/js/components'
        },
        modules: [
            'node_modules',
            path.resolve(__dirname, "resources")
        ]
    }
});

mix.browserSync('homestead.app');
