{!! Form::open(['route' => ['data_lists.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>

    <a href="{{ route('data_lists.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="fa fa-eye"></i>
    </a>
    <a href="{{ route('data_lists.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="fa fa-edit"></i>
    </a>
    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return submitForm(this.form);"
    ]) !!}
</div>
{!! Form::close() !!}
