<!-- Code Field -->
<div class="col-sm-12">
    {!! Form::label('code', 'Code:') !!}
    <p>{{ $tax->code }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $tax->description }}</p>
</div>

<!-- Percentage Field -->
<div class="col-sm-12">
    {!! Form::label('percentage', 'Percentage:') !!}
    <p>{{ $tax->percentage }}</p>
</div>

<!-- Uid Field -->
<div class="col-sm-12">
    {!! Form::label('uid', 'Uid:') !!}
    <p>{{ $tax->uid }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $tax->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $tax->updated_at }}</p>
</div>

