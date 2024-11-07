@extends('layouts.web.app')

@section('content')

@php
$section1 = $data['section_1'] ?? null;
$section2 = $data['section_2'] ?? null;
$section3 = $data['section_3'] ?? null;
$dataList = getDataList(\App\Models\DataList::TYPE_PARTNER_AFFILIATES);
@endphp

<section class="inner-banner affilite-banner position-relative" id="section1">
   
    <div class="container">
        <div class="row align-items-center mb-4">
            <div class="col-xl-6 col-12">
                <div class="content-wrap text-left">
                    <!-- <h1 class="mb-2"><strong class="clr-new">Defying Gravity<span style="color: #fff;">.</span></strong> </h1>
                    <p class="f24">The Sky's the Limit When You're a Space Markets Affiliate</p> -->
                    {!! $section1['main_title'] ?? '' !!}
                    <p>{!! $section1['sub_title'] ?? '' !!}</p>
                </div>
            </div>
            <div class="col-xl-6 col-12 space-affiliate-bg text-center">
                <img src="{{ asset('/web/images/99999.png') }}"  class="scaletd-animation"/>
            </div>
        </div>
    </div> 

    <video autoplay loop src="{{ asset('/web/images/smoke-banner-video.mp4') }}" autoplay muted></video>
</section>

<section class="position-relative " id="section2">
    <div class="container">
        <div class="affiliate-content ">
     <div class="row">
        <div class="col-12">
            <!-- <h3 class="text-center f55 garet-book"><strong class="text-red garet-heavy"> Mission</strong> - Become An Affiliate.</h3>
            <p>Space Markets offers Traders who are actively registered and Trading with us the opportunity to join our elite Affiliate Program for more opportunities for growth and profit. By joining the affiliate program, you are joining a movement of Traders who Trade with an innovative and pro-active approach to the markets, underpinned by passion to share the knowledge and skills of wealth creation with other like-minded Traders. You are able to write your own paycheck each month, based on the amount of effort and investment you're willing to put into your own pursuits within the program. Use your affiliate link to share the life-changing experience of Trading with Space Markets with others and earn every time they Trade profitably.</p> -->
                
                {!! $section2['main_title'] ?? '' !!}
                <p class="description pre_description">{!! $section2['pre_description'] ?? '' !!}</p>
                <ul>
                    <li><img src="{{ asset('/web/images/mission-1.svg') }}" /></li>
                    <li><img src="{{ asset('/web/images/mission-2.svg') }}" /></li>
                    <li><img src="{{ asset('/web/images/mission-3.svg') }}" /></li>
                </ul>
            <!-- <p>It doesn't stop there - we tailor the perks of your affiliation to your particular strengths and challenge you to reach new heights as a growing, evolving affiliate. Reach out to learn more about starting your journey towards passive income as a sideline to your Trading career today.</p>
            <div class="btn-wrap d-flex justify-content-center">
                <a href="javascript:void(0);" class="btn btn-small">Apply for Affiliation <span class="icon arrow-right"></span></a>
            </div> -->
            <p class="description post_description">{!! $section2['post_description'] ?? '' !!}</p>
            <div class="btn-wrap d-flex justify-content-center">
                <a href="{{ $section2['button_link'] ?? '#' }}" class="btn btn-small">{!! $section2['button_text'] ?? '' !!}<span class="icon arrow-right"></span></a>
            </div>
        </div>
     </div>
    </div>


    </div>
</section>

<section class="space-market-wrapper affiliate-space" id="section3">
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">

                <div class="space-heading">
                    <!-- <h3>
                        <strong>Space Market's </strong> 
                        <span class="f60">Partnership Perks</span> </h3> -->
                        
                    {!! $section3['main_title'] ?? '' !!}
                    <!-- <p class="sub_title">{!! $section3['sub_title'] ?? '' !!}</p> -->
                </div>

                <div class="space-marketing-listing">
                    <ul>
                        @foreach($dataList as $item)
                            <li class="">{{ $item->detail }}</li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection

@push('page_scripts')
@endpush