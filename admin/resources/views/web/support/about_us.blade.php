@extends('layouts.web.app')

@section('content')

@php
$section1 = $data['section_1'] ?? null;
$section2 = $data['section_2'] ?? null;
$section3 = $data['section_3'] ?? null;
$section4 = $data['section_4'] ?? null;
$section5 = $data['section_5'] ?? null;
$dataList = getDataList(\App\Models\DataList::TYPE_SUPPORT_ABOUT_SECTION5);
@endphp

<section class="inner-banner about-banner position-relative" id="section1">

    <div class="container">
        <div class="row align-items-start">
            <div class="col-12">
                <div class="content-wrap">
                    <!-- <h5>Redefining Excellence</h5>
                    <h1 class="clr-new">Shattering Industry Standards in Forex Trading</h1>
                    <p>Space Markets is a broker born from an innate desire to reshape the corporate and traditionalist view of Forex Trading. Revolutionize your approach to forex trading with us as we boldly shatter industry norms, paving the way for unparalleled innovation and success. Say goodbye to conventional practices and embrace a new era of possibility, where boundaries are pushed, opportunities abound, and your trading journey reaches unprecedented heights. Join us at the forefront of change and experience the difference firsthand.</p> -->

                    <h5>{!! $section1['pre_title'] ?? '' !!}</h5>
                    {!! $section1['main_title'] ?? '' !!}
                    {!! $section1['description'] ?? '' !!}
                </div>

                <!-- <div class="btn-wrap d-flex justify-content-xl-start justify-content-center">
                    <a href="javascript:void(0);" class="btn btn-small">Get Started <span class="icon arrow-right"></span></a>
                </div> -->
                <div class="btn-wrap d-flex justify-content-xl-start justify-content-center">
                    <a href="{{ $section1['button_link'] ?? '#' }}" class="btn btn-small">{!! $section1['button_text'] ?? '' !!}<span class="icon arrow-right"></span></a>
                </div>

            </div>
        </div>
    </div>
    <video autoplay="" loop="" src="{{ asset('/web/images/smoke-banner-video.mp4') }}" muted=""></video>
    <div class="container-fluid">
        <div class="row align-items-start">
            <div class="">
                <div class="indices-wrap">
                    <div class="indices-inner position-relative">
                        <div class="indices-slider overflow-hidden">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="image-wrap">
                                        <img src="{{ asset('/web/images/aboutslide-1.png') }}" class="indices-img" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="image-wrap">
                                        <img src="{{ asset('/web/images/aboutslide-2.png') }}" class="indices-img" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="image-wrap">
                                        <img src="{{ asset('/web/images/aboutslide-3.png') }}" class="indices-img" alt="">
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

<section class="innovate" id="section2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="content-wrap text-center">
                    <!-- <p>At <strong>Space Markets</strong>, innovation isn't just a buzzword – it's our <strong>guiding principle</strong>. As a <strong>pioneering broker</strong>, we continuously push the boundaries of what's <strong>possible</strong> in the world of trading.</p> -->
                    {!! $section2['description'] ?? '' !!}
                </div>
            </div>
        </div>
    </div>
</section>

<section class="innovate-sec" id="section3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="content-wrap">
                    <!-- <h2>A Universally <strong>Innovative Vision</strong></h2>
                    <p>At Space Markets we envision a cosmos where trading transcends boundaries, empowering every investor to explore, discover, and thrive in the vast universe of financial markets. Guided by innovation and fueled by a commitment to excellence, we propel our traders beyond the ordinary, pioneering new frontiers of possibility. With Space Markets, the sky is not the limit – it's just the beginning of an extraordinary journey towards limitless potential and unparalleled success.</p> -->

                    {!! $section3['main_title'] ?? '' !!}
                    {!! $section3['description'] ?? '' !!}
                </div>
            </div>
        </div>
    </div>
    <div class="right-chunk">
        <img src="{{ asset('/web/images/innv-2.png') }}" alt="">
    </div>
</section>

<section class="about-mission" id="section4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="content-wrap text-center">
                    <!-- <h2>We're on a <strong>Mission</strong></h2>
                    <p>At Space Markets, our mission is to revolutionize the forex trading experience through innovation, transparency, and unwavering commitment to our clients' success. We strive to create a dynamic trading environment where traders of all levels can thrive and have fun with their trading journey by providing them with cutting-edge technology, comprehensive educational resources, and personalized support. By fostering a culture of continuous improvement and embracing emerging trends, we aim to empower our clients to navigate the complexities of the financial markets with confidence and achieve their investment goals. Together, we reach for the stars, reshaping the future of forex trading one trade at a time.</p> -->
                    {!! $section4['main_title'] ?? '' !!}
                    {!! $section4['description'] ?? '' !!}
                </div>
                <div class="left-chunk">
                    <img src="{{ asset('/web/images/about-mission.png') }}" class="chunk chunk-1 shiny" alt="">
                    <img src="{{ asset('/web/images/about-mission-2.png') }}" class="chunk chunk-2 dark" alt="">
                </div>
                <div class="left-chunk gif d-none">
                    <video autoplay="" loop="" src="{{ asset('/web/images/about-mission.webm') }}" muted=""></video>
                    <img src="{{ asset('/web/images/about-mission-v2.gif') }}" alt="">
                </div>
                <div class="left-chunk d-none">
                    <img src="{{ asset('/web/images/about-mission-v2.gif') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="galactic" id="section5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="title-wrap text-center">
                    <!-- <h2>Unlocking Galactic Gains</h2>
                    <p>Exploring the Stellar Benefits of Space Markets</p> -->
                    
                    {!! $section5['main_title'] ?? '' !!}
                    <p>{!! $section5['sub_title'] ?? '' !!}</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @forelse($dataList as $index => $item)
                <div class="col-xl-3 col-lg-4 col-md-6 col-12 mb-4">
                    <div class="galactic-wrap text-center">
                        <!-- <img src="{{ asset('/web/images/about-icon-8.png') }}" alt=""> -->
                        <img src="{{ asset('/web/images/benefits-'.($index < 8 ? $index+1 : 8).'.gif') }}" alt="">
                        <p>{{ $item->detail }}</p>
                    </div>
                </div>
            @empty
                No Content Available
            @endforelse

        </div>
    </div>
</section>

@endsection

@push('page_scripts')
<script>
    // document.addEventListener("DOMContentLoaded", function() {
    //     const accordionButtons = document.querySelectorAll('.select-department-btn ');

    //     accordionButtons.forEach(button => {
    //         button.addEventListener('click', function(event) {
    //             event.preventDefault(); // Prevent the form from being submitted

    //             const accordionItem = this.parentElement;
    //             const isActive = accordionItem.classList.contains('active');

    //             // Collapse all accordion items
    //             document.querySelectorAll('.accordion-item').forEach(item => {
    //                 item.classList.remove('active');
    //             });

    //             // Toggle the clicked accordion item
    //             if (!isActive) {
    //                 accordionItem.classList.add('active');
    //             }
    //         });
    //     });
    // });
</script>
@endpush