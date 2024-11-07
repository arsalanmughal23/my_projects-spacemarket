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
            <input type="text" name="section_slug" value="section_2" class="form-control" readonly>
        </div>


        <!-- Risk Disclosure and Warning Notice Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('risk_disclosure_and_warning_notice', 'Risk Disclosure and Warning Notice:', [ 'class' => 'required' ]) !!}
            {!! Form::textarea('risk_disclosure_and_warning_notice', $section2['risk_disclosure_and_warning_notice'] ?? null, ['class' => 'form-control summernote', 'maxlength' => config('constants.character_limits.long_pre_description'), 'required' => 'required']) !!}
        </div>
        
        <!-- Disclaimer Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('disclaimer', 'Disclaimer:', [ 'class' => 'required' ]) !!}
            {!! Form::textarea('disclaimer', $section2['disclaimer'] ?? null, ['class' => 'form-control summernote', 'maxlength' => config('constants.character_limits.short_description'), 'required' => 'required']) !!}
        </div>
        
        <!-- Legal And Regulation Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('legal_and_regulation', 'Legal And Regulation:', [ 'class' => 'required' ]) !!}
            {!! Form::textarea('legal_and_regulation', $section2['legal_and_regulation'] ?? null, ['class' => 'form-control summernote', 'maxlength' => config('constants.character_limits.short_description'), 'required' => 'required']) !!}
        </div>
        
        <!-- Registered address Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('registered_address', 'Registered Address:', [ 'class' => 'required' ]) !!}
            {!! Form::textarea('registered_address', $section2['registered_address'] ?? null, ['class' => 'form-control summernote', 'maxlength' => config('constants.character_limits.short_description'), 'required' => 'required']) !!}
        </div>


        <div class="form-group col-sm-12 mb-0"><!-- .card-footer -->
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            <a href="{{ url()->previous() }}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</form>