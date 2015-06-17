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

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon icon-user"></i> <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ URL::route('account.my-account') }}">Mon compte</a></li>
                            <li><a href="{{ URL::route('account.server.top.list', $top->subdomain) }}">Mes serveurs</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ URL::route('logout') }}">Déconnexion</a></li>
                        </ul>
                    </li>

                    @if(Auth::user()->hasRole('admin'))

                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon icon-armchair-chair-streamline"></i> <span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu">
                            @if(!$top->enable)
                              <li><a tabindex="-1" href="{{ URL::route('admin.topserver.enable', array($top->id, 'yes')) }}">
                                <span class="text-danger icon icon-exclamation-circle"></span> Activer le Top</a>
                              </li>
                              <li class="divider"></li>  
                            @endif
                            <li><a tabindex="-1" href="{{ URL::route('admin.topserver.edit', $top->id) }}">Modifier le Top</a></li>
                            <li><a tabindex="-1" href="{{ URL::route('admin.topserver.stats', $top->id) }}">Statistiques</a></li>
                            <li><a tabindex="-1" href="{{ URL::route('admin.topserver.reset_cache', $top->id) }}">Réinitialiser le cache</a></li>
                            <li><a tabindex="-1" href="{{ URL::route('index_admin') }}">Panel d'administration</a></li>
                          </ul>
                        </li>
                    @endif

                @else
                    <li><a class="btn btn-default" href="{{ URL::route('public.login') }}">Connexion</a></li>
                @endif

                <li><i id="modal-search" class="icon-search-find"></i></li>
            </ul>
        </div>
    </div>
</div>