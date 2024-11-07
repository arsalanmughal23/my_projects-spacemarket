@extends('layouts.app')

@section('content')

@php
    $pageSlug = $data['page_slug'] ?? null;
    $pageName = $data['page_name'] ?? null;
    $section1 = $data['section_1'] ?? null;
@endphp

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>Edit Layout ({{ $pageName }})</h1>
            </div>
        </div>
    </div>
</section>

<div class="content px-3">

    @include('adminlte-templates::common.errors')
    @include('flash::message')


    <div class="card card-primary card-outline card-tabs">
        <div class="card-header p-0 pt-1 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-three-section1-tab" data-toggle="pill" href="#custom-tabs-three-section1" role="tab" aria-controls="custom-tabs-three-section1" aria-selected="false">Section 1</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-three-tabContent">

                <div class="tab-pane fade active show" id="custom-tabs-three-section1" role="tabpanel" aria-labelledby="custom-tabs-three-section1-tab">
                    @include('components.admin.cms_forms.layout_part.trading_fx_revolution', [ 'pageSlug' => $pageSlug ])
                </div>

            </div>
        </div>

    </div>
</div>
@endsection

@push('page_scripts')
<script>
</script>
@endpush