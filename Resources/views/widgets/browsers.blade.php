<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-globe"></i> Top Browsers</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                <i class="fa fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="box-body">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Browser</th>
                <th>Sessions</th>
            </tr>
            </thead>
            @foreach($browsers as $browser)
                <tr>
                    <td>{{$loop->index + 1}}</td>
                    <td>{{$browser['browser']}}</td>
                    <td>{{$browser['sessions']}}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
