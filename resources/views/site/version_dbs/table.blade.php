<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="version_dbs-table">
            <thead>
            <tr>
                <th>Version</th>
                <th>Description</th>
                <th>Uid</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($versionDbs as $versionDb)
                <tr>
                    <td>{{ $versionDb->version }}</td>
                    <td>{{ $versionDb->description }}</td>
                    <td>{{ $versionDb->uid }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['versionDbs.destroy', $versionDb->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('versionDbs.show', [$versionDb->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('versionDbs.edit', [$versionDb->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $versionDbs])
        </div>
    </div>
</div>
