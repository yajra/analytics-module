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
<style>
    canvas {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
</style>
@endpush

@section('content')
    <section id="analytics">
        @include('analytics::widgets.graph')

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

            <div class="col-md-6">
                @include('analytics::widgets.country-sessions')
            </div>
        </div>
    </section>
@stop

@push('js-plugins')
<script src="{{asset('themes/admin-lte/plugins/chartjs/Chart.min.js')}}"></script>
@endpush

@push('scripts')
<script>
    $(function () {
        var data = {
            labels: Object.keys({!! $stats->pluck('pageViews', 'date') !!}),

            datasets: [
                {
                    label: 'Page Views',
                    fillColor: "rgba(220,220,220,0.2)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: {!! $stats->pluck('pageViews', 'date') !!}
                },
                {
                    label: 'Visitors',
                    backgroundColor: 'red',
                    fillColor: "rgba(100,220,220,0.7)",
                    strokeColor: "rgba(100,220,220,1)",
                    pointColor: "rgba(100,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: {!! $stats->pluck('visitors', 'date') !!}
                }
            ]
        };

        var context = document.querySelector('#graph').getContext('2d');
        new Chart(context).Line(data);

        $('#analytics .table').DataTable({
            lengthChange: false,
        });
    });
</script>
@endpush
