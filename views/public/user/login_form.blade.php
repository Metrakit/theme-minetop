@extends(Config::get('view.layout'))

@section('meta_title')
    {{{ I18n::get('auth.login') }}} |
@parent
@stop

@section('content')

<div class="container" style="margin-top:50px;">
    @if(Session::has('add_server'))

        <h2 class="text-center">Vous devez vous connecter pour ajouter un serveur :)</h2>
        <p class="text-center">--> Encart a modifié <--</p>

    @else

        
            <div class="row text-center">
                <div class="col-md-4">
                    <i class="icon-flip icon-search-find" style="font-size:50px;"></i>
                    <p>Ne jouez plus seul</p>
                </div>
                <div class="col-md-4">
                    <i class="icon-flip icon-pvp" style="font-size:50px;"></i>
                    <p>Rejoignez-nous</p>
                </div>
                <div class="col-md-4">
                    <i class="icon-flip icon-exclamation-circle" style="font-size:50px;"></i>
                    <p>Faites connaitre votre serveur</p>
                </div>
            </div>
        

    @endif

</div>



<hr />

<div class="container">

    <div class="row">

        @if(Option::get('enable_registration') == true)
            @include('registration::components.oauth')
            <div class="col-md-6">
        @else
            <div class="col-md-12">
        @endif

            <h2 class="col-sm-offset-3 col-sm-9 text-center">Me connecter</h2>
            <div class="clearfix"></div>

            @if (Session::has('error_login'))
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('error_login') }}
                </div>
            @endif
    
            {{ Form::open(array('route' => 'custom.login.post', 'class' => 'form-horizontal')) }}

                <div class="form-group {{{ $errors->has('login_pseudo') ? 'has-error' : '' }}}">
                    <label class="col-sm-3 control-label" for="login_pseudo">Pseudo</label>
                    <div class="col-sm-9">
                        <input class="form-control" placeholder="Entrez votre pseudo ou adresse email" type="text" name="login_pseudo" id="login_pseudo" value="{{ Input::old('login_pseudo') }}">
                        {{ $errors->first('login_pseudo', '<p class="text-danger">Vous devez renseigner un peudo ou une adresse email valide</p>') }}
                    </div>
                </div>

                <div class="form-group {{{ $errors->has('login_password') ? 'has-error' : '' }}}">
                    <label class="col-sm-3 control-label" for="login_password">
                        Mot de passe
                    </label>
                    <div class="col-sm-9">
                        <input class="form-control" placeholder="Saisissez votre mot de passe" type="password" name="login_password" id="login_password">
                        {{ $errors->first('login_password', '<p class="text-danger">Vous devez indiquer un mot de passe correct</p>') }}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button type="submit" class="btn btn-primary">{{{ Lang::get('public.validate') }}}</button>
                        <a class="btn btn-default" href="{{ URL::route('reminder') }}">Mot de passe oublié</a>
                    </div>
                </div>

            {{ Form::close() }}

            <hr class="visible-xs visible-sm" />

        </div>

        @if(Option::get('enable_registration') == true)

            <div class="col-md-6">

                <h2 class="col-sm-offset-3 col-sm-9 text-center">Ou créer un compte</h2>
                <div class="clearfix"></div>

                 @if (Session::has('error_register'))
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ Session::get('error_register') }}
                    </div>
                @endif   

                {{ Form::open(array('route' => 'custom.register.post', 'class' => 'form-horizontal')) }}
                    <div class="form-group {{{ $errors->has('pseudo') ? 'has-error' : '' }}}">
                        <label class="col-sm-3 control-label" for="pseudo">Pseudo</label>
                        <div class="col-sm-9">
                            <input class="form-control" placeholder="Entrez votre pseudo" type="text" name="pseudo" id="pseudo" value="{{ Input::old('pseudo') }}">
                            {{ $errors->first('pseudo', '<p class="text-danger">:message</p>') }}
                        </div>
                    </div>

                    <div class="form-group {{{ $errors->has('email') ? 'has-error' : '' }}}">
                        <label class="col-sm-3 control-label" for="email">Email</label>
                        <div class="col-sm-9">
                            <input class="form-control" placeholder="minetop@example.com" type="email" name="email" id="email" value="{{ Input::old('email') }}">
                            {{ $errors->first('email', '<p class="text-danger">:message</p>') }}
                        </div>
                    </div>

                    <div class="form-group {{{ $errors->has('password') ? 'has-error' : '' }}}">
                        <label class="col-sm-3 control-label" for="password">
                            Mot de passe
                        </label>
                        <div class="col-sm-9">
                            <input class="form-control" placeholder="Saisissez votre mot de passe" type="password" name="password" id="password">
                            {{ $errors->first('password', '<p class="text-danger">:message</p>') }}
                        </div>
                    </div>

                    <div class="form-group {{{ $errors->has('password_repeat') ? 'has-error' : '' }}}">
                        <label class="col-sm-3 control-label" for="password_repeat">
                           Confirmation
                        </label>
                        <div class="col-sm-9">
                            <input class="form-control" placeholder="Confirmez votre mot de passe" type="password" name="password_repeat" id="password_repeat">
                            {{ $errors->first('password_repeat', '<p class="text-danger">:message</p>') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" class="btn btn-primary">{{ Lang::get('public.validate') }}</button>
                        </div>
                    </div>
                {{ Form::close() }}

                <div class="alert alert-info">
                    <h4>Informations</h4>
                    <ul>
                        <li>Inscription via un réseau social = <strong>1 seul clic</strong> !</li>
                        <li>Vous devez posséder un compte pour pouvoir ajouter un serveur.</li>
                        <li>Un seul compte est nécessaire pour tous les Top-serveurs Minetop !</li>
                    </ul>
                </div>


            </div>

        @endif

    </div>

</div>

@stop