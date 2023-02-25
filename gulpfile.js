"use strict";

const gulp = require("gulp");
const sass = require("gulp-sass");
const concat = require("gulp-concat");
//const sourcemaps = require('gulp-sourcemaps');
const del = require("del");
const babel = require("gulp-babel");
const theme = "wp-content/themes/drink-beer/";
const browserSync = require("browser-sync").create();
sass.compiler = require("node-sass");

// Clean Dist
let clean = () => {
    return del(theme + "dist/");
};

// Create css files
let css = () => {
    return (
        gulp
            .src([theme + "assets/sass/**/*.scss"])
            //.pipe(sassVariables([
            //  theme + 'assets/sass/**/*.scss'
            //]))
            //.pipe(sourcemaps.init())
            .pipe(sass())
            .pipe(concat("main.min.css"))
            //.pipe(sourcemaps.write())
            .pipe(gulp.dest(theme + "dist/css"))
    );
};

// Create JS Files
let js = () => {
    return (
        gulp
            .src([
                "node_modules/jquery/dist/jquery.min.js",
                "node_modules/slick-carousel/slick/slick.min.js",
                "node_modules/bootstrap/dist/js/bootstrap.js",
                "node_modules/tilt.js/dest/tilt.jquery.min.js",
                "node_modules/jquery-appear-original/index.js",
                "node_modules/jquery.scrollto/jquery.scrollTo.min.js",
                "node_modules/jquery-mask-plugin/src/jquery.mask.js",
                // 'node_modules/wow.js/dist/wow.min.JS',
                // 'node_modules/vanilla-lazyload/dist/lazyload.min.js',
                theme + "assets/js/*.js",
            ])
            //.pipe(sourcemaps.init())
            .pipe(
                babel({
                    presets: ["es2015"],
                })
            )
            .pipe(concat("main.min.js"))
            //.pipe(sourcemaps.write('.'))
            .pipe(gulp.dest(theme + "dist/js"))
    );
};

// copy PHP files
let php = () => {
    return gulp.src([theme + "*.php"]).pipe(gulp.dest(theme + "dist/php"));
};
// Copy fonts
let copyfonts = () => {
    return gulp
        .src([theme + "assets/fonts/*"])
        .pipe(gulp.dest(theme + "dist/fonts"));
};

// Copy Images
let copyimages = () => {
    return gulp
        .src([theme + "assets/img/*"])
        .pipe(gulp.dest(theme + "dist/img"));
};

// Minify Images
let minifyimages = () => {
    return gulp
        .src([theme + "assets/img/*"])
        .pipe(imagemin("x3v7bcKg1srzRpxPxbNgF2jSKotR9g3l"))
        .pipe(gulp.dest(theme + "dist/img/"));
};

// Watch all files
let watch = () => {
    gulp.watch(theme + "assets/sass/**/*.scss", css);
    gulp.watch(theme + "assets/js/**/*.js", js);
    gulp.watch(theme + "*.php", php);
};

let sync = () => {
    browserSync.init({
        proxy: "http://localhost/Drink-Beer/",
        files: theme + "dist/**/*",
        // notify: false
    });
    gulp.watch(theme + "assets/sass/**/*.scss", css);
    gulp.watch(theme + "assets/js/**/*.js", js);
    //gulp.watch(theme + 'assets/img/*.{png,jpg,svg}', copyimages);
    gulp.watch(theme + "*.php", php);
};

const build = gulp.series(clean, gulp.parallel(css, js, php, sync));

//Export Tasks
exports.css = css;
exports.watch = watch;
exports.clean = clean;
exports.js = js;
//exports.copyimages = copyimages;
//exports.minifyimages = minifyimages;
//exports.copyfonts = copyfonts;
exports.build = build;
exports.sync = sync;
exports.php = php;
