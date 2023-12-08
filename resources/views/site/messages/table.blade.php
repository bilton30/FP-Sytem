<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="messages-table">
            <thead>
            <tr>
                <th>Resend Uid</th>
                <th>Body</th>
                <th>Sender</th>
                <th>Destination</th>
                <th>Destination Uid</th>
                <th>Destination Uid</th>
                <th>Status</th>
                <th>Report Message</th>
                <th>Status Message</th>
                <th>Status Json</th>
                <th>Sent At</th>
                <th>Cost</th>
                <th>Currency</th>
                <th>Plataform</th>
                <th>New Balance</th>
                <th>Registration Customer Uid</th>
                <th>Payment Uid</th>
                <th>Debit Warning Uid</th>
                <th>Balance Warning User Uid</th>
                <th>Bulk Uid</th>
                <th>Tags</th>
                <th>Uid</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($messages as $message)
                <tr>
                    <td>{{ $message->resend_uid }}</td>
                    <td>{{ $message->body }}</td>
                    <td>{{ $message->sender }}</td>
                    <td>{{ $message->destination }}</td>
                    <td>{{ $message->destination_uid }}</td>
                    <td>{{ $message->destination_uid }}</td>
                    <td>{{ $message->status }}</td>
                    <td>{{ $message->report_message }}</td>
                    <td>{{ $message->status_message }}</td>
                    <td>{{ $message->status_json }}</td>
                    <td>{{ $message->sent_at }}</td>
                    <td>{{ $message->cost }}</td>
                    <td>{{ $message->currency }}</td>
                    <td>{{ $message->plataform }}</td>
                    <td>{{ $message->new_balance }}</td>
                    <td>{{ $message->registration_customer_uid }}</td>
                    <td>{{ $message->payment_uid }}</td>
                    <td>{{ $message->debit_warning_uid }}</td>
                    <td>{{ $message->balance_warning_user_uid }}</td>
                    <td>{{ $message->bulk_uid }}</td>
                    <td>{{ $message->tags }}</td>
                    <td>{{ $message->uid }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['messages.destroy', $message->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('messages.show', [$message->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('messages.edit', [$message->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $messages])
        </div>
    </div>
</div>
