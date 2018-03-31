let mix = require('laravel-mix');

mix.browserSync('localhost:8000');
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

mix.scripts([
		'node_modules/jquery/dist/jquery.min.js',
		'node_modules/bootstrap/dist/js/bootstrap.min.js'
	],
	'public/js/vendor.min.js')
// Include bootstrap css
	.styles([
		'node_modules/bootstrap/dist/css/bootstrap.min.css',
	],
	'public/css/vendor.min.css',);