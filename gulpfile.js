const elixir = require('laravel-elixir')

var asset_sources = './resources/assets/'
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
    ],  css_destination +'admin-boilerplate.css')

    mix.scripts([
        asset_sources     +'js/plugins/jquery.js',
        asset_sources     +'js/plugins/bootstrap.js',
        asset_sources     +'js/plugins/bootstrap-select.js',
        asset_sources     +'js/plugins/jquery.slimscroll.js',
        asset_sources     +'js/plugins/waves.js',
        asset_sources     +'js/plugins/jquery.countTo.js',
        asset_sources     +'js/plugins/raphael.js',
        asset_sources     +'js/plugins/morris.js',
        asset_sources     +'js/plugins/Chart.bundle.js',
        asset_sources     +'js/plugins/jquery.flot.js',
        asset_sources     +'js/plugins/jquery.flot.resize.js',
        asset_sources     +'js/plugins/jquery.flot.categories.js',
        asset_sources     +'js/plugins/jquery.flot.time.js',
        asset_sources     +'js/plugins/jquery.sparkline.js',
    ],  js_destination +'admin-boilerplate.js')

    mix.scripts([
        asset_sources     +'js/admin.js',
        asset_sources     +'js/helpers.js',
        asset_sources     +'js/demo.js',
    ],  js_destination +'admin-custom.js')

    mix.scripts([
        asset_sources     +'js/pages/index.js',
    ],  js_destination +'admin-page-index.js')

    mix.version(['css/admin-boilerplate.css', 'js/admin-boilerplate.js', 'js/admin-custom.js', 'js/admin-page-index.js'])
});
