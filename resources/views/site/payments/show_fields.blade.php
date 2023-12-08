<!-- Uid Field -->
<div class="col-sm-12">
    {!! Form::label('uid', 'Uid:') !!}
    <p>{{ $payment->uid }}</p>
</div>

<!-- Reference Field -->
<div class="col-sm-12">
    {!! Form::label('reference', 'Reference:') !!}
    <p>{{ $payment->reference }}</p>
</div>

<!-- Customer Uid Field -->
<div class="col-sm-12">
    {!! Form::label('customer_uid', 'Customer Uid:') !!}
    <p>{{ $payment->customer_uid }}</p>
</div>

<!-- Payment Water Uid Field -->
<div class="col-sm-12">
    {!! Form::label('payment_water_uid', 'Payment Water Uid:') !!}
    <p>{{ $payment->payment_water_uid }}</p>
</div>

<!-- Payment Service Uid Field -->
<div class="col-sm-12">
    {!! Form::label('payment_service_uid', 'Payment Service Uid:') !!}
    <p>{{ $payment->payment_service_uid }}</p>
</div>

<!-- Payment Product Uid Field -->
<div class="col-sm-12">
    {!! Form::label('payment_product_uid', 'Payment Product Uid:') !!}
    <p>{{ $payment->payment_product_uid }}</p>
</div>

<!-- Payment Cashier Uid Field -->
<div class="col-sm-12">
    {!! Form::label('payment_cashier_uid', 'Payment Cashier Uid:') !!}
    <p>{{ $payment->payment_cashier_uid }}</p>
</div>

<!-- Payment Method Uid Field -->
<div class="col-sm-12">
    {!! Form::label('payment_method_uid', 'Payment Method Uid:') !!}
    <p>{{ $payment->payment_method_uid }}</p>
</div>

<!-- Total Field -->
<div class="col-sm-12">
    {!! Form::label('total', 'Total:') !!}
    <p>{{ $payment->total }}</p>
</div>

<!-- Total Received Field -->
<div class="col-sm-12">
    {!! Form::label('total_received', 'Total Received:') !!}
    <p>{{ $payment->total_received }}</p>
</div>

<!-- Changes Field -->
<div class="col-sm-12">
    {!! Form::label('changes', 'Changes:') !!}
    <p>{{ $payment->changes }}</p>
</div>

<!-- Deposited Changes Field -->
<div class="col-sm-12">
    {!! Form::label('deposited_changes', 'Deposited Changes:') !!}
    <p>{{ $payment->deposited_changes }}</p>
</div>

<!-- Confirmed At Field -->
<div class="col-sm-12">
    {!! Form::label('confirmed_at', 'Confirmed At:') !!}
    <p>{{ $payment->confirmed_at }}</p>
</div>

<!-- Confirmed User Uid Field -->
<div class="col-sm-12">
    {!! Form::label('confirmed_user_uid', 'Confirmed User Uid:') !!}
    <p>{{ $payment->confirmed_user_uid }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $payment->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $payment->updated_at }}</p>
</div>

