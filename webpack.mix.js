let mix = require('laravel-mix');

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

mix
  // .js('resources/assets/js/app.js', 'public/js')
  .sass('resources/assets/sass/app.scss', 'public/css');

/*
|-----------------------------------------------------------------------
| BrowserSync
|-----------------------------------------------------------------------
|
| BrowserSync refreshes the Browser if file changes (js, sass, php) are | detected.
| Proxy specifies the location where the app is located.
*/
mix.browserSync({
  proxy: 'http://localhost:8000',
  host: 'dev.host',
  open: true,
  watchOptions: {
    usePolling: true
  }
});