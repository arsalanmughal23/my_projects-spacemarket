<!-- Account Name Field -->
<div class="col-sm-12">
    {!! Form::label('account_name', 'Account Name:') !!}
    <p>{{ $accountType->account_name }}</p>
</div>

<!-- Minimum Field -->
<div class="col-sm-12">
    {!! Form::label('minimum', 'Minimum:') !!}
    <p>{{ $accountType->minimum }}</p>
</div>

<!-- Spread Field -->
<div class="col-sm-12">
    {!! Form::label('spread', 'Spread:') !!}
    <p>{{ $accountType->spread }}</p>
</div>

<!-- Commission Field -->
<div class="col-sm-12">
    {!! Form::label('commission', 'Commission:') !!}
    <p>{{ $accountType->commission }}</p>
</div>

<!-- Bonus Field -->
<div class="col-sm-12">
    {!! Form::label('bonus', 'Bonus:') !!}
    <p>{{ $accountType->bonus }}</p>
</div>

<!-- Platform Field -->
<div class="col-sm-12">
    {!! Form::label('platform', 'Platform:') !!}
    <p>{{ $accountType->platform }}</p>
</div>

<!-- Leverage Field -->
<div class="col-sm-12">
    {!! Form::label('leverage', 'Max Leverage:') !!}
    <p>{{ $accountType->leverage }}</p>
</div>

