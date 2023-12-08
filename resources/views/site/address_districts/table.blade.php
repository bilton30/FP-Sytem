<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="address_districts-table">
            <thead>
            <tr>
                <th>Province Uid</th>
                <th>Name</th>
                <th>Uid</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($addressDistricts as $addressDistrict)
                <tr>
                    <td>{{ $addressDistrict->province_uid }}</td>
                    <td>{{ $addressDistrict->name }}</td>
                    <td>{{ $addressDistrict->uid }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['addressDistricts.destroy', $addressDistrict->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('addressDistricts.show', [$addressDistrict->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('addressDistricts.edit', [$addressDistrict->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $addressDistricts])
        </div>
    </div>
</div>
