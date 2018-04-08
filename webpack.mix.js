let mix = require('laravel-mix');

mix.browserSync('localhost:8000');
mix.options({processCssUrls: false});
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

mix.sass('resources/assets/sass/style.scss','public/css')
	.sass('resources/assets/sass/menu.scss','public/css')
	.js('resources/assets/js/lib.js','public/js')
	.scripts([
		'node_modules/jquery/dist/jquery.min.js',
		'node_modules/bootstrap/dist/js/bootstrap.min.js',
		'node_modules/owl.carousel/dist/owl.carousel.min.js',
		'public/js/lib.js'
	],
	'public/js/vendor.min.js')
// Include bootstrap css
	.styles([
		'node_modules/bootstrap/dist/css/bootstrap.min.css',
		'node_modules/owl.carousel/dist/assets/owl.carousel.min.css',
		'public/css/font-awesome.min.css',
		'public/css/style.css',
		'public/css/menu.css',
	],
	'public/css/vendor.min.css',);