<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="invoice_contacts-table">
            <thead>
            <tr>
                <th>Contact</th>
                <th>Description</th>
                <th>Company Uid</th>
                <th>Uid</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($invoiceContacts as $invoiceContacts)
                <tr>
                    <td>{{ $invoiceContacts->contact }}</td>
                    <td>{{ $invoiceContacts->description }}</td>
                    <td>{{ $invoiceContacts->company_uid }}</td>
                    <td>{{ $invoiceContacts->uid }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['invoiceContacts.destroy', $invoiceContacts->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('invoiceContacts.show', [$invoiceContacts->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('invoiceContacts.edit', [$invoiceContacts->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $invoiceContacts])
        </div>
    </div>
</div>
