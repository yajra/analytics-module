@extends('admin::layouts.master')

@section('body', '')

@section('keywords', config('analytics.keywords'))
@section('description', config('analytics.description'))
@section('author', config('analytics.author'))

@section('title')
    {{config('analytics.name')}} | @parent
@stop

@section('page-title')
    Google Analytics
@stop

@push('styles')
@endpush

@section('content')
    <section>
        {{dump($stats)}}
        {{dump($views)}}
    </section>

    <section id="analytics">
        <div class="row">
            <div class="col-md-6">
                @include('analytics::widgets.most-visited')
            </div>
            <div class="col-md-6">
                @include('analytics::widgets.browsers')
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                @include('analytics::widgets.referrers')
            </div>
        </div>
    </section>
@stop

@push('scripts')
<script>
    $(function () {
        $('#analytics .table').DataTable({
            lengthChange: false,
        });
    });
</script>
@endpush
