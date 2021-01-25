const { version } = require('laravel-mix');
const mix = require('laravel-mix');

const path = require("path");

mix.alias({
    "@": path.resolve("resources/js")
})

mix.js('resources/js/app.js', 'public/js')
    .vue({ version: 3 })
    .postCss('resources/css/app.css', 'public/css', [
        require("tailwindcss")
    ]).version();
