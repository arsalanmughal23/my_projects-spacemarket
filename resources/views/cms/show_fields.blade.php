<!-- Page Slug Field -->
<div class="col-sm-12">
    {!! Form::label('page_slug', 'Page Slug:') !!}
    <p>{{ $cms->page_slug }}</p>
</div>

<!-- Section Slug Field -->
<div class="col-sm-12">
    {!! Form::label('section_slug', 'Section Slug:') !!}
    <p>{{ $cms->section_slug }}</p>
</div>

<!-- Key Field -->
<div class="col-sm-12">
    {!! Form::label('key', 'Key:') !!}
    <p>{{ $cms->key }}</p>
</div>

<!-- Value Field -->
<div class="col-sm-12">
    {!! Form::label('value', 'Value:') !!}
    <p>{{ $cms->value }}</p>
</div>

