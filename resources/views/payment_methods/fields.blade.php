<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'maxlength' => config('constants.character_limits.main_title')]) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', 'Image:') !!}
    <br>
    {!! Form::file('image', ['class' => 'form-control', 'required' => 'required', 'accept' => "image/png, image/jpg, image/jpeg"]) !!}
</div>

<!-- Is Deposit Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('is_deposit', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('is_deposit', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('is_deposit', 'Is Deposit', ['class' => 'form-check-label']) !!}
    </div>
</div>


<!-- Is Withdrawal Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('is_withdrawal', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('is_withdrawal', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('is_withdrawal', 'Is Withdrawal', ['class' => 'form-check-label']) !!}
    </div>
</div>
