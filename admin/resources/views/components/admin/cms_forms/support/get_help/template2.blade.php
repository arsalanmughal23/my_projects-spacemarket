<form action="{{ route('support.update', $pageSlug) }}" method="post">
    @csrf()
    <div class="row">
        <!-- Page Slug Name Field -->
        <div class="form-group col-sm-6">
            <label for="page">Page Slug Name</label>
            <input type="text" name="page_slug" value="support_{{ $pageSlug }}" class="form-control" readonly>
        </div>

        <!-- Section Slug Name Field -->
        <div class="form-group col-sm-6">
            <label for="page">Section Slug Name</label>
            <input type="text" name="section_slug" value="section_{{ $sectionNumber }}" class="form-control" readonly>
        </div>

        <div class="form-group col-sm-12">
            {!! Form::label('email', 'Email:', [ 'class' => 'required' ]) !!}
            {!! Form::email('email', $section['email'] ?? null, ['class' => 'form-control', 'maxlength' => config('constants.character_limits.email'), 'required' => 'required']) !!}
        </div>
        <div class="form-group col-sm-12">
            {!! Form::label('title', 'Title:', [ 'class' => 'required' ]) !!}
            {!! Form::text('title', $section['title'] ?? null, ['class' => 'form-control', 'maxlength' => config('constants.character_limits.main_title'), 'required' => 'required']) !!}
        </div>
        <div class="form-group col-sm-12">
            {!! Form::label('short_description', 'Short Description:', [ 'class' => 'required' ]) !!}
            {!! Form::text('short_description', $section['short_description'] ?? null, ['class' => 'form-control', 'maxlength' => config('constants.character_limits.sub_title'), 'required' => 'required']) !!}
        </div>

        <div class="form-group col-sm-12 mb-0"><!-- .card-footer -->
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            <a href="{{ url()->previous() }}" class="btn btn-default">Cancel</a>
        </div>

    </div>
</form>