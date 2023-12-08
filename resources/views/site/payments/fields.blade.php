<!-- Uid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('uid', 'Uid:') !!}
    {!! Form::text('uid', null, ['class' => 'form-control']) !!}
</div>

<!-- Reference Field -->
<div class="form-group col-sm-6">
    {!! Form::label('reference', 'Reference:') !!}
    {!! Form::text('reference', null, ['class' => 'form-control']) !!}
</div>

<!-- Customer Uid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customer_uid', 'Customer Uid:') !!}
    {!! Form::text('customer_uid', null, ['class' => 'form-control']) !!}
</div>

<!-- Payment Water Uid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('payment_water_uid', 'Payment Water Uid:') !!}
    {!! Form::text('payment_water_uid', null, ['class' => 'form-control']) !!}
</div>

<!-- Payment Service Uid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('payment_service_uid', 'Payment Service Uid:') !!}
    {!! Form::text('payment_service_uid', null, ['class' => 'form-control']) !!}
</div>

<!-- Payment Product Uid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('payment_product_uid', 'Payment Product Uid:') !!}
    {!! Form::text('payment_product_uid', null, ['class' => 'form-control']) !!}
</div>

<!-- Payment Cashier Uid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('payment_cashier_uid', 'Payment Cashier Uid:') !!}
    {!! Form::text('payment_cashier_uid', null, ['class' => 'form-control']) !!}
</div>

<!-- Payment Method Uid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('payment_method_uid', 'Payment Method Uid:') !!}
    {!! Form::text('payment_method_uid', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total', 'Total:') !!}
    {!! Form::number('total', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Total Received Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_received', 'Total Received:') !!}
    {!! Form::number('total_received', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Changes Field -->
<div class="form-group col-sm-6">
    {!! Form::label('changes', 'Changes:') !!}
    {!! Form::number('changes', null, ['class' => 'form-control']) !!}
</div>

<!-- Deposited Changes Field -->
<div class="form-group col-sm-6">
    {!! Form::label('deposited_changes', 'Deposited Changes:') !!}
    {!! Form::number('deposited_changes', null, ['class' => 'form-control']) !!}
</div>

<!-- Confirmed At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('confirmed_at', 'Confirmed At:') !!}
    {!! Form::text('confirmed_at', null, ['class' => 'form-control','id'=>'confirmed_at']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#confirmed_at').datepicker()
    </script>
@endpush

<!-- Confirmed User Uid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('confirmed_user_uid', 'Confirmed User Uid:') !!}
    {!! Form::text('confirmed_user_uid', null, ['class' => 'form-control']) !!}
</div>