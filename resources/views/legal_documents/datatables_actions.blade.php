{!! Form::open(['route' => ['legal_documents.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    
    <a href="{{ route('legal_documents.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="fa fa-eye"></i>
    </a>
    <a href="{{ route('legal_documents.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="fa fa-edit"></i>
    </a>

    @if(isModuleRecordDeleteable(\App\Models\Setting::MODULE_LEGAL_DOCUMENTS))
        {!! Form::button('<i class="fa fa-trash"></i>', [
            'type' => 'submit',
            'class' => 'btn btn-danger btn-xs',
            'onclick' => "return submitForm(this.form);"
        ]) !!}
    @endif

</div>
{!! Form::close() !!}
