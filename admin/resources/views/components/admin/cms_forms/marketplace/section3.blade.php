<form action="{{ route('marketplace.update', $pageSlug) }}" method="post">
    @csrf()
    <div class="row">
        <!-- Page Slug Name Field -->
        <div class="form-group col-sm-6">
            <label for="page">Page Slug Name</label>
            <input type="text" name="page_slug" value="marketplace_{{ $pageSlug }}" class="form-control" readonly>
        </div>

        <!-- Section Slug Name Field -->
        <div class="form-group col-sm-6">
            <label for="page">Section Slug Name</label>
            <input type="text" name="section_slug" value="section_3" class="form-control" readonly>
        </div>
        
        <!-- Pre Title Field -->
        <!-- <div class="form-group col-sm-12">
            {!! Form::label('pre_title', 'Pre Title:', [ 'class' => 'required' ]) !!}
            {!! Form::text('pre_title', $section3['pre_title'] ?? null, ['class' => 'form-control', 'maxlength' => config('constants.character_limits.pre_title'), 'required' => 'required']) !!}
        </div> -->

        <!-- Main Title Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('main_title', 'Main Title:', [ 'class' => 'required' ]) !!}
            {!! Form::textarea('main_title', $section3['main_title'] ?? null, ['class' => 'form-control summernote', 'maxlength' => config('constants.character_limits.main_title'), 'required' => 'required']) !!}
        </div>

        <!-- Description Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('description', 'Description:', [ 'class' => 'required' ]) !!}
            {!! Form::textarea('description', $section3['description'] ?? null, ['class' => 'form-control summernote', 'maxlength' => config('constants.character_limits.normal_description'), 'required' => 'required']) !!}
        </div>

        <div class="form-group col-sm-12 mb-0">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            <a href="{{ url()->previous() }}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</form>