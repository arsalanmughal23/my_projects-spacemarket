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
            <input type="text" name="section_slug" value="section_2" class="form-control" readonly>
        </div>

        <!-- Address Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('address', 'Address:', [ 'class' => 'required' ]) !!}
            {!! Form::textarea('address', $section2['address'] ?? null, ['class' => 'form-control summernote', 'maxlength' => config('constants.character_limits.address'), 'required' => 'required']) !!}
        </div>

        <!-- Email 1 Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('email1', 'Email 1:', [ 'class' => 'required' ]) !!}
            {!! Form::email('email1', $section2['email1'] ?? null, ['id' => 'section2__email1', 'class' => 'form-control', 'maxlength' => config('constants.character_limits.email'), 'required' => 'required']) !!}
        </div>
        <!-- Email 2 Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('email2', 'Email 2:', [ 'class' => 'required' ]) !!}
            {!! Form::email('email2', $section2['email2'] ?? null, ['id' => 'section2__email2', 'class' => 'form-control', 'maxlength' => config('constants.character_limits.email'), 'required' => 'required']) !!}
        </div>
        
        <!-- Number Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('phone_number', 'Number:', [ 'class' => 'required' ]) !!}
            {!! Form::text('phone_number', $section2['phone_number'] ?? null, ['id' => 'section2__phone_number', 'class' => 'form-control', 'maxlength' => config('constants.character_limits.contact_number'), 'required' => 'required']) !!}
        </div>
        <!-- Whatsapp Number Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('whatsapp_number', 'Whatsapp Number:', [ 'class' => 'required' ]) !!}
            {!! Form::text('whatsapp_number', $section2['whatsapp_number'] ?? null, ['id' => 'section2__Whatsapp_number', 'class' => 'form-control', 'maxlength' => config('constants.character_limits.contact_number'), 'required' => 'required']) !!}
        </div>

        <div class="form-group col-sm-12 mb-0"><!-- .card-footer -->
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            <a href="{{ url()->previous() }}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</form>