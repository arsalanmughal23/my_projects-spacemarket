@if($userRequest->type == 'contact_us')
    <!-- Department Field -->
    <div class="col-sm-12">
        {!! Form::label('department', 'Department:') !!}
        <p>{{ $userRequest->department?->name ?? '-' }}</p>
    </div>
@endif

<!-- Full Name Field -->
<div class="col-sm-12">
    {!! Form::label('full_name', 'Full Name:') !!}
    <p>{{ $userRequest->full_name }}</p>
</div>

<!-- Email Field -->
<div class="col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $userRequest->email }}</p>
</div>

<!-- Contact Number Field -->
<div class="col-sm-12">
    {!! Form::label('contact_number', 'Contact Number:') !!}
    <p>{{ $userRequest->contact_number }}</p>
</div>

@if(in_array($userRequest->type, [\App\Models\UserRequest::CONST_TYPE_DEPOSIT, \App\Models\UserRequest::CONST_TYPE_WITHDRAWAL]))
    <!-- Ticket Number Field -->
    <div class="col-sm-12">
        {!! Form::label('ticket_number', 'Ticket Number:') !!}
        <p>{{ $userRequest->ticket_number }}</p>
    </div>

    <!-- Trade Number Field -->
    <div class="col-sm-12">
        {!! Form::label('trade_number', 'Trade Number:') !!}
        <p>{{ $userRequest->trade_number }}</p>
    </div>
@endif

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $userRequest->description }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ \Carbon\Carbon::parse($userRequest->created_at)->format('d/M/Y'); }}</p>
</div>

<!-- Status Field -->
<!-- <div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $userRequest->status_text }}</p>
</div> -->

