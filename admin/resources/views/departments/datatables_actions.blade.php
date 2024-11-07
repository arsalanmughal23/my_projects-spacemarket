{!! Form::open(['route' => ['departments.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    {{-- @can('departments.show') --}}
        <a href="{{ route('departments.show', $id) }}" class='btn btn-default btn-xs'>
            <i class="fa fa-eye"></i>
        </a>
    {{-- @endcan --}}
    {{-- @can('departments.edit') --}}
        <a href="{{ route('departments.edit', $id) }}" class='btn btn-default btn-xs'>
            <i class="fa fa-edit"></i>
        </a>
    {{-- @endcan --}}
    {{-- @can('departments.destroy')
        {!! Form::button('<i class="fa fa-trash"></i>', [
            'type' => 'submit',
            'class' => 'btn btn-danger btn-xs',
            'onclick' => "return submitForm(this.form);"
        ]) !!}
    @endcan --}}
</div>
{!! Form::close() !!}
