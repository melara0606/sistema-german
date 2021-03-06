const { mix } = require('laravel-mix');

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
 	'resources/assets/js/jquery.js',
  //'resources/assets/js/bootstrap.js',
 	'resources/assets/js/jquery.mask.min.js',
 	'resources/assets/js/icheck.js',
 	'resources/assets/js/botones.dataTables.min.js',
 	'resources/assets/js/pdfmake.min.js',
 	'resources/assets/js/vfs_fonts.js',
 	'resources/assets/js/jquery.dataTables.js',
  'resources/assets/js/dataTables.bootstrap.js',
  'resources/assets/js/sweetalert2.min.js',
  'resources/assets/js/app.min.js',
  'resources/assets/js/raphael-min.js',
  'resources/assets/js/moment.min.js',
  'resources/assets/js/bootstrap-toggle.min.js',
  'resources/assets/js/jquery.slimscroll.js',
  'resources/assets/js/jquery-ui.js',
  'resources/assets/js/jquery.inputmask.js',
  'resources/assets/js/toastr.js',
  'resources/assets/js/jquery.steps.js',
  'resources/assets/js/chosen.jquery.js',
  'resources/assets/js/vue.min.js',
  'resources/assets/js/fullcalendar.js',
  'resources/assets/js/es.js',
], 'public/js/sisverapaz.js')
.styles([
	'resources/assets/css/_all-skins.css',
  'resources/assets/css/AdminLTE.css',
  'resources/assets/css/all.css',
  'resources/assets/css/blue.css',
  'resources/assets/css/bootstrap.css',
  'resources/assets/css/bootstrap3-wysihtml5.css',
  'resources/assets/css/bootstrap-toggle.min.css',
  'resources/assets/css/buttons.bootstrap.min.css',
  'resources/assets/css/dataTables.bootstrap.css',
  'resources/assets/css/datepicker3.css',
  'resources/assets/css/font-awesome.css',
  'resources/assets/css/ionicons.min.css',
  'resources/assets/css/jquery-jvectormap-1.2.2.css',
  'resources/assets/css/toastr.css',
  'resources/assets/css/sweetalert2.min.css',
  'resources/assets/css/jquery-ui.css',
  'resources/assets/css/jquery-ui.theme.css',
  'resources/assets/css/jquery.steps.css',
  'resources/assets/css/chosen.css',
  'resources/assets/css/fullcalendar.css',
],'public/css/sisverapaz.css');
