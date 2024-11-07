<form action="{{ route('trading.update', $pageSlug) }}" method="post" enctype="multipart/form-data">
    @csrf()
    <div class="row">
        <!-- Page Slug Name Field -->
        <div class="form-group col-sm-6">
            <label for="page">Page Slug Name</label>
            <input type="text" name="page_slug" value="trading_{{ $pageSlug }}" class="form-control" readonly>
        </div>

        <!-- Section Slug Name Field -->
        <div class="form-group col-sm-6">
            <label for="page">Section Slug Name</label>
            <input type="text" name="section_slug" value="section_2" class="form-control" readonly>
        </div>

        <!-- Pre Title Field -->
        <!-- <div class="form-group col-sm-12">
            {!! Form::label('pre_title', 'Pre Title:', [ 'class' => 'required' ]) !!}
            {!! Form::text('pre_title', $section2['pre_title'] ?? null, ['class' => 'form-control', 'maxlength' => config('constants.character_limits.pre_title'), 'required' => 'required']) !!}
        </div> -->

        <!-- Main Title Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('main_title', 'Main Title:', [ 'class' => 'required' ]) !!}
            {!! Form::textarea('main_title', $section2['main_title'] ?? null, ['class' => 'form-control summernote', 'maxlength' => config('constants.character_limits.main_title'), 'required' => 'required']) !!}
        </div>
        
        <!-- Video Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('video', 'Video:') !!}
            <!-- , [ 'class' => 'required' ] -->
            {!! Form::file('video', ['class' => 'form-control', 'accept' => "video/mp4,video/webm,video/mpeg"]) !!}
            <!-- 'video/mp4,video/webm,video/ogg,video/x-msvideo,video/mpeg,video/quicktime' -->
        </div>

        <div class="form-group col-sm-12 mb-0"><!-- .card-footer -->
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            <a href="{{ url()->previous() }}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</form>