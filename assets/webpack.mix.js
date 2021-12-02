const mix = require('laravel-mix');
require('@tinypixelco/laravel-mix-wp-blocks');

mix.setPublicPath('dist').browserSync(':package_name.test').options({
  processCssUrls: false,
});

mix.sass('src/scss/main.scss', 'css', {
  sassOptions: {
    file: 'styles.css',
    outputStyle: 'expanded',
  },
});

mix
  .js('src/js/index.js', 'js')
  .autoload({jquery: ['$', 'window.jQuery']})
  .extract();

mix.sourceMaps().version();
