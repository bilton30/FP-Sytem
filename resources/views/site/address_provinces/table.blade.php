<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="address_provinces-table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Uid</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($addressProvinces as $addressProvince)
                <tr>
                    <td>{{ $addressProvince->name }}</td>
                    <td>{{ $addressProvince->uid }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['addressProvinces.destroy', $addressProvince->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('addressProvinces.show', [$addressProvince->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('addressProvinces.edit', [$addressProvince->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $addressProvinces])
        </div>
    </div>
</div>
