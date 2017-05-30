module.exports = function (grunt) {

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    sass: {
      options: {
        outputStyle: 'compressed',
        sourceMap: true
      },
      all: {
        files: {
          'css/application.css': 'scss/application.scss'
        }
      }
    },

    postcss: {
      options: {
        map: true,
        processors: [
          require('autoprefixer-core')({
            browsers: ['> 0.5%', 'last 2 versions', 'Firefox ESR', 'Opera 12.1', 'ie >6']
          })
        ]
      },
      all: {
        src: 'css/*.css'
      }
    },

    uglify: {
      options: {
        sourceMap: true
      },
      vendor: {
        files: {
          'js/vendor.min.js': [
            'js/vendor/jquery.selectBoxIt.min.js'
          ]
        }
      },
      custom: {
        files: {
          'js/app.min.js': [
            'js/custom/*.js',
            'js/custom/*/*.js'
          ]
        }
      }
    },

    imagemin: {
      all: {
        files: [{
          expand: true,
          cwd: 'images/',
          src: ['**/*.{png,jpg,gif}'],
          dest: 'images/'
        }]
      }
    },

    watch: {
      sass: {
        files: 'scss/**/*.scss',
        tasks: ['sass', 'postcss', 'copy:styles']
      },
      jsVendor: {
        files: 'js/vendor/**/*.js',
        tasks: ['uglify:vendor', 'copy:js']
      },
      jsCustom: {
        files: 'js/custom/**/*.js',
        tasks: ['uglify:custom', 'copy:js']
      },
      system: {
        files: ['Gruntfile.js', 'package.json'],
        tasks: ['copy:system']
      }
    },

    copy: {
      options: {
        expand: true
      },
      styles: {
        files: [
          {
            src: [
              'css/**',
              'scss/**'
            ],
            dest: '../wp-content/themes/dco/'
          }
        ]
      },
      js: {
        files: [
          {
            src: [
              'js/**'
            ],
            dest: '../wp-content/themes/dco/'
          }
        ]
      },
      media: {
        files: [
          {
            src: [
              'images/**',
              'favicons/**'
            ],
            dest: '../wp-content/themes/dco/'
          }
        ]
      },
      system: {
        files: [
          {
            src: [
              'Gruntfile.js',
              'package.json',
              'bower.json'
            ],
            dest: '../wp-content/themes/dco/'
          }
        ]
      },
      build: {
        files: [
          {
            expand: true,
            src: [
              'css/**',
              'js/**',
              'images/**',
              'favicons/**',
              'fonts/**',
              'scss/**',
              'Gruntfile.js',
              'package.json'
            ],
            dest: '../wp-content/themes/dco/'
          }
        ]
      }
    }
  });

  grunt.loadNpmTasks('grunt-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-postcss');
  grunt.loadNpmTasks('grunt-contrib-imagemin');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-copy');

  grunt.registerTask('default', ['sass', 'postcss', 'imagemin', 'uglify']);

  // task 'wpbuild' for copy all needed files to wp theme.
  grunt.registerTask('wpbuild', ['copy:build']);

};
