var gulp = require('gulp'),
    gutil = require('gulp-util'),
    less = require('gulp-less'),
    path = require('path'),
    eslint = require('gulp-eslint'),
    babel = require('gulp-babel'),
    bower = require('gulp-bower'),
    autoprefixer = require('gulp-autoprefixer'),
    del = require('del'),
    concat = require('gulp-concat'),
    rename = require('gulp-rename'),
    uglify = require('gulp-uglify');


gulp.task('default', ['minify-js', 'autoprefixer']);

/**
 * Supprime les fichier defini
 */
gulp.task("clean", function () {
    return del([
        'js/dist.js',
        'js/dist.es5.js',
        'js/dist.min.js',
        'css/**/*'
    ]);
});

/**
 * Concatene les fichiers dans un seul fichier
 */
gulp.task('concat', ['clean'], function () {
    return gulp.src(
        [
            "js/dev/libraries/*",
            "js/dev/components/*",
            "js/dev/dispatchers/*",
            "js/dev/stores/*",
            "js/dev/controllers/*",
            "js/dev/application.js"
        ])
        .pipe(concat('dist.js'))
        .pipe(gulp.dest('js'));
});


/**
 * Vérifie la qualité du code Javascript
 */
gulp.task("lint", ['concat'], () => {
    return gulp.src(['js/**/*.js','!node_modules/**','!vendor/**'])
        .pipe(eslint({
            rules: {
                'indent': ['error', 2, {
                    SwitchCase: 1,
                    VariableDeclarator: 1,
                    outerIIFEBody: 1,
                    FunctionDeclaration: {
                        parameters: 1,
                        body: 1
                    },
                    FunctionExpression: {
                        parameters: 1,
                        body: 1
                    }
                }],
                'semi': ['error', 'always'],
                'quotes': ['error', 'single']
            },
            globals: ['$'],
            envs: ['node','es6']
        }))
        .pipe(eslint.format())
        .pipe(eslint.failAfterError());
});

/**
 * Transpile le code ES6 vers ES5
 */
gulp.task("babel", ['concat'], function () {
    return gulp.src("js/dist.js")
        .pipe(babel({
            presets: ['es2015'],
            compact: false
        }))
        .pipe(rename('dist.es5.js'))
        .pipe(gulp.dest("js"));
});

/**
 * Build les fichiers less
 */
gulp.task('less', ['clean', 'bower'], function () {
    return gulp.src(['./less/home.less','./less/**/list-ad.less'])
        .pipe(less().on('error', function(err){
            gutil.log(err);
            this.emit('end');
        }))
        .pipe(gulp.dest('./css'));
});

/**
 * Optimise les feuilles de style css pour tout les navigateurs
 */
gulp.task('autoprefixer', ['less'], function () {
    gulp.src('css/**/*.css')
        .pipe(autoprefixer({
            browsers: ["firefox >= 15", "ios >= 8", "android >= 4.0", "and_uc >= 9.9"],
            cascade: false
        }))
        .pipe(gulp.dest('css'));
});

/**
 * Installe les dependances tiers
 */
gulp.task('bower', function () {
    return bower();
});


/**
 * Minify les fichiers
 */
gulp.task('minify-js', ['babel'], function () {
    gulp.src('js/dist.es5.js')
        .pipe(rename('dist.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('js'));
});