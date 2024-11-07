{!! Form::open(['route' => ['payment_methods.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>

    <a href="{{ route('payment_methods.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="fa fa-eye"></i>
    </a>
    <a href="{{ route('payment_methods.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="fa fa-edit"></i>
    </a>
    
    @if(isModuleRecordDeleteable(\App\Models\Setting::MODULE_PAYMENT_METHOD))
        {!! Form::button('<i class="fa fa-trash"></i>', [
            'type' => 'submit',
            'class' => 'btn btn-danger btn-xs',
            'onclick' => "return submitForm(this.form);"
        ]) !!}
    @endif

</div>
{!! Form::close() !!}
