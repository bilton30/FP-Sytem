<!-- Payment Uid Field -->
<div class="col-sm-12">
    {!! Form::label('payment_uid', 'Payment Uid:') !!}
    <p>{{ $customerBank->payment_uid }}</p>
</div>

<!-- Customer Uid Field -->
<div class="col-sm-12">
    {!! Form::label('customer_uid', 'Customer Uid:') !!}
    <p>{{ $customerBank->customer_uid }}</p>
</div>

<!-- Transaction Field -->
<div class="col-sm-12">
    {!! Form::label('transaction', 'Transaction:') !!}
    <p>{{ $customerBank->transaction }}</p>
</div>

<!-- Transaction Type Field -->
<div class="col-sm-12">
    {!! Form::label('transaction_type', 'Transaction Type:') !!}
    <p>{{ $customerBank->transaction_type }}</p>
</div>

<!-- Amount Field -->
<div class="col-sm-12">
    {!! Form::label('amount', 'Amount:') !!}
    <p>{{ $customerBank->amount }}</p>
</div>

<!-- Uid Field -->
<div class="col-sm-12">
    {!! Form::label('uid', 'Uid:') !!}
    <p>{{ $customerBank->uid }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $customerBank->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $customerBank->updated_at }}</p>
</div>

