<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-anchor"></i> Top Most Visited Pages</h3>
    </div>
    <div class="panel-body">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>URL</th>
                <th>Views</th>
            </tr>
            </thead>
            @foreach($pages as $page)
                <tr>
                    <td>{{$loop->index + 1}}</td>
                    <td>
                        <a href="{{$page['url']}}">{{$page['pageTitle']}}</a>
                    </td>
                    <td>{{$page['pageViews']}}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
