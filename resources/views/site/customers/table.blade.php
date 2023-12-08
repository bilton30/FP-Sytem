<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="customers-table">
            <thead>
            <tr>
                <th>Balance</th>
                <th>Debt</th>
                <th>Debt Count</th>
                <th>Payment Type</th>
                <th>Counter Number</th>
                <th>Counter Details</th>
                <th>Gend</th>
                <th>Tariff Uid</th>
                <th>Name</th>
                <th>Code</th>
                <th>Nuit</th>
                <th>Email</th>
                <th>Contact1</th>
                <th>Contact2</th>
                <th>Prefix</th>
                <th>Birthday</th>
                <th>Natal At</th>
                <th>New Year At</th>
                <th>Address Neighborhood Uid</th>
                <th>Adress Details</th>
                <th>Status</th>
                <th>Tags</th>
                <th>Uid</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($customers as $customer)
                <tr>
                    <td>{{ $customer->balance }}</td>
                    <td>{{ $customer->debt }}</td>
                    <td>{{ $customer->debt_count }}</td>
                    <td>{{ $customer->payment_type }}</td>
                    <td>{{ $customer->counter_number }}</td>
                    <td>{{ $customer->counter_details }}</td>
                    <td>{{ $customer->gend }}</td>
                    <td>{{ $customer->tariff_uid }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->code }}</td>
                    <td>{{ $customer->nuit }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->contact1 }}</td>
                    <td>{{ $customer->contact2 }}</td>
                    <td>{{ $customer->prefix }}</td>
                    <td>{{ $customer->birthday }}</td>
                    <td>{{ $customer->natal_at }}</td>
                    <td>{{ $customer->new_year_at }}</td>
                    <td>{{ $customer->address_neighborhood_uid }}</td>
                    <td>{{ $customer->adress_details }}</td>
                    <td>{{ $customer->status }}</td>
                    <td>{{ $customer->tags }}</td>
                    <td>{{ $customer->uid }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['customers.destroy', $customer->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('customers.show', [$customer->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('customers.edit', [$customer->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $customers])
        </div>
    </div>
</div>
