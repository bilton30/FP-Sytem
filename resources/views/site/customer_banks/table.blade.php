<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="customer_banks-table">
            <thead>
            <tr>
                <th>Payment Uid</th>
                <th>Customer Uid</th>
                <th>Transaction</th>
                <th>Transaction Type</th>
                <th>Amount</th>
                <th>Uid</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($customerBanks as $customerBank)
                <tr>
                    <td>{{ $customerBank->payment_uid }}</td>
                    <td>{{ $customerBank->customer_uid }}</td>
                    <td>{{ $customerBank->transaction }}</td>
                    <td>{{ $customerBank->transaction_type }}</td>
                    <td>{{ $customerBank->amount }}</td>
                    <td>{{ $customerBank->uid }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['customerBanks.destroy', $customerBank->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('customerBanks.show', [$customerBank->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('customerBanks.edit', [$customerBank->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $customerBanks])
        </div>
    </div>
</div>
