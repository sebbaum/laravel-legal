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
  .js('resources/assets/js/legal.js', 'public/js')
  .sass('resources/assets/sass/legal.scss', 'public/css')
  .copyDirectory('public/js', '../../laravel/public/vendor/legal/js') // for development only
  .copyDirectory('public/css', '../../laravel/public/vendor/legal/css'); // for development only

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