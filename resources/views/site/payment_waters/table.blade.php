<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="payment_waters-table">
            <thead>
            <tr>
                <th>Recharge</th>
                <th>Customer Uid</th>
                <th>Product Uid</th>
                <th>Tariff Uid</th>
                <th>Description</th>
                <th>Code</th>
                <th>Quantity</th>
                <th>Reading Month</th>
                <th>Reading</th>
                <th>Last Reading</th>
                <th>Price</th>
                <th>Calculation Details</th>
                <th>Payment Type</th>
                <th>Total Price</th>
                <th>Subtotal</th>
                <th>Debit Day</th>
                <th>Tax Uid</th>
                <th>Tax Name</th>
                <th>Tax Total</th>
                <th>Tax Percentage</th>
                <th>Service Charge</th>
                <th>Debit</th>
                <th>Total Payed</th>
                <th>Confirmed At</th>
                <th>Uid</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($paymentWaters as $paymentWater)
                <tr>
                    <td>{{ $paymentWater->recharge }}</td>
                    <td>{{ $paymentWater->customer_uid }}</td>
                    <td>{{ $paymentWater->product_uid }}</td>
                    <td>{{ $paymentWater->tariff_uid }}</td>
                    <td>{{ $paymentWater->description }}</td>
                    <td>{{ $paymentWater->code }}</td>
                    <td>{{ $paymentWater->quantity }}</td>
                    <td>{{ $paymentWater->reading_month }}</td>
                    <td>{{ $paymentWater->reading }}</td>
                    <td>{{ $paymentWater->last_reading }}</td>
                    <td>{{ $paymentWater->price }}</td>
                    <td>{{ $paymentWater->calculation_details }}</td>
                    <td>{{ $paymentWater->payment_type }}</td>
                    <td>{{ $paymentWater->total_price }}</td>
                    <td>{{ $paymentWater->subtotal }}</td>
                    <td>{{ $paymentWater->debit_day }}</td>
                    <td>{{ $paymentWater->tax_uid }}</td>
                    <td>{{ $paymentWater->tax_name }}</td>
                    <td>{{ $paymentWater->tax_total }}</td>
                    <td>{{ $paymentWater->tax_percentage }}</td>
                    <td>{{ $paymentWater->service_charge }}</td>
                    <td>{{ $paymentWater->debit }}</td>
                    <td>{{ $paymentWater->total_payed }}</td>
                    <td>{{ $paymentWater->confirmed_at }}</td>
                    <td>{{ $paymentWater->uid }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['paymentWaters.destroy', $paymentWater->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('paymentWaters.show', [$paymentWater->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('paymentWaters.edit', [$paymentWater->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $paymentWaters])
        </div>
    </div>
</div>
