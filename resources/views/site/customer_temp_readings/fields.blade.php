<!-- Reading Month Field -->
<div class="form-group col-sm-6">
    {!! Form::label('reading_month', 'Reading Month:') !!}
    {!! Form::text('reading_month', null, ['class' => 'form-control']) !!}
</div>

<!-- Reading Field -->
<div class="form-group col-sm-6">
    {!! Form::label('reading', 'Reading:') !!}
    {!! Form::text('reading', null, ['class' => 'form-control']) !!}
</div>

<!-- Customer Uid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customer_uid', 'Customer Uid:') !!}
    {!! Form::text('customer_uid', null, ['class' => 'form-control']) !!}
</div>

<!-- Uid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('uid', 'Uid:') !!}
    {!! Form::text('uid', null, ['class' => 'form-control', 'required']) !!}
</div>