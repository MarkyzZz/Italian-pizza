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

mix
.sass('resources/assets/sass/template.scss','public/css')
.sass('resources/assets/sass/auth.scss','public/css')
.sass('resources/assets/sass/home.scss','public/css')
.sass('resources/assets/sass/contacts.scss','public/css')
.sass('resources/assets/sass/menu.scss','public/css')
.sass('resources/assets/sass/cart.scss','public/css')
.sass('resources/assets/sass/admin.scss','public/css')
.sass('resources/assets/sass/font-awesome.min.scss','public/css')




// 	These are jquery, bootstrap and owl carousel JSes all in one - vendor.js
	.scripts([
		'node_modules/jquery/dist/jquery.min.js',
		'node_modules/bootstrap/dist/js/bootstrap.min.js',
		'node_modules/owl.carousel/dist/owl.carousel.min.js',
	],
	'public/js/vendor.min.js')


// Include bootstrap, owl-carousel, font-awesome csses in one - vendor.css
	.styles([
		'node_modules/bootstrap/dist/css/bootstrap.min.css',
		'node_modules/owl.carousel/dist/assets/owl.carousel.min.css',
		'public/css/font-awesome.min.css',
	],
	'public/css/vendor.min.css',);