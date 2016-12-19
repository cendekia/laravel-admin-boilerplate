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

    mix.styles([
        asset_sources + 'js/plugins/skin/bootstrap/css/dataTables.bootstrap.css',
    ],  css_destination +'dataTables.css')

    mix.scripts([
        asset_sources     +'js/plugins/jquery.js',
        asset_sources     +'js/plugins/bootstrap.js',
        asset_sources     +'js/plugins/bootstrap-select.js',
        asset_sources     +'js/plugins/jquery.slimscroll.js',
        asset_sources     +'js/plugins/waves.js'
    ],  js_destination +'admin-boilerplate.js')

    mix.scripts([
        asset_sources     +'js/plugins/jquery.dataTables.js',
        asset_sources     +'js/plugins/skin/bootstrap/js/dataTables.bootstrap.js',
        asset_sources     +'js/plugins/extensions/export/dataTables.buttons.min.js',
        asset_sources     +'js/plugins/extensions/export/buttons.flash.min.js',
        asset_sources     +'js/plugins/extensions/export/jszip.min.js',
        asset_sources     +'js/plugins/extensions/export/pdfmake.min.js',
        asset_sources     +'js/plugins/extensions/export/vfs_fonts.js',
        asset_sources     +'js/plugins/extensions/export/buttons.html5.min.js',
        asset_sources     +'js/plugins/extensions/export/buttons.print.min.js',
    ],  js_destination +'dataTables.js')

    mix.scripts([
        asset_sources     +'js/admin.js',
        asset_sources     +'js/helpers.js',
        asset_sources     +'js/demo.js',
    ],  js_destination +'admin-custom.js')

    mix.scripts([
        asset_sources     +'js/plugins/jquery.countTo.js',
        asset_sources     +'js/plugins/raphael.js',
        asset_sources     +'js/plugins/morris.js',
        asset_sources     +'js/plugins/Chart.bundle.js',
        asset_sources     +'js/plugins/jquery.flot.js',
        asset_sources     +'js/plugins/jquery.flot.resize.js',
        asset_sources     +'js/plugins/jquery.flot.categories.js',
        asset_sources     +'js/plugins/jquery.flot.time.js',
        asset_sources     +'js/plugins/jquery.sparkline.js',
        asset_sources     +'js/pages/index.js',
    ],  js_destination +'admin-page-index.js')

    mix.scripts([
        asset_sources     +'js/pages/jquery-datatable.js',
    ],  js_destination +'custom-datatable.js')

    mix.version(['css/admin-boilerplate.css', 'js/admin-boilerplate.js', 'js/admin-custom.js', 'js/admin-page-index.js'])
});
