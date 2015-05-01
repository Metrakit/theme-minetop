{{-- Extends the login page --}}

@if(Option::get('facebook_registration') || Option::get('google_registration') || Option::get('linkedin_registration') || Option::get('instagram_registration') || Option::get('github_registration'))

	<div class="text-center">

		@if(Option::get('facebook_registration'))
			<a class="btn btn-primary" href="{{ URL::route('oauth.facebook.authorize') }}"> Login with Facebook</a>
		@endif

		@if(Option::get('google_registration'))
			<a class="btn btn-primary" href="{{ URL::route('oauth.google.authorize') }}"> Login with Google</a>
		@endif

		@if(Option::get('github_registration'))
			<a class="btn btn-primary" href="{{ URL::route('oauth.github.authorize') }}"> Login with Github</a>
		@endif

		@if(Option::get('disqus_registration'))
			<a class="btn btn-primary" href="{{ URL::route('oauth.disqus.authorize') }}"> Login with Disqus</a>
		@endif

		<div class="clearfix"></div>

		<hr />

	</div>

@endif