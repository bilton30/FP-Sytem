<!-- Reading Month Field -->
<div class="col-sm-12">
    {!! Form::label('reading_month', 'Reading Month:') !!}
    <p>{{ $customerTempReading->reading_month }}</p>
</div>

<!-- Reading Field -->
<div class="col-sm-12">
    {!! Form::label('reading', 'Reading:') !!}
    <p>{{ $customerTempReading->reading }}</p>
</div>

<!-- Customer Uid Field -->
<div class="col-sm-12">
    {!! Form::label('customer_uid', 'Customer Uid:') !!}
    <p>{{ $customerTempReading->customer_uid }}</p>
</div>

<!-- Uid Field -->
<div class="col-sm-12">
    {!! Form::label('uid', 'Uid:') !!}
    <p>{{ $customerTempReading->uid }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $customerTempReading->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $customerTempReading->updated_at }}</p>
</div>

