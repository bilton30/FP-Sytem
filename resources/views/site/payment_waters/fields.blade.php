<!-- Recharge Field -->
<div class="form-group col-sm-6">
    {!! Form::label('recharge', 'Recharge:') !!}
    {!! Form::text('recharge', null, ['class' => 'form-control']) !!}
</div>

<!-- Customer Uid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customer_uid', 'Customer Uid:') !!}
    {!! Form::text('customer_uid', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Product Uid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_uid', 'Product Uid:') !!}
    {!! Form::text('product_uid', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Tariff Uid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tariff_uid', 'Tariff Uid:') !!}
    {!! Form::text('tariff_uid', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', 'Code:') !!}
    {!! Form::text('code', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Quantity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quantity', 'Quantity:') !!}
    {!! Form::number('quantity', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Reading Month Field -->
<div class="form-group col-sm-6">
    {!! Form::label('reading_month', 'Reading Month:') !!}
    {!! Form::text('reading_month', null, ['class' => 'form-control','id'=>'reading_month']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#reading_month').datepicker()
    </script>
@endpush

<!-- Reading Field -->
<div class="form-group col-sm-6">
    {!! Form::label('reading', 'Reading:') !!}
    {!! Form::number('reading', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Last Reading Field -->
<div class="form-group col-sm-6">
    {!! Form::label('last_reading', 'Last Reading:') !!}
    {!! Form::number('last_reading', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::number('price', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Calculation Details Field -->
<div class="form-group col-sm-6">
    {!! Form::label('calculation_details', 'Calculation Details:') !!}
    {!! Form::text('calculation_details', null, ['class' => 'form-control']) !!}
</div>

<!-- Payment Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('payment_type', 'Payment Type:') !!}
    {!! Form::text('payment_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_price', 'Total Price:') !!}
    {!! Form::number('total_price', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Subtotal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subtotal', 'Subtotal:') !!}
    {!! Form::number('subtotal', null, ['class' => 'form-control']) !!}
</div>

<!-- Debit Day Field -->
<div class="form-group col-sm-6">
    {!! Form::label('debit_day', 'Debit Day:') !!}
    {!! Form::text('debit_day', null, ['class' => 'form-control','id'=>'debit_day']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#debit_day').datepicker()
    </script>
@endpush

<!-- Tax Uid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tax_uid', 'Tax Uid:') !!}
    {!! Form::text('tax_uid', null, ['class' => 'form-control']) !!}
</div>

<!-- Tax Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tax_name', 'Tax Name:') !!}
    {!! Form::text('tax_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Tax Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tax_total', 'Tax Total:') !!}
    {!! Form::number('tax_total', null, ['class' => 'form-control']) !!}
</div>

<!-- Tax Percentage Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tax_percentage', 'Tax Percentage:') !!}
    {!! Form::number('tax_percentage', null, ['class' => 'form-control']) !!}
</div>

<!-- Service Charge Field -->
<div class="form-group col-sm-6">
    {!! Form::label('service_charge', 'Service Charge:') !!}
    {!! Form::number('service_charge', null, ['class' => 'form-control']) !!}
</div>

<!-- Debit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('debit', 'Debit:') !!}
    {!! Form::number('debit', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Payed Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_payed', 'Total Payed:') !!}
    {!! Form::number('total_payed', null, ['class' => 'form-control']) !!}
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

<!-- Uid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('uid', 'Uid:') !!}
    {!! Form::text('uid', null, ['class' => 'form-control', 'required']) !!}
</div>