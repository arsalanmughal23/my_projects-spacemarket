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


        <!-- Login Link Field -->
        <div class="form-group col-sm-12 col-lg-12">
            {!! Form::label('login_link', 'Login Link:') !!}
            {!! Form::url('login_link', $section1['login_link'] ?? null, ['class' => 'form-control', 'maxlength' => config('constants.character_limits.button_link')]) !!}
        </div>

        <!-- Register Link Field -->
        <div class="form-group col-sm-12 col-lg-12">
            {!! Form::label('register_link', 'Register Link:') !!}
            {!! Form::url('register_link', $section1['register_link'] ?? null, ['class' => 'form-control', 'maxlength' => config('constants.character_limits.button_link')]) !!}
        </div>


        <div class="form-group col-sm-12 mb-0"><!-- .card-footer -->
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            <a href="{{ url()->previous() }}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</form>