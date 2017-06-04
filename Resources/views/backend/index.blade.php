@extends('admin::layouts.master')

@section('title')
{{config('analytics.name')}} | @parent
@stop

@section('keywords', config('analytics.keywords'))
@section('description', config('analytics.description'))
@section('author', config('analytics.author'))

@section('page-title')
@pageHeader(config('analytics.name'), config('analytics.description'), config('analytics.icon'))
@stop

@push('styles')
@endpush

@section('content')

	<h1>Hello World (Admin)</h1>

	<p>
		This view is loaded from module: {!! config('analytics.name') !!}
	</p>

@stop

@push('js-plugins')
@endpush

@push('scripts')
@endpush
