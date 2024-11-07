@extends('layouts.web.app')

@section('content')

@php 
    $section1 = $data['section_1'] ?? null;
    $section2 = $data['section_2'] ?? null;
    $section3 = $data['section_3'] ?? null;
    $section4 = $data['section_4'] ?? null;
    $section5 = $data['section_5'] ?? null;
    $section6 = $data['section_6'] ?? null;
@endphp

<div id="preloader">
    <div class="loader-logo"><img src="{{ asset('web/images/loader-logo.png') }}" alt=""></div>
    <div class="loader">
    </div>
</div>

<!-- HOME_BANNER -->
<section class="banner home-banner position-relative" id="section1">
    <div class="section-outer position-relative z-2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-12">
                    <div class="content position-relative z-0 text-xl-start text-center">
                        <!-- <h1 class="garet-heavy mb-4"><span class="garet-book h1-one">Experience</span><br> <span class="clr-new h1-two">Interstellar</span> <br> <span class="clr-new h1-three">FX</span> <span class="clr-text h1-four">Trading</span></h1>
                        <p>Propel your Trades Into Another Galaxy.</p>
                        <a href="/" class="btn btn-small mt-60">Start <span class="fw-semibold">Trading</span></a> -->
                        <!-- <div class="pre_title mb-4">{!! $section1['pre_title'] ?? '' !!}</div> -->
                        {!! $section1['main_title'] ?? '' !!}
                        <p class="text-capitalize">{!! $section1['sub_title'] ?? '' !!}</p>
                        <a href="{{ $section1['button_link'] ?? '#' }}" class="btn btn-small mt-60">{!! $section1['button_text'] ?? '' !!}</a>
                    </div>
                </div>
                <div class="col-xl-6 col-12">
                    <div class="image-wrap planet-container">
                        <img src="{{ asset('web/images/banner/purple-planet.png') }}" class="planet shiny" alt="Experience Interstellar FX Trading">
                        <img src="{{ asset('web/images/banner/purple-planet-vary.png') }}" class="planet dark" alt="Experience Interstellar FX Trading">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- MODULE_LEARNING_VIDEOS -->
<section class="video-sec position-relative z-1">
    <div class="video-title">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-5 col-12">
                    <div class="title-wrap">
                        {!! $section2['main_title'] ?? '' !!}
                    </div>
                </div>
                <div class="col-xl-7 col-12">
                    <div class="content-wrap">
                        {!! $section2['description'] ?? '' !!}
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    @include('components.web.modules.learning_videos')

</section>

