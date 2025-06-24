const mix = require('laravel-mix');


mix.webpackConfig({
    output: {
        path:__dirname+'/../../dist/admin',
    }
});

//mix.setPublicPath('../dist/admin');

mix.sass('scss/app.scss', 'css')
mix.js('js/app.js','js').extract(['vue']).vue({ version: 2 });
