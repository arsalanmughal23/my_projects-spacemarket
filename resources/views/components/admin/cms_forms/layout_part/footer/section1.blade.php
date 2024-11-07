<form action="{{ route('layout_part.update', $pageSlug) }}" method="post">
    @csrf()
    <div class="row">
        <!-- Page Slug Name Field -->
        <div class="form-group col-sm-6">
            <label for="page">Page Slug Name</label>
            <input type="text" name="page_slug" value="layout_part_{{ $pageSlug }}" class="form-control" readonly>
        </div>

        <!-- Section Slug Name Field -->
        <div class="form-group col-sm-6">
            <label for="page">Section Slug Name</label>
            <input type="text" name="section_slug" value="section_1" class="form-control" readonly>
        </div>


        <!-- About Description Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('about_description', 'About Description:', [ 'class' => 'required' ]) !!}
            {!! Form::textarea('about_description', $section1['about_description'] ?? null, ['class' => 'form-control summernote', 'maxlength' => config('constants.character_limits.short_description'), 'required' => 'required']) !!}
        </div>


        <div class="form-group col-sm-12 mb-0"><!-- .card-footer -->
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            <a href="{{ url()->previous() }}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</form>