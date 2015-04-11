var elixir = require('laravel-elixir'),
    gulp            = require('gulp'),
    config          = require('./config.json');

    elixir.config.assetsDir = 'src/public/';
    elixir.config.cssOutput = '../../../public/theme/minetop/public/css/';
    elixir.config.jsOutput  = '../../../public/theme/minetop/public/js/';
    elixir.config.bowerDir  = 'vendor';
    elixir.config.publicDir = '../../../public/theme/minetop/public/';

require('laravel-elixir-browsersync');


elixir(function(mix) {

    mix.scripts(config.js.main.path.concat(config.js.main.custom),  elixir.config.jsOutput  + "master.js", "./")
       .scripts(config.js.back.path.concat(config.js.back.custom),  elixir.config.jsOutput  + "backend.js", "./")

    mix.rubySass("/master.scss", elixir.config.cssOutput, {
            compass: true,
            container: config.sass.main.container
        })
       .rubySass("/backend.scss", elixir.config.cssOutput, {
            compass: true,
            container: config.sass.back.container
        })


        // Themes
        .rubySass("themes/minecraft.scss", elixir.config.cssOutput + "themes", {
            compass: true,
            container: "theme.minecraft"
        })
        .rubySass("themes/rust.scss", elixir.config.cssOutput + "themes", {
            compass: true,
            container: "theme.rust"
        })

        .rubySass("themes/default.scss", elixir.config.cssOutput + "themes", {
            compass: true,
            container: "theme.default"
        });


    mix.version([

        // css
        "/css/master.css", 
        "/css/backend.css", 

        // js
        "/js/master.js", 
        "/js/backend.js",

        // themes 
        "/css/themes/minecraft.css",
        "/css/themes/rust.css",

        "/css/themes/default.css"
    ]);

});