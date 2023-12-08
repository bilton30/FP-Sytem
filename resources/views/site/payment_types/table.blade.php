<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="payment_types-table">
            <thead>
            <tr>
                <th>Description</th>
                <th>Uid</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($paymentTypes as $paymentType)
                <tr>
                    <td>{{ $paymentType->description }}</td>
                    <td>{{ $paymentType->uid }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['paymentTypes.destroy', $paymentType->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('paymentTypes.show', [$paymentType->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('paymentTypes.edit', [$paymentType->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $paymentTypes])
        </div>
    </div>
</div>
