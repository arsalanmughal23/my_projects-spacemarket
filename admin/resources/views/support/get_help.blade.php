@extends('layouts.app')

@section('content')

@php
    $pageSlug = $data['page_slug'] ?? null;
    $pageName = $data['page_name'] ?? null;
    $section1 = $data['section_1'] ?? null;
    $section2 = $data['section_2'] ?? null;
    $section3 = $data['section_3'] ?? null;
    $section4 = $data['section_4'] ?? null;
    $section5 = $data['section_5'] ?? null;
@endphp

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>Edit Support ({{ $pageName }}) Page</h1>
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
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-three-section2-tab" data-toggle="pill" href="#custom-tabs-three-section2" role="tab" aria-controls="custom-tabs-three-section2" aria-selected="false">Account Verification</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-three-section3-tab" data-toggle="pill" href="#custom-tabs-three-section3" role="tab" aria-controls="custom-tabs-three-section3" aria-selected="false">Complaints</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-three-section4-tab" data-toggle="pill" href="#custom-tabs-three-section4" role="tab" aria-controls="custom-tabs-three-section4" aria-selected="false">Deposits & Withdrawals</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-three-section5-tab" data-toggle="pill" href="#custom-tabs-three-section5" role="tab" aria-controls="custom-tabs-three-section5" aria-selected="false">Chat With Us</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-three-tabContent">

                <div class="tab-pane fade active show" id="custom-tabs-three-section1" role="tabpanel" aria-labelledby="custom-tabs-three-section1-tab">
                    @include('components.admin.cms_forms.support.get_help.template1', [ 'pageSlug' => $pageSlug ])
                </div>

                <!-- Account Verification Field -->
                <div class="tab-pane fade" id="custom-tabs-three-section2" role="tabpanel" aria-labelledby="custom-tabs-three-section2-tab">
                    @include('components.admin.cms_forms.support.get_help.template2', [ 'pageSlug' => $pageSlug, 'sectionNumber' => 2, 'section' => $section2 ])
                </div>
                
                <!-- Complaints Field -->
                <div class="tab-pane fade" id="custom-tabs-three-section3" role="tabpanel" aria-labelledby="custom-tabs-three-section3-tab">
                    @include('components.admin.cms_forms.support.get_help.template2', [ 'pageSlug' => $pageSlug, 'sectionNumber' => 3, 'section' => $section3 ])
                </div>
                
                <!-- Deposits & Withdrawals Field -->
                <div class="tab-pane fade" id="custom-tabs-three-section4" role="tabpanel" aria-labelledby="custom-tabs-three-section4-tab">
                    @include('components.admin.cms_forms.support.get_help.template2', [ 'pageSlug' => $pageSlug, 'sectionNumber' => 4, 'section' => $section4 ])
                </div>
                
                <!-- Chat With Us Field -->
                <div class="tab-pane fade" id="custom-tabs-three-section5" role="tabpanel" aria-labelledby="custom-tabs-three-section5-tab">
                    @include('components.admin.cms_forms.support.get_help.template2', [ 'pageSlug' => $pageSlug, 'sectionNumber' =>'5', 'section' => $section5 ])
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