<!-- Contact Field -->
<div class="col-sm-12">
    {!! Form::label('contact', 'Contact:') !!}
    <p>{{ $invoiceContacts->contact }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $invoiceContacts->description }}</p>
</div>

<!-- Company Uid Field -->
<div class="col-sm-12">
    {!! Form::label('company_uid', 'Company Uid:') !!}
    <p>{{ $invoiceContacts->company_uid }}</p>
</div>

<!-- Uid Field -->
<div class="col-sm-12">
    {!! Form::label('uid', 'Uid:') !!}
    <p>{{ $invoiceContacts->uid }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $invoiceContacts->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $invoiceContacts->updated_at }}</p>
</div>

