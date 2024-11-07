<form action="{{ route('home.update') }}" method="post">
    @csrf()
    <div class="row">
        <!-- Page Slug Name Field -->
        <div class="form-group col-sm-6">
            <label for="page">Page Slug Name</label>
            <input type="text" name="page_slug" value="home" class="form-control" readonly>
        </div>

        <!-- Section Slug Name Field -->
        <div class="form-group col-sm-6">
            <label for="page">Section Slug Name</label>
            <input type="text" name="section_slug" value="section_3" class="form-control" readonly>
        </div>

        <!-- Main Title Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('main_title', 'Main Title:', [ 'class' => 'required' ]) !!}
            {!! Form::textarea('main_title', $section3['main_title'] ?? null, ['class' => 'form-control summernote', 'maxlength' => config('constants.character_limits.main_title'), 'required' => 'required']) !!}
        </div>

        <!-- Sub Title Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('sub_title', 'Sub Title:', [ 'class' => 'required' ]) !!}
            {!! Form::text('sub_title', $section3['sub_title'] ?? null, ['class' => 'form-control', 'maxlength' => config('constants.character_limits.sub_title'), 'required' => 'required']) !!}
        </div>

        <!-- Description Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('description', 'Description:', [ 'class' => 'required' ]) !!}
            {!! Form::textarea('description', $section3['description'] ?? null, ['class' => 'form-control summernote', 'maxlength' => config('constants.character_limits.short_description'), 'required' => 'required']) !!}
        </div>

        <!-- Button Text Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('button_text', 'Button Text:', [ 'class' => 'required' ]) !!}
            {!! Form::textarea('button_text', $section3['button_text'] ?? null, ['class' => 'form-control summernote', 'maxlength' => config('constants.character_limits.button_text'), 'required' => 'required']) !!}
        </div>

        <!-- Button Link Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('button_link', 'Button Link:') !!}
            {!! Form::url('button_link', $section3['button_link'] ?? null, ['class' => 'form-control', 'maxlength' => config('constants.character_limits.button_link')]) !!}
        </div>

        <div class="form-group col-sm-12 mb-0">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            <a href="{{ url()->previous() }}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</form>