<div class="box box-danger">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-truck"></i> Top Referrers</h3>

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
            @foreach($referrers as $referrer)
                <tr>
                    <td>{{$loop->index + 1}}</td>
                    <td>{{$referrer['url']}}</td>
                    <td>{{$referrer['pageViews']}}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
