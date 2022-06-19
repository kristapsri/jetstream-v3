const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');
const path = require("path");

const assetPath = 'resources/assets';
const publicPath = 'public/';

const sassSource = assetPath + '/sass/';
const jsSource = assetPath + '/js/';

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

mix.setPublicPath(publicPath);

mix.webpackConfig({
    resolve: {
        alias: {
            '@Components': path.resolve('resources/assets/js/Components'),
            '@Layouts': path.resolve('resources/assets/js/Layouts'),
            '@Pages': path.resolve('resources/assets/js/Pages'),
        },
    },
});

/* JS */
mix.js(jsSource + 'app.js', 'js').vue();

/* SASS */
mix.sass(sassSource + 'app.scss', 'css')
    .options({
        postCss: [
            tailwindcss('./tailwind.config.js'),
        ],
    });

if (mix.inProduction()) {
    mix.version();
}
