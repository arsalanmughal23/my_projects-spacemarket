<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $paymentMethod->name }}</p>
</div>

<!-- Image Field -->
<div class="col-sm-12">
    {!! Form::label('image', 'Image:') !!}
    <br>
    <img src="{{ $paymentMethod->image_link }}" height="200" />
</div>

<!-- Is Deposit Field -->
<div class="col-sm-12">
    {!! Form::label('is_deposit', 'Is Deposit:') !!}
    <p>{{ $paymentMethod->is_deposit }}</p>
</div>

<!-- Is Withdrawal Field -->
<div class="col-sm-12">
    {!! Form::label('is_withdrawal', 'Is Withdrawal:') !!}
    <p>{{ $paymentMethod->is_withdrawal }}</p>
</div>

