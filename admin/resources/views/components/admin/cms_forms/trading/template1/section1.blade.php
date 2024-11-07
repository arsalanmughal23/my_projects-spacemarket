<form action="{{ route('trading.update', $pageSlug) }}" method="post">
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
            <input type="text" name="section_slug" value="section_1" class="form-control" readonly>
        </div>

        <!-- Main Title Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('main_title', 'Main Title:', [ 'class' => 'required' ]) !!}
            {!! Form::textarea('main_title', $section1['main_title'] ?? null, ['class' => 'form-control summernote', 'maxlength' => config('constants.character_limits.main_title'), 'required' => 'required']) !!}
        </div>

        <!-- Sub Title Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('sub_title', 'Sub Title:', [ 'class' => 'required' ]) !!}
            {!! Form::text('sub_title', $section1['sub_title'] ?? null, ['class' => 'form-control', 'maxlength' => config('constants.character_limits.sub_title'), 'required' => 'required']) !!}
        </div>

        @if($pageSlug == 'account_types')
            <!-- Button Text Field -->
            <div class="form-group col-sm-12">
                {!! Form::label('button_text', 'Button Text:', [ 'class' => 'required' ]) !!}
                {!! Form::textarea('button_text', $section1['button_text'] ?? null, ['class' => 'form-control summernote', 'maxlength' => config('constants.character_limits.button_text'), 'required' => 'required']) !!}
            </div>

            <!-- Button Link Field -->
            <div class="form-group col-sm-12">
                {!! Form::label('button_link', 'Button Link:') !!}
                <!-- , [ 'class' => 'required' ] -->
                {!! Form::url('button_link', $section1['button_link'] ?? null, ['class' => 'form-control', 'maxlength' => config('constants.character_limits.button_link')]) !!}
                <!-- , 'required' => 'required' -->
            </div>
        @endif

        <div class="form-group col-sm-12 mb-0"><!-- .card-footer -->
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            <a href="{{ url()->previous() }}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</form>