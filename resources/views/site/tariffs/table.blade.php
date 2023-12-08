<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="tariffs-table">
            <thead>
            <tr>
                <th>Description</th>
                <th>Code</th>
                <th>Uid</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tariffs as $tariff)
                <tr>
                    <td>{{ $tariff->description }}</td>
                    <td>{{ $tariff->code }}</td>
                    <td>{{ $tariff->uid }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['tariffs.destroy', $tariff->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('tariffs.show', [$tariff->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('tariffs.edit', [$tariff->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $tariffs])
        </div>
    </div>
</div>
