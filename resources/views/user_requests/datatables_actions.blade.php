{!! Form::open(['route' => ['user_requests.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>

    <a href="{{ route('user_requests.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="fa fa-eye"></i>
    </a>
 
    <!-- <a href="{{ route('user_requests.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="fa fa-edit"></i>
    </a> -->

    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return submitForm(this.form);"
    ]) !!}

</div>
{!! Form::close() !!}
