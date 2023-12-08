<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="message_balances-table">
            <thead>
            <tr>
                <th>Balance</th>
                <th>Uid</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($messageBalances as $messageBalance)
                <tr>
                    <td>{{ $messageBalance->balance }}</td>
                    <td>{{ $messageBalance->uid }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['messageBalances.destroy', $messageBalance->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('messageBalances.show', [$messageBalance->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('messageBalances.edit', [$messageBalance->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $messageBalances])
        </div>
    </div>
</div>
