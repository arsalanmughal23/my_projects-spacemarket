@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Learning Videos</h1>
                </div>

                @if(isModuleRecordCreatable(\App\Models\Setting::MODULE_LEARNING_VIDEOS))
                    <div class="col-sm-6">
                        <a class="btn btn-primary float-right"
                        href="{{ route('learning_videos.create') }}">
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
                @include('learning_videos.table')

                <div class="card-footer clearfix">
                    <div class="float-right">
                        
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
