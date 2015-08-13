<div class="bg-nav margin-bottom-sm">
    <div class="navbar navbar-default container" role="navigation">
    
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

        <div class="collapse navbar-collapse js-navbar-collapse navbar-top">

            <ul class="nav navbar-nav navbar-right">

                @if(Auth::check())

                    <li class="dropdown">
                        <a href="{{ URL::route('account.my-account') }}" class="dropdown-toggle" data-toggle="dropdown">
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
                          <a href="{{ URL::route('index_admin') }}" class="dropdown-toggle" data-toggle="dropdown">
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
                    <li><a href="{{ URL::route('public.login') }}">Connexion</a></li>
                @endif

                <li class="dropdown mega-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Classements <span class="icon icon-chevron-down"></span></a>                
                    <ul class="dropdown-menu mega-dropdown-menu">
                         @foreach($listing_top as $key => $top)

                            @if($key === 0 || $key === 10 || $key === 20)
                                <div class="col-md-4">
                                    <ul>
                            @endif
                            
                            <li><a href="{{ URL::route('top_server', $top->subdomain) }}">{{ ucfirst($top->game) }}</a></li>

                            @if(($key+1) === $total_listing)
                                <li class="divider"></li>
                                <li><a href="{{ URL::to(Config::get('app.url')) }}">Voir tous les Tops</a></li>
                            @endif
                                
                            @if($key === 9 || $key === 19 || $key === 29 || ($key+1) === $total_listing)
                                    </ul>
                                </div>
                            @endif
                        
                        @endforeach
                        
                    </ul>               
                </li>

                <li><a id="modal-search" href="{{ URL::route('search.show') }}"><i class="icon-search-find"></i></a></li>
            </ul>
        </div>
    </div>
</div>