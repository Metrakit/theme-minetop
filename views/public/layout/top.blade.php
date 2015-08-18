<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>
        @section('meta_title')
    {{ $global['top']->title->text }}
        @show
        </title>
        <meta name="author" content="{{ Config::get('app.author') }}">
        <meta name="description" content="@yield('meta_description')">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta property="og:locale" content="fr_FR">
        <meta property="og:type" content="website">
        <meta property="og:title" content="">
        <meta property="og:description" content="">
        <meta property="og:url" content="{{ Request::url() }}">
        <meta property="og:site_name" content="">
        <meta property="og:image" content="{{ Option::get('cover_path') }}">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:image:src" content="{{Request::url()}}">
        <meta name="twitter:site" content="{{ Option::get('twitter_id') }}">
        <meta name="twitter:url" content="{{ Option::get('cover_path') }}">
        <meta name="twitter:description" content="">
        <meta name="twitter:title" content="">

        <link rel="canonical" href="{{ Request::url() }}">

        <link rel="shortcut icon" href="{{ asset('icons/favicon.ico') }}" />


        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('icons/apple-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('icons/apple-icon-60x60.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('icons/apple-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('icons/apple-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('icons/apple-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('icons/apple-icon-120x120.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('icons/apple-icon-144x144.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('icons/apple-icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('icons/apple-icon-180x180.png') }}">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('icons/android-icon-192x192.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('icons/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('icons/favicon-96x96.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('icons/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('icons/manifest.json') }}">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="{{ asset('icons/ms-icon-144x144.png') }}">
        <meta name="theme-color" content="#ffffff">
        

        <link rel="stylesheet" href="{{ Minetop::elixir('css/themes/' . $global['top']->subdomain . '.css','css/themes/default.css') }}">
        <link rel="stylesheet" href="{{ Minetop::elixir('css/backend.css') }}">

        {{-- A remplacer par du local --}}
        <link href="https://fontastic.s3.amazonaws.com/T5itbid4gTHfydrVt8qdxd/icons.css" rel="stylesheet"> 

        {{--<link rel="icon" href="{{asset('uploads/system/favicon/favicon.ico')}}" sizes="16x16 32x32" type="image/vnd.microsoft.icon">
        <link rel="icon" href="{{asset('uploads/system/favicon/favicon16.png')}}" sizes="16x16" type="image/png">
        <link rel="icon" href="{{asset('uploads/system/favicon/favicon32.png')}}" sizes="32x32" type="image/png">
        <link rel="icon" href="{{asset('uploads/system/favicon/favicon128.png')}}" sizes="128x128" type="image/png">
        <link rel="icon" href="{{asset('uploads/system/favicon/favicon.svg')}}" sizes="any" type="image/svg+xml">

        <link rel="icon" href="{{asset('uploads/system/favicon/apple-touch-icon.png')}}" sizes="57x57" type="image/png">
        <link rel="apple-touch-icon" href="{{asset('uploads/system/favicon/apple-touch-icon.png')}}" />--}}

        @yield('css')

        @yield('head')
        <script src="{{ asset('theme/default/public/js/vendor/head.min.js') }}"></script>
        <script>
           head.js(
              '{{ asset("theme/default/public/js/vendor/modernizr.min.js") }}',
              function() {
                @yield('scriptYepnope')
                yepnope([
                  {
                    load: "{{ asset('theme/default/public/js/vendor/jquery.min.js') }}"
                  } , {
                    load: [
                        "{{ Minetop::elixir('js/master.js') }}"
                        @if (Auth::user())                       
                            , "{{ Minetop::elixir('js/backend.js') }}"
                        @endif
                    ],
                    complete: function() {
                        $(document).ready( function() {         
                            @yield('scriptOnReady')
                        });

                        @if(Input::old('search_types') || Session::has('search_types'))
                            var gtypes = [];
                            @foreach ($top->topserver->gametype as $gtype)
                                @if ((is_array(Input::old('search_types')) && in_array($gtype->id, Input::old('search_types')))||(is_array(Session::get('search_types')) && in_array($gtype->id, Session::get('search_types'))))
                                    gtypes.push({
                                        id: {{ $gtype->id }},
                                        text: "{{ $gtype->name->text }}"
                                    });
                                 $('select.hidden[name="search_types[]"]').append('<option value="{{ $gtype->id }}" selected></option>');
                                @endif
                            @endforeach
                        @endif

                        $('.search-tri-types').selectivity({
                            items: {{ json_encode($top->topserver->selectTypes()) }},
                            
                            @if(Input::old('search_types') || Session::has('search_types'))
                                data: gtypes,
                            @endif

                            multiple: true,
                            placeholder: 'Sélectionnez des types',
                            templates: {
                                multipleSelectedItem: function(options) {
                                    var extraClass = (options.highlighted ? ' highlighted' : '');
                                    return (
                                        '<span class="selectivity-multiple-selected-item' + extraClass + '" ' +
                                              'data-item-id="' + escape(options.id) + '">' +
                                            (options.removable ? '<a class="selectivity-multiple-selected-item-remove">' +
                                                                     '<i class="icon icon-remove"></i>' +
                                                                 '</a>'
                                                               : '') +
                                            escape(options.text) +
                                        '</span>'
                                    );
                                }
                            }
                        }).change(function(event) {
                            var selHidden = $(this).parent().find('select.hidden');
                            if (event.added) {
                                 selHidden.append('<option value="' + event.added.id + '" selected></option>');
                            } else if (event.removed) {
                                $('option[value="' + event.removed.id + '"]').remove();
                            }
                        });

                    }
                  }
                ]);
            });
        </script>
    </head>
    <body>

        {{-- Facebook DOM for the like button --}}
        <div id="fb-root"></div>

        <div class="main-container">

            @yield('header')
            
            @include('theme::public.nav.navbar')

            @include('theme::public.components.search')

            @if (isset($panel_link))
                @include('theme::public.nav.panel-side-bar')
            @endif

            @yield('content')

            @if (isset($panel_link))
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        </div> {{-- End of .main-container --}}

        <footer>

            <div class="footer-core">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-md-3 top-trend">
                            <h4>Tops tendences</h4>
                            <ul class="list-unstyled">
                                @foreach ($top_tendence as $tendence)
                                    <li><a href="{{ URL::route('top_server', $tendence->subdomain) }}">Top {{ $tendence->topserver->game }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <ul class="list-unstyled">
                                <li><a href="{{ URL::to(Config::get('app.url')) }}">Liste des Top-serveurs</a></li>
                                <li><a href="{{ URL::route('api.index') }}">API Développeurs</a></li>
                                <li><a href="{{ URL::route('blog.index') }}">Le blog</a></li>
                                <li><a href="{{ URL::route('contact.show') }}">Nous contacter</a></li>
                                <li><a href="{{ URL::route('about') }}">A propos</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-6 col-md-2">
                            {{--<ul class="list-unstyled">
                                <li><a href="#">Twitter</a></li>
                                <li><a href="#">Google+</a></li>
                                <li><a href="#">Facebook</a></li>
                                <li><a href="#">Youtube</a></li>
                            </ul>--}}
                        </div>
                        <div class="col-sm-6 col-md-4">
                             <div class="fb-page margin-left-md" 
                                data-href="http://facebook.com/minetopServers" 
                                data-height="230" 
                                data-small-header="true" 
                                data-adapt-container-width="true" 
                                data-hide-cover="false" 
                                data-show-facepile="true" 
                                data-show-posts="false">
                                <div class="fb-xfbml-parse-ignore"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="container">
                    <p class="pull-left"> Copyright © Minetop.net 2012-{{ Carbon::now()->year }}. Tous droits réservés </p>
                    <div class="pull-right">
                        Réalisé avec <i class="icon icon-beer"></i> et <i class="icon icon-heart"></i>, par des gamers, pour des gamers. 
                    </div>
                </div>
            </div>

        </footer>

    </body>
</html>