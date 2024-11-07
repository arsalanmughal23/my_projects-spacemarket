<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', 'Type:') !!}
    <select name="type" required class="form-control select">
        <option value="" selected disabled>Select Type</option>
        @foreach(\App\Models\UserRequest::TYPES as $type)
            <option value="{{ $type }}" {{ Request::get('type', $userRequest->type ?? null) == $type ? 'selected' : '' }} >{{ $type }}</option>
        @endforeach
    </select>
</div>

<!-- Full Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('full_name', 'Full Name:') !!}
    {!! Form::text('full_name', null, ['class' => 'form-control', 'maxlength' => config('constants.character_limits.main_title')]) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control', 'maxlength' => config('constants.character_limits.email')]) !!}
</div>

<!-- Contact Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contact_number', 'Contact Number:') !!}
    {!! Form::text('contact_number', null, ['class' => 'form-control', 'maxlength' => config('constants.character_limits.contact_number')]) !!}
</div>

@php $departments = getDepartments(); @endphp

@if($userRequest->type == \App\Models\UserRequest::CONST_TYPE_CONTACT_US)
    <!-- Department Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('department_id', 'Department Id:') !!}
        <select name="department_id" id="" required>
            <option value="" selected disabled>Select Department</option>
            @foreach($departments as $index => $department)        
                <option value="{{ $department->id }}" {{ $department->id == $userRequest->department_id ? 'selected' : 'disabled' }}>{{ $department->name }}</option>
            @endforeach
        </select>
    </div>
@endif

@if(in_array($userRequest->type, [\App\Models\UserRequest::CONST_TYPE_DEPOSIT, \App\Models\UserRequest::CONST_TYPE_WITHDRAWAL]))
    <!-- Ticket Number Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('ticket_number', 'Ticket Number:') !!}
        {!! Form::text('ticket_number', null, ['class' => 'form-control', 'maxlength' => config('constants.character_limits.ticket_number')]) !!}
    </div>

    <!-- Trade Number Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('trade_number', 'Trade Number:') !!}
        {!! Form::text('trade_number', null, ['class' => 'form-control', 'maxlength' => config('constants.character_limits.trade_number')]) !!}
    </div>
@endif

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control', 'maxlength' => config('constants.character_limits.short_description')]) !!}
</div>

<!-- Status Field -->
<!-- <div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('status', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('status', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('status', 'Status', ['class' => 'form-check-label']) !!}
    </div>
</div> -->
