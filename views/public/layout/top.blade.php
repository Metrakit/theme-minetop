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
                    }
                  }
                ]);
            });
        </script>
    </head>
    <body>

        <div class="main-container">

            @yield('header')
            
            @include('theme::public.nav.navbar')

            <div id="search" class="full-size">
                <button type="button" class="close">×</button>
                <form>
                    <input type="search" value="" placeholder="type keyword(s) here" />
                    <button type="submit" class="btn btn-primary btn-animated">Search awesome things</button>
                </form>
            </div>

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
          <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <ul class="list-unstyled">
                        <li><a href="{{ URL::to(Config::get('app.url')) }}">Liste des Top-serveurs</a></li>
                        <li><a href="#">Link here</a></li>
                        <li><a href="#">Link here</a></li>
                        <li><a href="#">Link here</a></li>
                        <li><a href="#">Link here</a></li>  
                    </ul>
                </div>
                <div class="col-sm-6 col-md-3">
                    <ul class="list-unstyled">
                        <li><a href="#">Link here</a></li>
                        <li><a href="#">Link here</a></li>
                        <li><a href="#">Link here</a></li>
                        <li><a href="#">Link here</a></li>
                        <li><a href="#">Link here</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-md-3">
                    <ul class="list-unstyled">
                        <li><a href="#">Link here</a></li>
                        <li><a href="#">Link here</a></li>
                        <li><a href="#">Link here</a></li>
                        <li><a href="#">Link here</a></li>
                        <li><a href="#">Link here</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-md-3">
                    <ul class="list-unstyled">
                        <li><a href="#">Link here</a></li>
                        <li><a href="#">Link here</a></li>
                        <li><a href="#">Link here</a></li>
                        <li><a href="#">Link here</a></li>
                        <li><a href="#">Link here</a></li>
                    </ul>
                </div>
            </div>
          </div>
        </footer>

    </body>
</html>