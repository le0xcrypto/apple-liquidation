const path = require('path');
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

mix
    .disableNotifications() // Disable OS notifications
    .options({
        terser: {extractComments: false}, // Disable extract of licences
    })
    .postCss('resources/css/app.css', 'public/css', [
        require('@tailwindcss/jit'),
    ])
    .js('resources/js/app.js', 'public/js').vue({version: 3})
    .webpackConfig({
        // TODO
        //output: {chunkFilename: 'js/[name].js[hash]'},
        resolve: {
            alias: {
                '@': path.resolve('resources/js'),
                vue: path.resolve('node_modules', 'vue'),
            },
        },
    })
    .version()
    .sourceMaps();