<!-- <section class="video-sec  position-relative z-1" id="section2">
    <div class="video-title">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-12">
                    <div class="title-wrap">
                        <div class="main_title">{!! $section2['main_title'] ?? '' !!}</div>
                    </div>
                </div>
                <div class="col-lg-7 col-12">
                    <div class="content-wrap">
                        <p class="description">{!! $section2['description'] ?? '' !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="video-outer">
        <div class="container-fluid">
            <div class="row">
                <div class="video-slider position-relative z-1">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="vid-inner position-relative">
                                <div class="vid-iframe">
                                    <img src="{{ asset('web/images/video-section/image-thumbnail.png') }}" alt="">
                                </div>
                                <a href="https://www.youtube.com/embed/LXb3EKWsInQ" class="video-btn">
                                    <img src="{{ asset('web/images/video-section/video-btn.png') }}" alt="">
                                </a>
                                <div class="content">
                                    <span class="date">2/5/2024</span>
                                    <span class="description">Ready to Change your Financial Future? Join the Royal Trading Movement Today to Get Started.</span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="vid-inner position-relative">
                                <div class="vid-iframe">
                                    <img src="{{ asset('web/images/video-section/image-thumbnail.png') }}" alt="">
                                </div>
                                <a href="https://www.youtube.com/embed/LXb3EKWsInQ" class="video-btn">
                                    <img src="{{ asset('web/images/video-section/video-btn.png') }}" alt="">
                                </a>
                                <div class="content">
                                    <span class="date">2/5/2024</span>
                                    <span class="description">Ready to Change your Financial Future? Join the Royal Trading Movement Today to Get Started.</span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="vid-inner position-relative">
                                <div class="vid-iframe">
                                    <img src="{{ asset('web/images/video-section/image-thumbnail.png') }}" alt="">
                                </div>
                                <a href="https://www.youtube.com/embed/LXb3EKWsInQ" class="video-btn">
                                    <img src="{{ asset('web/images/video-section/video-btn.png') }}" alt="">
                                </a>
                                <div class="content">
                                    <span class="date">2/5/2024</span>
                                    <span class="description">Ready to Change your Financial Future? Join the Royal Trading Movement Today to Get Started.</span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="vid-inner position-relative">
                                <div class="vid-iframe">
                                    <img src="{{ asset('web/images/video-section/image-thumbnail.png') }}" alt="">
                                </div>
                                <a href="https://www.youtube.com/embed/LXb3EKWsInQ" class="video-btn">
                                    <img src="{{ asset('web/images/video-section/video-btn.png') }}" alt="">
                                </a>
                                <div class="content">
                                    <span class="date">2/5/2024</span>
                                    <span class="description">Ready to Change your Financial Future? Join the Royal Trading Movement Today to Get Started.</span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="vid-inner position-relative">
                                <div class="vid-iframe">
                                    <img src="{{ asset('web/images/video-section/image-thumbnail.png') }}" alt="">
                                </div>
                                <a href="https://www.youtube.com/embed/LXb3EKWsInQ" class="video-btn">
                                    <img src="{{ asset('web/images/video-section/video-btn.png') }}" alt="">
                                </a>
                                <div class="content">
                                    <span class="date">2/5/2024</span>
                                    <span class="description">Ready to Change your Financial Future? Join the Royal Trading Movement Today to Get Started.</span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="vid-inner position-relative">
                                <div class="vid-iframe">
                                    <img src="{{ asset('web/images/video-section/image-thumbnail.png') }}" alt="">
                                </div>
                                <a href="https://www.youtube.com/embed/LXb3EKWsInQ" class="video-btn">
                                    <img src="{{ asset('web/images/video-section/video-btn.png') }}" alt="">
                                </a>
                                <div class="content">
                                    <span class="date">2/5/2024</span>
                                    <span class="description">Ready to Change your Financial Future? Join the Royal Trading Movement Today to Get Started.</span>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="swiper-pagination-videoslider"></div>
            </div>
        </div>
    </div>
</section> -->


<!-- INNOVATIVE_TRANING -->
<section class="sub-banner position-relative" id="section3">
    <div class="sub-slider">
        <div class="swiper-wrapper">
            <!-- <div class="swiper-slide">
                <div class="image-wrap">
                    <img src="{{ asset('web/images/sub-banner-1/sub-banner-1.png') }}" alt="">
                </div>
            </div>
            <div class="swiper-slide">
                <div class="image-wrap">
                    <img src="{{ asset('web/images/sub-banner-1/sub-banner-2.png') }}" alt="">
                </div>
            </div> -->
            <div class="swiper-slide">
                <div class="image-wrap">
                    <img src="{{ asset('web/images/sub-banner-1/sub-banner-3.png') }}" alt="">
                </div>
            </div>

        </div>
    </div>
    <div class="sub-content">
        <div class="container">
            <div class="sub-inner">
                <div class="image">
                    <img src="{{ asset('web/images/sub-banner-1/sub-banner-mobile.png') }}" alt="">
                </div>
                <di class="content">
                    <!-- <h2>Innovative Trading</h2>
                    <span class="d-block">To propel You Toward Success</span>
                    <p>Space Markets offers Traders access to a cutting-edge trading platform to ensure maximum performance when Trading the worldwide markets. Download Mt4/MT5 today and sign in with your Space Markets Account to experience the best in FX Trading.</p>
                    <a href="/" class="btn btn-small btn-black">Trade with <strong>Innovation</strong></a> -->

                    {!! $section3['main_title'] ?? '' !!}
                    <span class="d-block text-capitalize">{!! $section3['sub_title'] ?? '' !!}</span>
                    {!! $section3['description'] ?? '' !!}
                    <a href="{{ $section3['button_link'] ?? '#' }}" class="btn btn-small btn-black">{!! $section3['button_text'] ?? '' !!}</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- MODULE_ACCOUNT_TYPES -->
<section class="account-types" id="section4">
    <div class="container">
        <div class="account-inner">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="table-outer">
                        <div class="content">
                            <div class="table-planet">
                                <img src="{{ asset('web/images/table/table-planet.png') }}" alt="">
                            </div>

                            {!! $section4['main_title'] ?? '' !!}
                            <p class="text-capitalize">{!! $section4['sub_title'] ?? '' !!}</p>
                        </div>

                        @include('components.web.modules.account_type_table')
                      
                        <div class="btn-wrap d-flex justify-content-center">
                            <a href="{{ $section4['button_link'] ?? '#' }}" class="btn btn-small">{!! $section4['button_text'] ?? '' !!}<span class="icon arrow-right"></span></a>
                        </div>
           
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- MODULE_TRADING_OPTIONS -->
<section class="trade-choices" id="section5">
    
    <div class="star-color"></div> 
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-4 col-12 d-flex justify-content-center">
                <div class="trade-start">
                    {!! $section5['main_title'] ?? '' !!}
                    <div class="bg-new">{!! $section5['sub_title'] ?? '' !!}</div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-10 col-12">

                @include('components.web.modules.trading_options')

            </div>
        </div>
    </div>                                
</section>

<!-- MODULE_TESTIMONIALS -->
<section class="reviews-sec position-relative" id="section6">
    <div class="rev-planet">
        <img src="{{ asset('/web/images/rev-panet-1.png') }}" class="rev-planet-top delay-shiny" alt="">
        <!-- <img src="assets/images/rev-panet-2.png" class="rev-planet-bottom delay-dark" alt=""> -->
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="title-wrap">
                    <!-- <h2>What the Innovators Say<span class="clr-new">.</span></h2> -->
                    {!! $section6['main_title'] ?? '' !!}
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-7 col-md-9 col-12">
                @include('components.web.modules.testimonials')
            </div>
        </div>
    </div>
</section>

@endsection