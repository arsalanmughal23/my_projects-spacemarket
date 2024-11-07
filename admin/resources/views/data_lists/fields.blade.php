<!-- Type Field -->
<div class="form-group col-sm-4">
    {!! Form::label('type', 'Type:') !!}
    <select name="type" required>
        <option value="" selected disabled>Select Type</option>    
        @foreach(\App\Models\DataList::CONST_TYPES as $type)
            <!-- <option value="{{ $type }}" {{ ($dataList->type ?? null) == $type ? 'selected' : '' }} >{{ __('general.data_list.'.$type) }}</option> -->
            <option value="{{ $type }}" {{ ($dataList->type ?? null) == $type ? 'selected' : '' }} >{{ $type }}</option>
        @endforeach
    </select>
</div>

<!-- Detail Field -->
<div class="form-group col-sm-12">
    {!! Form::label('detail', 'Detail:') !!}
    {!! Form::text('detail', null, ['class' => 'form-control', 'required' => 'required', 'maxlength' => config('constants.character_limits.data_list')]) !!}
</div>