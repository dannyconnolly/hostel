module.exports = function(grunt) {

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        uglify: {
            options: {
                banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n'
            },
            my_target: {
                files: {
                    'public/assets/js/scripts.js': [
                        'public/assets/js/vendor/jquery-2.1.1.js',
                        'public/assets/js/vendor/jquery-migrate-1.2.1.js',
                        'public/assets/js/vendor/jquery-ui-1.10.4.js',
                        'public/bower_components/bootstrap-css/js/bootstrap.js',
                        'public/assets/js/vendor/jquery.tablesorter.js'
                    ]
                }
            }
        },
        jshint: {
            all: [
                'Gruntfile.js',
                'public/assets/js/app.js'
            ]
        },
        sass: {// Task
            dist: {// Target
                options: {// Target options
                    style: 'expanded'
                },
                files: {// Dictionary of files
                    'public/assets/css/app.css': 'public/assets/sass/app.scss' // 'destination': 'source'
                }
            }
        },
        watch: {
            css: {
                files: 'public/assets/sass/**/*.scss',
                tasks: ['sass']
            },
            scripts: {
                files: [
                    'Gruntfile.js',
                    'public/assets/js/app.js'
                ],
                tasks: ['uglify'],
                options: {
                    spawn: false
                }
            }
        }
    });

    // Load the plugin that provides the "uglify" task.
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');

    // Default task(s).
    grunt.registerTask('default', ['watch']);

};