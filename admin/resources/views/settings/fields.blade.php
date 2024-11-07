@role(\App\Models\Roles::ROLE_SUPER_ADMIN)
    <!-- Logo Field -->
    <div class="form-group col-sm-12 col-lg-12">
        {!! Form::label('logo', 'Logo:') !!}
        {!! Form::text('logo', null, ['class' => 'form-control', 'maxlength' => config('constants.character_limits.button_link')]) !!}
    </div>
@endrole

<!-- Login Link Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('login_link', 'Login Link:') !!}
    {!! Form::text('login_link', null, ['class' => 'form-control', 'maxlength' => config('constants.character_limits.button_link')]) !!}
</div>

<!-- Register Link Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('register_link', 'Register Link:') !!}
    {!! Form::text('register_link', null, ['class' => 'form-control', 'maxlength' => config('constants.character_limits.button_link')]) !!}
</div>