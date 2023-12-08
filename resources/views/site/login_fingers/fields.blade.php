<!-- Date Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_time', 'Date Time:') !!}
    {!! Form::text('date_time', null, ['class' => 'form-control','id'=>'date_time']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#date_time').datepicker()
    </script>
@endpush

<!-- Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date', 'Date:') !!}
    {!! Form::text('date', null, ['class' => 'form-control','id'=>'date']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#date').datepicker()
    </script>
@endpush

<!-- Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('time', 'Time:') !!}
    {!! Form::text('time', null, ['class' => 'form-control']) !!}
</div>

<!-- Device Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('device_name', 'Device Name:') !!}
    {!! Form::text('device_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Device Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('device_id', 'Device Id:') !!}
    {!! Form::text('device_id', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Person Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('person_name', 'Person Name:') !!}
    {!! Form::text('person_name', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Card Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('card_number', 'Card Number:') !!}
    {!! Form::text('card_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Uid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('uid', 'Uid:') !!}
    {!! Form::text('uid', null, ['class' => 'form-control', 'required']) !!}
</div>