@extends(Config::get('view.layout'))


@section('meta_title')
{{ I18n::get('registration::text.title') }} |
@parent
@stop


@section('ariane')
@parent
&nbsp;<span class="icon-custom chevron-right"></span>&nbsp;<a href="{{ URL::route('registration') }}">{{ I18n::get('registration::text.title') }}</a>
@stop


@section('content')

	<div class="container">
		<div class="page-header">
		    <h1>Créer un compte</h1>
		</div>

		@include('theme::public.includes.alert-success-error')

		@include('registration::components.oauth')

		<hr />

		{{ Register::generateForm() }} 
	</div>

@stop