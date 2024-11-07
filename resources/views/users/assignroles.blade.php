@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Roles for User: <b>{{$user->name}}</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card ">
            <div class="card-body">
                {!! Form::model($user, ['route' => ['roles.rolesupdate', $user->id], 'method' => 'patch']) !!}
                <div class="form-group">
                    @foreach($roles as $role)
                        <label class="control-label col-2">
                        <input class="checkbox-inline" type="checkbox" name="role[{{$role->id}}]"
                        @if($user->hasRole($role)) checked @endif>
                            {{$role->name}}</label>
                    @endforeach
                </div>
                <div class="form-group col-sm-12">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                    <a href="{!! route('users.index') !!}" class="btn btn-default">Cancel</a>
                </div>
             {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
