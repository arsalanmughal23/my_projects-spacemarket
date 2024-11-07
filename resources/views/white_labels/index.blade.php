@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>White Labels</h1>
                </div>

                @if(isModuleRecordCreatable(\App\Models\Setting::MODULE_WHITE_LABEL))
                    <div class="col-sm-6">
                        <a class="btn btn-primary float-right"
                        href="{{ route('white_labels.create') }}">
                            Add New
                        </a>
                    </div>
                @endif

            </div>
        </div>
    </section>

    <div class="content px-3 list_view">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-2">
                @include('white_labels.table')

                <div class="card-footer clearfix">
                    <div class="float-right">
                        
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
