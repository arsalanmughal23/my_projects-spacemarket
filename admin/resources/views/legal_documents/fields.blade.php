<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:', ['class' => 'required']) !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => config('constants.character_limits.legal_document_name_field'), 'required']) !!}
</div>

<!-- Document Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pdf_file', 'Document:', ['class' => ''.isset($legalDocument) ? '' : 'required']) !!}
    {!! Form::file('pdf_file', ['class' => 'form-control', 'accept' => "application/pdf", isset($legalDocument) ? '' : 'required' => 'required']) !!}
</div>
