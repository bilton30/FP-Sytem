<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="payments-table">
            <thead>
            <tr>
                <th>Uid</th>
                <th>Reference</th>
                <th>Customer Uid</th>
                <th>Payment Water Uid</th>
                <th>Payment Service Uid</th>
                <th>Payment Product Uid</th>
                <th>Payment Cashier Uid</th>
                <th>Payment Method Uid</th>
                <th>Total</th>
                <th>Total Received</th>
                <th>Changes</th>
                <th>Deposited Changes</th>
                <th>Confirmed At</th>
                <th>Confirmed User Uid</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($payments as $payment)
                <tr>
                    <td>{{ $payment->uid }}</td>
                    <td>{{ $payment->reference }}</td>
                    <td>{{ $payment->customer_uid }}</td>
                    <td>{{ $payment->payment_water_uid }}</td>
                    <td>{{ $payment->payment_service_uid }}</td>
                    <td>{{ $payment->payment_product_uid }}</td>
                    <td>{{ $payment->payment_cashier_uid }}</td>
                    <td>{{ $payment->payment_method_uid }}</td>
                    <td>{{ $payment->total }}</td>
                    <td>{{ $payment->total_received }}</td>
                    <td>{{ $payment->changes }}</td>
                    <td>{{ $payment->deposited_changes }}</td>
                    <td>{{ $payment->confirmed_at }}</td>
                    <td>{{ $payment->confirmed_user_uid }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['payments.destroy', $payment->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('payments.show', [$payment->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('payments.edit', [$payment->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $payments])
        </div>
    </div>
</div>
