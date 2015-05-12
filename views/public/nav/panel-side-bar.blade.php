<div class="container">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<div class="profile-userpic">
					<img src="{{ Auth::user()->user->avatar() }}" class="img-responsive">
				</div>
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						{{ ucfirst(Auth::user()->user->pseudo) }}
					</div>
					<div class="profile-user-role">
						Gérant de serveurs
					</div>
				</div>
				{{--<div class="profile-userbuttons">
					<button type="button" class="btn btn-success btn-sm">X Serveurs</button>
					<button type="button" class="btn btn-danger btn-sm">X Message</button>
				</div>--}}
				<div class="profile-usermenu">
					<ul class="nav">
						<li @if($panel_link == "profile") class="active" @endif>
							<a class="icon-torso" href="{{ URL::route('account.my-account') }}">Mon profil</a>
						</li>
						<li @if($panel_link == "servers") class="active" @endif>
							<a class="icon-database" href="@if(isset($top)) {{ URL::route('account.server.top.list', $top->subdomain) }} @else {{ URL::route('account.server.list') }} @endif">Mes serveurs</a>
						</li>
						<li @if($panel_link == "settings") class="active" @endif>
							<a class="icon-widget" href="{{ URL::route('account.edit') }}">Options du compte</a>
						</li>

						<li @if($panel_link == "premium") class="active text" @endif>
							<a class="icon-lamp text-premium" href="#">Premium</a>
						</li>

						{{--<li @if($panel_link == "api") class="active" @endif>
							<a class="icon-code" href="#">API &amp; Documentation</a>
						</li>						
						<li @if($panel_link == "help") class="active" @endif>
							<a class="icon-lamp" href="#">Aide/FAQ</a>
						</li>--}}
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-9">
            <div class="profile-content">