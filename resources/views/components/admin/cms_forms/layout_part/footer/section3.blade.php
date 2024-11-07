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
            <input type="text" name="section_slug" value="section_3" class="form-control" readonly>
        </div>

        <!-- Social Links -->

        <!-- Instagram Link Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('instagram_link', 'Instagram Link:', [ 'class' => 'required' ]) !!}
            {!! Form::url('instagram_link', $section3['instagram_link'] ?? null, ['class' => 'form-control', 'maxlength' => config('constants.character_limits.button_link'), 'required' => 'required']) !!}
        </div>
        
        <!-- Facebook Link Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('facebook_link', 'Facebook Link:', [ 'class' => 'required' ]) !!}
            {!! Form::url('facebook_link', $section3['facebook_link'] ?? null, ['class' => 'form-control', 'maxlength' => config('constants.character_limits.button_link'), 'required' => 'required']) !!}
        </div>
        
        <!-- Youtube Link Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('youtube_link', 'Youtube Link:', [ 'class' => 'required' ]) !!}
            {!! Form::url('youtube_link', $section3['youtube_link'] ?? null, ['class' => 'form-control', 'maxlength' => config('constants.character_limits.button_link'), 'required' => 'required']) !!}
        </div>


        <div class="form-group col-sm-12 mb-0"><!-- .card-footer -->
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            <a href="{{ url()->previous() }}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</form>