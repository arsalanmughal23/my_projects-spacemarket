@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Permissions for Role: <b>{{ $role->name }}</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card">
            <div class="card-body">
                {!! Form::model($role, ['route' => ['roles.permissionsupdate', $role->id], 'method' => 'patch']) !!}

                <div class="form-group">
                    @foreach ($permissions as $key => $permission)
                        @if ($key % 7 == 0)
                            <div class="row"></br></div>
                            <?php
                                $data = explode('.index', $permission->name);
                                $data = \Str::singular($data[0]);
                            ?>
                            <h6 >{{ \Str::ucfirst($data) }} Permissions </h6>
                            <div class="row"></div>
                        @endif
                        <label class="control-label mt-2 col-md-3" style="font-weight: normal !important;">
                            <input class="checkbox-inline" type="checkbox" name="permission[{{ $permission->id }}]"
                                @if ($role->getAllPermissions()->contains($permission)) checked @endif>
                            {{ $permission->name }}
                        </label>
                    @endforeach
                </div>
                <div class="form-group col-sm-12">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                    <a href="{!! route('roles.index') !!}" class="btn btn-default">Cancel</a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
