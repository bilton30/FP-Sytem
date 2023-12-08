<!-- Title Field -->
<div class="col-sm-12">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $invoiceInfo->title }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $invoiceInfo->description }}</p>
</div>

<!-- Category Uid Field -->
<div class="col-sm-12">
    {!! Form::label('category_uid', 'Category Uid:') !!}
    <p>{{ $invoiceInfo->category_uid }}</p>
</div>

<!-- Uid Field -->
<div class="col-sm-12">
    {!! Form::label('uid', 'Uid:') !!}
    <p>{{ $invoiceInfo->uid }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $invoiceInfo->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $invoiceInfo->updated_at }}</p>
</div>

