<div class="navbar navbar-default margin-bottom-sm" role="navigation">
    <div class="container">

        <div class="navbar-header">
            <a class="navbar-brand" rel="home" href="{{ URL::route('top_server', array($global['top']->subdomain)) }}">
                {{ $global['top']->title->text }}
            </a>
             <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-top">
                <span class="sr-only">Menu</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>                 
        </div>

        <div class="navbar-collapse navbar-top collapse">

            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())

                    <li><a href="{{ URL::route('account.my-account') }}">Mon compte</a></li>
                    
                    @if(Auth::user()->hasRole('admin'))

                        @if(!$top->enable)
                            <li>
                                <a class="text-danger" href="{{ URL::route('admin.topserver.enable', array($top->id, 'yes')) }}">
                                    <span class="icon-exclamation-circle"></span> Top désactivé
                                </a>
                            </li>
                        @endif

                        <li class="dropdown margin-top-sm">
                          <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                            Administration
                            <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu">
                            @if(!$top->enable)
                              <li><a tabindex="-1" href="{{ URL::route('admin.topserver.enable', array($top->id, 'yes')) }}">Activer le Top</a></li>  
                            @endif
                            <li><a tabindex="-1" href="{{ URL::route('admin.topserver.edit', $top->id) }}">Modifier le Top</a></li>
                            <li><a tabindex="-1" href="{{ URL::route('admin.topserver.stats', $top->id) }}">Statistiques</a></li>
                            <li><a tabindex="-1" href="{{ URL::route('admin.topserver.reset_cache', $top->id) }}">Réinitialiser le cache</a></li>
                            <li><a tabindex="-1" href="{{ URL::route('index_admin') }}">Panel d'administration</a></li>
                          </ul>
                        </li>
                    @endif
                    <li><a href="{{ URL::route('logout') }}">Déconnexion</a></li>
                @else
                    <li><a href="{{ URL::route('public.login') }}">Connexion</a></li>
                @endif

                <li><i id="modal-search" class="icon-search-find"></i></li>
            </ul>
        </div>
    </div>
</div>