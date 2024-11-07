<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:', [ 'class' => 'required' ]) !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'maxlength' => config('constants.character_limits.main_title'),'required' => 'required']) !!}
</div>
