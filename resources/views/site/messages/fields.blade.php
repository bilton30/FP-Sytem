<!-- Resend Uid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('resend_uid', 'Resend Uid:') !!}
    {!! Form::text('resend_uid', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Body Field -->
<div class="form-group col-sm-6">
    {!! Form::label('body', 'Body:') !!}
    {!! Form::text('body', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Sender Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sender', 'Sender:') !!}
    {!! Form::text('sender', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Destination Field -->
<div class="form-group col-sm-6">
    {!! Form::label('destination', 'Destination:') !!}
    {!! Form::text('destination', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Destination Uid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('destination_uid', 'Destination Uid:') !!}
    {!! Form::text('destination_uid', null, ['class' => 'form-control']) !!}
</div>

<!-- Destination Uid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('destination_uid', 'Destination Uid:') !!}
    {!! Form::text('destination_uid', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::number('status', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Report Message Field -->
<div class="form-group col-sm-6">
    {!! Form::label('report_message', 'Report Message:') !!}
    {!! Form::text('report_message', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Message Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_message', 'Status Message:') !!}
    {!! Form::text('status_message', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Json Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_json', 'Status Json:') !!}
    {!! Form::text('status_json', null, ['class' => 'form-control']) !!}
</div>

<!-- Sent At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sent_at', 'Sent At:') !!}
    {!! Form::text('sent_at', null, ['class' => 'form-control','id'=>'sent_at']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#sent_at').datepicker()
    </script>
@endpush

<!-- Cost Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cost', 'Cost:') !!}
    {!! Form::number('cost', null, ['class' => 'form-control']) !!}
</div>

<!-- Currency Field -->
<div class="form-group col-sm-6">
    {!! Form::label('currency', 'Currency:') !!}
    {!! Form::text('currency', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Plataform Field -->
<div class="form-group col-sm-6">
    {!! Form::label('plataform', 'Plataform:') !!}
    {!! Form::text('plataform', null, ['class' => 'form-control']) !!}
</div>

<!-- New Balance Field -->
<div class="form-group col-sm-6">
    {!! Form::label('new_balance', 'New Balance:') !!}
    {!! Form::number('new_balance', null, ['class' => 'form-control']) !!}
</div>

<!-- Registration Customer Uid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('registration_customer_uid', 'Registration Customer Uid:') !!}
    {!! Form::text('registration_customer_uid', null, ['class' => 'form-control']) !!}
</div>

<!-- Payment Uid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('payment_uid', 'Payment Uid:') !!}
    {!! Form::text('payment_uid', null, ['class' => 'form-control']) !!}
</div>

<!-- Debit Warning Uid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('debit_warning_uid', 'Debit Warning Uid:') !!}
    {!! Form::text('debit_warning_uid', null, ['class' => 'form-control']) !!}
</div>

<!-- Balance Warning User Uid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('balance_warning_user_uid', 'Balance Warning User Uid:') !!}
    {!! Form::text('balance_warning_user_uid', null, ['class' => 'form-control']) !!}
</div>

<!-- Bulk Uid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bulk_uid', 'Bulk Uid:') !!}
    {!! Form::text('bulk_uid', null, ['class' => 'form-control']) !!}
</div>

<!-- Tags Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tags', 'Tags:') !!}
    {!! Form::text('tags', null, ['class' => 'form-control']) !!}
</div>

<!-- Uid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('uid', 'Uid:') !!}
    {!! Form::text('uid', null, ['class' => 'form-control', 'required']) !!}
</div>