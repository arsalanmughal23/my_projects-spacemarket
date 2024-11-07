@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Edit Roles</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($roles, ['route' => ['roles.update', $roles->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('roles.fields')
                </div>
            </div>
            <div class="card-body">
                <div class="col-12">
                    <div class="form-group">
                        @foreach ($permissions as $key => $permission)
                            @if ($key % 7 == 0)
                                <div class="row"></br></div>
                                @php
                                    $data = getPermissionModelName($permission->name);
                                @endphp
                                <h6>{{ $data }} Permissions </h6>
                                <label class="control-label mt-2 col-md-3" style="font-weight: normal !important;">
                                    <input class="checkbox-inline select-all-permissions" type="checkbox"
                                        value="{{ $data }}">
                                    Select All
                                </label>
                                <div class="row"></div>
                            @endif
                            <label class="control-label mt-2 col-2" style="font-weight: normal !important;">
                                <input class="checkbox-inline {{ $data }}-checked" type="checkbox" name="permission[{{ $permission->id }}]"
                                    @if ($permission_role->getAllPermissions()->contains($permission)) checked @endif>
                                {{ getPermissionName($permission->name) }}
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('roles.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection

@push('third_party_scripts')
    <script>
        $(".select-all-permissions").click(function() {
            console.log("[val]", $(this).val(), this.checked);
            $('.'+$(this).val()+"-checked").not(this).prop('checked', this.checked);
        });
    </script>
@endpush
