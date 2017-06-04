@extends('layouts.master')

@section('body', '')

@section('keywords', config('analytics.keywords'))
@section('description', config('analytics.description'))
@section('author', config('analytics.author'))

@section('title')
{{config('analytics.name')}} | @parent
@stop

@section('page-title')
{{config('analytics.name')}}
@stop

@push('styles')
@endpush

@section('content')

	<h1>Hello World</h1>

	<p>
		This view is loaded from module: {!! config('analytics.name') !!}
	</p>

@stop

@push('js-plugins')
@endpush

@push('scripts')
@endpush
