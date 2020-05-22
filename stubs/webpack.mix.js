const mix = require("laravel-mix");

mix
    .js("resources/js/app.js", "public/js/app.js")
    .postCss("resources/css/app.css", "public/css/app.css", [
        require('autoprefixer'),
        require('postcss-import'),
        require('postcss-nested'),
        require('postcss-url'),
        require('tailwindcss')('tailwind.config.js'),
    ])
    .sourceMaps();

if (mix.inProduction()) {
    mix.version();
} else {
    mix.browserSync({
        notify: false,
        open: false,
        proxy: __dirname.split('/').pop() + '.test',
    })
}
