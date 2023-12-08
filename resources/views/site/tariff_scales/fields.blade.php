<!-- Tariff Uid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tariff_uid', 'Tariff Uid:') !!}
    {!! Form::text('tariff_uid', null, ['class' => 'form-control']) !!}
</div>

<!-- Start Quantity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('start_quantity', 'Start Quantity:') !!}
    {!! Form::number('start_quantity', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- End Quantity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('end_quantity', 'End Quantity:') !!}
    {!! Form::number('end_quantity', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::number('price', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Service Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('service_price', 'Service Price:') !!}
    {!! Form::number('service_price', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Minimum Quantity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('minimum_quantity', 'Minimum Quantity:') !!}
    {!! Form::number('minimum_quantity', null, ['class' => 'form-control']) !!}
</div>

<!-- Uid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('uid', 'Uid:') !!}
    {!! Form::text('uid', null, ['class' => 'form-control']) !!}
</div>