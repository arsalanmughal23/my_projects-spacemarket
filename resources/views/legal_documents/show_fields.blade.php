<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $legalDocument->name }}</p>
</div>

<!-- Document Field -->
<div class="col-sm-12">
    {!! Form::label('document', 'Document:') !!}
    <a href="{{ $legalDocument->file_link }}" target="_blank">
        <i class="fa fa-file"></i>
    </a>
</div>
