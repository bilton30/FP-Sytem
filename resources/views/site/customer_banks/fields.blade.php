<!-- Payment Uid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('payment_uid', 'Payment Uid:') !!}
    {!! Form::text('payment_uid', null, ['class' => 'form-control']) !!}
</div>

<!-- Customer Uid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customer_uid', 'Customer Uid:') !!}
    {!! Form::text('customer_uid', null, ['class' => 'form-control']) !!}
</div>

<!-- Transaction Field -->
<div class="form-group col-sm-6">
    {!! Form::label('transaction', 'Transaction:') !!}
    {!! Form::number('transaction', null, ['class' => 'form-control']) !!}
</div>

<!-- Transaction Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('transaction_type', 'Transaction Type:') !!}
    {!! Form::text('transaction_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount', 'Amount:') !!}
    {!! Form::number('amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Uid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('uid', 'Uid:') !!}
    {!! Form::text('uid', null, ['class' => 'form-control', 'required']) !!}
</div>