<!-- Balance Field -->
<div class="form-group col-sm-6">
    {!! Form::label('balance', 'Balance:') !!}
    {!! Form::number('balance', null, ['class' => 'form-control']) !!}
</div>

<!-- Debt Field -->
<div class="form-group col-sm-6">
    {!! Form::label('debt', 'Debt:') !!}
    {!! Form::number('debt', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Debt Count Field -->
<div class="form-group col-sm-6">
    {!! Form::label('debt_count', 'Debt Count:') !!}
    {!! Form::number('debt_count', null, ['class' => 'form-control']) !!}
</div>

<!-- Payment Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('payment_type', 'Payment Type:') !!}
    {!! Form::text('payment_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Counter Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('counter_number', 'Counter Number:') !!}
    {!! Form::text('counter_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Counter Details Field -->
<div class="form-group col-sm-6">
    {!! Form::label('counter_details', 'Counter Details:') !!}
    {!! Form::text('counter_details', null, ['class' => 'form-control']) !!}
</div>

<!-- Gend Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gend', 'Gend:') !!}
    {!! Form::text('gend', null, ['class' => 'form-control']) !!}
</div>

<!-- Tariff Uid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tariff_uid', 'Tariff Uid:') !!}
    {!! Form::text('tariff_uid', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', 'Code:') !!}
    {!! Form::text('code', null, ['class' => 'form-control']) !!}
</div>

<!-- Nuit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nuit', 'Nuit:') !!}
    {!! Form::text('nuit', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Contact1 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contact1', 'Contact1:') !!}
    {!! Form::text('contact1', null, ['class' => 'form-control']) !!}
</div>

<!-- Contact2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contact2', 'Contact2:') !!}
    {!! Form::text('contact2', null, ['class' => 'form-control']) !!}
</div>

<!-- Prefix Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prefix', 'Prefix:') !!}
    {!! Form::text('prefix', null, ['class' => 'form-control']) !!}
</div>

<!-- Birthday Field -->
<div class="form-group col-sm-6">
    {!! Form::label('birthday', 'Birthday:') !!}
    {!! Form::text('birthday', null, ['class' => 'form-control','id'=>'birthday']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#birthday').datepicker()
    </script>
@endpush

<!-- Natal At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('natal_at', 'Natal At:') !!}
    {!! Form::text('natal_at', null, ['class' => 'form-control','id'=>'natal_at']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#natal_at').datepicker()
    </script>
@endpush

<!-- New Year At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('new_year_at', 'New Year At:') !!}
    {!! Form::text('new_year_at', null, ['class' => 'form-control','id'=>'new_year_at']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#new_year_at').datepicker()
    </script>
@endpush

<!-- Address Neighborhood Uid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address_neighborhood_uid', 'Address Neighborhood Uid:') !!}
    {!! Form::text('address_neighborhood_uid', null, ['class' => 'form-control']) !!}
</div>

<!-- Adress Details Field -->
<div class="form-group col-sm-6">
    {!! Form::label('adress_details', 'Adress Details:') !!}
    {!! Form::text('adress_details', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::number('status', null, ['class' => 'form-control']) !!}
</div>

<!-- Tags Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tags', 'Tags:') !!}
    {!! Form::text('tags', null, ['class' => 'form-control']) !!}
</div>

<!-- Uid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('uid', 'Uid:') !!}
    {!! Form::text('uid', null, ['class' => 'form-control']) !!}
</div>