<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-anchor"></i> Top Most Visited Pages</h3>

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
