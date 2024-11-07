<!-- Account Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('account_name', 'Account Name:', [ 'class' => 'required' ]) !!}
    {!! Form::text('account_name', null, ['required' => 'required', 'class' => 'form-control', 'maxlength' => config('constants.character_limits.account_type_table_field')]) !!}
</div>

<!-- Minimum Field -->
<div class="form-group col-sm-6">
    {!! Form::label('minimum', 'Minimum:', [ 'class' => 'required' ]) !!}
    {!! Form::text('minimum', null, ['required' => 'required', 'class' => 'form-control', 'maxlength' => config('constants.character_limits.account_type_table_field')]) !!}
</div>

<!-- Spread Field -->
<div class="form-group col-sm-6">
    {!! Form::label('spread', 'Spread:', [ 'class' => 'required' ]) !!}
    {!! Form::text('spread', null, ['required' => 'required', 'class' => 'form-control', 'maxlength' => config('constants.character_limits.account_type_table_field')]) !!}
</div>

<!-- Commission Field -->
<div class="form-group col-sm-6">
    {!! Form::label('commission', 'Commission:', [ 'class' => 'required' ]) !!}
    {!! Form::text('commission', null, ['required' => 'required', 'class' => 'form-control', 'maxlength' => config('constants.character_limits.account_type_table_field')]) !!}
</div>

<!-- Bonus Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bonus', 'Bonus:', [ 'class' => 'required' ]) !!}
    {!! Form::text('bonus', null, ['required' => 'required', 'class' => 'form-control', 'maxlength' => config('constants.character_limits.account_type_table_field')]) !!}
</div>

<!-- Platform Field -->
<div class="form-group col-sm-6">
    {!! Form::label('platform', 'Platform:', [ 'class' => 'required' ]) !!}
    {!! Form::text('platform', null, ['required' => 'required', 'class' => 'form-control', 'maxlength' => config('constants.character_limits.account_type_table_field')]) !!}
</div>

<!-- Leverage Field -->
<div class="form-group col-sm-6">
    {!! Form::label('leverage', 'Max Leverage:', [ 'class' => 'required' ]) !!}
    {!! Form::text('leverage', null, ['required' => 'required', 'class' => 'form-control', 'maxlength' => config('constants.character_limits.account_type_table_field')]) !!}
</div>