<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-truck"></i> Top Referrers</h3>
    </div>
    <div class="panel-body">
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
