var elixir = require('laravel-elixir');
require('laravel-elixir-vueify')

elixir(function (mix) {
	mix
		.browserify('app.js')
		.sass('bootstrap.scss')
		.version([
			'js/app.js',
			'css/bootstrap.css'
		])
});
