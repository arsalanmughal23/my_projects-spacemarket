{!! Form::open(['route' => ['trading_options.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>

    <a href="{{ route('trading_options.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="fa fa-eye"></i>
    </a>
    <a href="{{ route('trading_options.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="fa fa-edit"></i>
    </a>

    @if(isModuleRecordDeleteable(\App\Models\Setting::MODULE_TRADING_OPTIONS))
        {!! Form::button('<i class="fa fa-trash"></i>', [
            'type' => 'submit',
            'class' => 'btn btn-danger btn-xs',
            'onclick' => "return submitForm(this.form);"
        ]) !!}
    @endif

</div>
{!! Form::close() !!}
