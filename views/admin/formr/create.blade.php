@extends('theme::admin.layout.master')


@section('meta_title')
{{{ Lang::get('admin.formr') }}} |
@parent
@stop

@section('page-header')
    <div class="row">
        <h1 class="page-header">Création d'un formulaire</h1>
    </div>
@stop


@section('content')

{{ Formr::generateForm() }}

@stop