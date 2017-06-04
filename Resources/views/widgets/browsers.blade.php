<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-globe"></i> Top Browsers</h3>
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
