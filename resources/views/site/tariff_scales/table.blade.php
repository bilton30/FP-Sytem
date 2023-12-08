<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="tariff_scales-table">
            <thead>
            <tr>
                <th>Tariff Uid</th>
                <th>Start Quantity</th>
                <th>End Quantity</th>
                <th>Price</th>
                <th>Service Price</th>
                <th>Minimum Quantity</th>
                <th>Uid</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tariffScales as $tariffScale)
                <tr>
                    <td>{{ $tariffScale->tariff_uid }}</td>
                    <td>{{ $tariffScale->start_quantity }}</td>
                    <td>{{ $tariffScale->end_quantity }}</td>
                    <td>{{ $tariffScale->price }}</td>
                    <td>{{ $tariffScale->service_price }}</td>
                    <td>{{ $tariffScale->minimum_quantity }}</td>
                    <td>{{ $tariffScale->uid }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['tariffScales.destroy', $tariffScale->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('tariffScales.show', [$tariffScale->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('tariffScales.edit', [$tariffScale->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $tariffScales])
        </div>
    </div>
</div>
