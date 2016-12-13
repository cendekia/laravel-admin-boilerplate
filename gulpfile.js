const elixir = require('laravel-elixir')

var asset_sources = './src/resources/assets/'
var css_destination = 'public/css/'
var js_destination = 'public/js/'

elixir((mix) => {
    mix.styles([
        asset_sources + 'css/bootstrap.css',
        asset_sources + 'css/waves.css',
        asset_sources + 'css/animate.css',
        asset_sources + 'css/morris.css',
        asset_sources + 'css/materialize.css',
        asset_sources + 'css/style.css',
        asset_sources + 'css/all-themes.css',
    ],  css_destination +'admin.css').version(['css/admin.css'])
});
