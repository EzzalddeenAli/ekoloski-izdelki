var gulp = require("gulp");
var shell = require('gulp-shell');
var elixir = require('laravel-elixir');
var themeInfo = require('./theme.json');

var Task = elixir.Task;



elixir.extend('stylistPublish', function() {

    new Task('stylistPublish', function() {
        // return gulp.src("").pipe(shell("php ../../artisan stylist:publish " + themeInfo.name));
    });

});




/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function (mix) {

    /**
     * Compile less
     */
    mix.less([
        "main.less"
    ], '../../public/themes/' + themeInfo.name.toLowerCase() + '/css/main.css' /*'assets/css/main.css'*/)
    .stylistPublish();

    /**
     * Concat scripts
     */
    mix.scripts([
        // '/../../vendor/jquery/dist/jquery.js',
        // '/../../vendor/bootstrap/dist/js/bootstrap.min.js',
        './../../bower_components/fingerprintjs2/dist/fingerprint2.min.js',
        './../../bower_components/vue/dist/vue.js',
        './../../bower_components/axios/dist/axios.js',
        //'./../../bower_components/fingerprintjs2/fingerprintjs2.js',
        // '/js/bootswatch.js'
    ], '../../public/themes/' + themeInfo.name.toLowerCase() + '/js', 'resources');

    // ], null, 'resources'

    /*
    mix.scripts([
        '/vendor/jquery/dist/jquery.js',
        '/vendor/bootstrap/dist/js/bootstrap.min.js',
        '/vendor/prism/prism.js',
        '/js/bootswatch.js',
        '/vendor/vue/dist/vue.js',
        '/vendor/vue-resource/dist/vue-resource.js',
        '/vendor/masonry/dist/masonry.pkgd.min.js',
    ], '../../public/themes/' + themeInfo.name.toLowerCase() + '/js', 'resources');
    */


    /**
     * Copy Bootstrap fonts

    mix.copy(
        'resources/vendor/bootstrap/fonts',
        'assets/fonts'
    );
     */

    /**
     * Copy Fontawesome fonts

    mix.copy(
        'resources/vendor/font-awesome/fonts',
        'assets/fonts'
    );
     */

});
