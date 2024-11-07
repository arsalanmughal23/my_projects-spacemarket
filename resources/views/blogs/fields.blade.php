<!-- Title Field -->
<div class="form-group col-sm-12">
    {!! Form::label('title', 'Title:', [ 'class' => 'required' ]) !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required', 'maxlength' => config('constants.character_limits.main_title')]) !!}
</div>

<!-- Banner Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('banner_image', 'Banner Image:', [ 'class' => ''.isset($blog) ? '' : 'required' ]) !!}
    <br>
    {!! Form::file('banner_image', ['class' => 'form-control', isset($blog) ? '' : 'required' => 'required', 'accept' => "image/png, image/jpg, image/jpeg"]) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', 'Image:', [ 'class' => ''.isset($blog) ? '' : 'required' ]) !!}
    <br>
    {!! Form::file('image', ['class' => 'form-control', isset($blog) ? '' : 'required' => 'required', 'accept' => "image/png, image/jpg, image/jpeg"]) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12">
    {!! Form::label('description', 'Description:', [ 'class' => 'required' ]) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control summernote', 'required' => 'required', 'maxlength' => config('constants.character_limits.extra_long_description')]) !!}
</div>
