<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="taxes-table">
            <thead>
            <tr>
                <th>Code</th>
                <th>Description</th>
                <th>Percentage</th>
                <th>Uid</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($taxes as $tax)
                <tr>
                    <td>{{ $tax->code }}</td>
                    <td>{{ $tax->description }}</td>
                    <td>{{ $tax->percentage }}</td>
                    <td>{{ $tax->uid }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['taxes.destroy', $tax->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('taxes.show', [$tax->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('taxes.edit', [$tax->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $taxes])
        </div>
    </div>
</div>
