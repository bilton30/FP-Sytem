<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="address_neighborhoods-table">
            <thead>
            <tr>
                <th>District Uid</th>
                <th>Province Uid</th>
                <th>Name</th>
                <th>Uid</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($addressNeighborhoods as $addressNeighborhood)
                <tr>
                    <td>{{ $addressNeighborhood->district_uid }}</td>
                    <td>{{ $addressNeighborhood->province_uid }}</td>
                    <td>{{ $addressNeighborhood->name }}</td>
                    <td>{{ $addressNeighborhood->uid }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['addressNeighborhoods.destroy', $addressNeighborhood->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('addressNeighborhoods.show', [$addressNeighborhood->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('addressNeighborhoods.edit', [$addressNeighborhood->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $addressNeighborhoods])
        </div>
    </div>
</div>
