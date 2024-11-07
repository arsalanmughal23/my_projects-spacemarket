<form action="{{ route('partner.update', $pageSlug) }}" method="post">
    @csrf()
    <div class="row">
        <!-- Page Slug Name Field -->
        <div class="form-group col-sm-6">
            <label for="page">Page Slug Name</label>
            <input type="text" name="page_slug" value="partner_{{ $pageSlug }}" class="form-control" readonly>
        </div>

        <!-- Section Slug Name Field -->
        <div class="form-group col-sm-6">
            <label for="page">Section Slug Name</label>
            <input type="text" name="section_slug" value="section_2" class="form-control" readonly>
        </div>

        <!-- Main Title Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('main_title', 'Main Title:', [ 'class' => 'required' ]) !!}
            {!! Form::textarea('main_title', $section2['main_title'] ?? null, ['class' => 'form-control summernote', 'maxlength' => config('constants.character_limits.main_title'), 'required' => 'required']) !!}
        </div>

        <!-- Pre Description Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('pre_description', 'Pre Description:', [ 'class' => 'required' ]) !!}
            {!! Form::textarea('pre_description', $section2['pre_description'] ?? null, ['class' => 'form-control summernote','maxlength' => config('constants.character_limits.long_pre_description'), 'required' => 'required']) !!}
        </div>
        
        <!-- Post Description Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('post_description', 'Post Description:', [ 'class' => 'required' ]) !!}
            {!! Form::textarea('post_description', $section2['post_description'] ?? null, ['class' => 'form-control summernote','maxlength' => config('constants.character_limits.post_description'), 'required' => 'required']) !!}
        </div>

        <!-- Button Text Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('button_text', 'Button Text:', [ 'class' => 'required' ]) !!}
            {!! Form::textarea('button_text', $section2['button_text'] ?? null, ['class' => 'form-control summernote', 'maxlength' => config('constants.character_limits.button_text'), 'required' => 'required']) !!}
        </div>

        <!-- Button Link Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('button_link', 'Button Link:') !!}
            <!-- , [ 'class' => 'required' ] -->
            {!! Form::url('button_link', $section2['button_link'] ?? null, ['class' => 'form-control', 'maxlength' => config('constants.character_limits.button_link')]) !!}
            <!-- , 'required' => 'required' -->
        </div>

        <div class="form-group col-sm-12 mb-0"><!-- .card-footer -->
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            <a href="{{ url()->previous() }}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</form>