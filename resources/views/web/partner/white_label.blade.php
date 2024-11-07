@extends('layouts.web.app')

@section('content')

@php
$section1 = $data['section_1'] ?? null;
$section2 = $data['section_2'] ?? null;
$section3 = $data['section_3'] ?? null;
$whiteLabels = getModuleData(\App\Models\Setting::MODULE_WHITE_LABEL);
@endphp

<section class="inner-banner  white-label-banner position-relative" id="section1">

    <div class="container">
        <div class="row align-items-center mb-4">
            <div class="col-xl-7 col-12">
                <div class="content-wrap text-left">
                    <!-- <h1 class="mb-2 f52 mb-4">A Whole New World
                        of Opportunity Awaits</h1>
                    <p><strong class="clr-new"> Unlock Growth Potential</strong> - Harness the Power of White Labeling</p> -->
                    
                    {!! $section1['main_title'] ?? '' !!}
                    {!! $section1['sub_title'] ?? '' !!}
                </div>
            </div>
            <div class="col-xl-5 col-12">
                <div class="planet-items">
                    <img src="{{ asset('/web/images/Commodities-&-Engergy.gif') }}" alt="">
                </div>
            </div>
        </div>
    </div>

</section>

<section class="position-relative chart-your-own-path " id="section2">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-12">
                <!-- <h2 class="clr-new f50 fw-900">Chart Your Own Path</h2>
                <p>Discover unparalleled opportunities for growth by partnering with Space Markets through our dynamic white label program. As a leading provider in the financial industry, Space Markets <strong>offers</strong> a comprehensive suite of <strong>customizable solutions</strong> designed to elevate your brand and expand your market presence. By leveraging our cutting-edge technology, robust infrastructure, and <strong>industry expertise</strong>, you can effortlessly launch your own branded trading platform, tailored to your unique specifications. Enjoy the benefits of a seamless user experience, enhanced brand visibility, and access to a diverse range of financial products and services. <strong>Join forces</strong> with Space Markets today and <strong>embark on a journey</strong> towards sustained success in the competitive world of finance.</p> -->
                {!! $section2['main_title'] ?? '' !!}
                <p class="description">{!! $section2['description'] ?? '' !!}</p>

                <!-- <p>Discover unparalleled opportunities for growth by partnering with Space Markets through our dynamic white label program. As a leading provider in the financial industry, Space Markets <strong>offers</strong> comprehensive suite of <strong>customizable solutions</strong> designed to elevate your brand and expand your market presence. By leveraging our cutting-edge technology, robust infrastructure, and <strong>industry expertise</strong>, you can effortlessly launch your own branded trading platform, tailored to your unique specifications. Enjoy the benefits of a seamless user experience, enhanced brand visibility, and access to a diverse range of financial products and services. <strong>Join forces</strong> with Space Markets today and <strong>embark on a journey</strong> towards sustained success in the competitive world of finance.</p> -->
            </div>

            <div class="col-xl-4 col-12">
                <div class="position-relative h-100">
                    <div class="tiger-img ">
                        <div class="bearslider">
                            <div class="swiper-wrapper">

                                <div class="swiper-slide">
                                    <div class="image-wrap">
                                        <img src="{{ asset('/web/images/bear-updated-1.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="image-wrap">
                                        <img src="{{ asset('/web/images/bear-updated-2.png') }}" alt="">
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>






    </div>
</section>

<section class="space-market-wrapper white-space" id="section3">
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="space-heading">
                    <h3>
                        <!-- <strong class="bg-cont">You're Ready for the Next Step in Your Trading Career as a Professional Trader.</strong>
                        <span class="f36 fw-800">Here's Why You Should Consider a White-Label Partnership with Space Markets:</span> -->
                        
                        <h3><strong class="bg-cont mont-font">{!! $section3['pre_title'] ?? '' !!}</strong></h3>
                        {!! $section3['main_title'] ?? '' !!}
                    </h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mx-auto ">

                <section class="partnerboxes-platform">
                    <div class="row justify-content-center">

                        @forelse($whiteLabels as $whiteLabel)
                            <div class="col-xl-4 col-lg-6 col-12">
                                <div class="partnerboxes-platform-item">
                                    <h3>{{ $whiteLabel->title }}</h3>
                                    <p>{{ $whiteLabel->description }}</p>
                                </div>
                            </div>
                        @empty
                            No Content Available
                        @endforelse

                    </div>

                </section>

            </div>
        </div>
    </div>
</section>

@endsection

@push('page_scripts')
@endpush