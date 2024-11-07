<!-- Logo Field -->
<div class="col-sm-12">
    {!! Form::label('logo', 'Logo:') !!}
    <p>{{ $setting->logo }}</p>
</div>

<!-- Login Link Field -->
<div class="col-sm-12">
    {!! Form::label('login_link', 'Login Link:') !!}
    <p>{{ $setting->login_link }}</p>
</div>

<!-- Register Link Field -->
<div class="col-sm-12">
    {!! Form::label('register_link', 'Register Link:') !!}
    <p>{{ $setting->register_link }}</p>
</div>

