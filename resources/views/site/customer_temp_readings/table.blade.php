<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="customer_temp_readings-table">
            <thead>
            <tr>
                <th>Reading Month</th>
                <th>Reading</th>
                <th>Customer Uid</th>
                <th>Uid</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($customerTempReadings as $customerTempReading)
                <tr>
                    <td>{{ $customerTempReading->reading_month }}</td>
                    <td>{{ $customerTempReading->reading }}</td>
                    <td>{{ $customerTempReading->customer_uid }}</td>
                    <td>{{ $customerTempReading->uid }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['customerTempReadings.destroy', $customerTempReading->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('customerTempReadings.show', [$customerTempReading->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('customerTempReadings.edit', [$customerTempReading->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $customerTempReadings])
        </div>
    </div>
</div>
