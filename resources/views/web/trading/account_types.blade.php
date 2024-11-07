@extends('layouts.web.app')

@section('content')

@php
$section1 = $data['section_1'] ?? null;
@endphp

<section class="inner-banner account-types-banner  account-types  account-inner  position-relative">

    <div class="container">
        <div class="row align-items-start mb-4">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="content-wrap text-left">
                    <!-- <h1 class="mb-4 clr-newt hover-title-conent">Account Types</h1>
                    <p>Align Your Account Type to Your Unique Trading Requirements and Strategy</p> -->
                    {!! $section1['main_title'] ?? '' !!}
                    <p>{!! $section1['sub_title'] ?? '' !!}</p>
                </div>

                <div class="table-outer">

                    @include('components.web.modules.account_type_table')

                    <!-- <div class="btn-wrap d-flex justify-content-center">
                        <a href="javascript:void(0);" class="btn btn-small">Start Trading Now <span class="icon arrow-right"></span></a>
                    </div> -->
                    <div class="btn-wrap d-flex justify-content-center">
                        <a href="{{ $section1['button_link'] ?? '#' }}" class="btn btn-small">{!! $section1['button_text'] ?? '' !!}<span class="icon arrow-right"></span></a>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>

@endsection