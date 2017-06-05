<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-flag"></i> Last 30 days Country Sessions</h3>

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
                <th>Country</th>
                <th>Sessions</th>
            </tr>
            </thead>
            @foreach($countries as $country)
                <tr>
                    <td>{{$loop->index + 1}}</td>
                    <td>{{$country['country']}}</td>
                    <td>{{$country['sessions']}}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
