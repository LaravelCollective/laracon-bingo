var elixir = require('laravel-elixir');
require('laravel-elixir-vueify')

elixir(function (mix) {
	mix
		.browserify('app.js')
		.browserify('admin.js')
		.sass('bootstrap.scss')
		.version([
			'js/app.js',
			'js/admin.js',
			'css/bootstrap.css'
		])
});
