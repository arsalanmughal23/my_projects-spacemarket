@extends('layouts.web.app')

@section('content')

@php 
    $section1 = $data['section_1'] ?? null;
    $section2 = $data['section_2'] ?? null;
    $section3 = $data['section_3'] ?? null;
    $dataList = getDataList(\App\Models\DataList::TYPE_MARKETPLACE_COMMODITIES_ENERGIES);
@endphp



<section class="inner-banner commodities-banner position-relative" id="section1">
    <div class="switch-planet image-wrap">
        <img src="{{ asset('web/images/Commodities-&-Engergy.gif') }}" alt="">
    </div>
    <div class="container">
        <div class="row align-items-start">
            <div class="col-lg-12 col-12">
                <div class="content-wrap text-center">
                    <!-- <h1 class="mb-4">Energize Your Portfolio</h1>
                    <p>Trading Energies and Commodities for Profitable Diversification</p> -->

                    {!! $section1['main_title'] ?? '' !!}
                    {!! $section1['description'] ?? '' !!}
                </div>
            </div>
        </div>
    </div>
</section>


<section class="concept-wrapper commodities-content" id="section2">
    <div class="container position-relative">
        <div class="row justify-content-between ">
            <div class="col-12">
                <div class="heading-inner">
                    <!-- <h2 class="f62 pb-60 pt-20 fw-medium mont-font">New Energy <br><span class="f62 text-red lh-1">Level Unlocked</span></h2>
                    <div class="content-wrap">
                        <p>Dive into the world of <strong>lucrative opportunities</strong> with our brokerage's cutting-edge platform for trading energies and commodities. From <strong>crude oil</strong> to precious <strong>metals</strong>, our comprehensive selection ensures access to a <strong>diverse range</strong> of markets. <strong>Experience seamless</strong> execution, real-time market insights, and personalized support every step of the way. Whether you're a <strong>seasoned trader</strong> or just starting out, trust our expertise to navigate the complexities of these markets and unlock your full trading potential. <strong>Join us today</strong> and <strong>fuel</strong> your success with confidence.</p>
                    </div> -->
                    
                    {!! $section2['pre_title'] ?? '' !!}
                    {!! $section2['main_title'] ?? '' !!}

                    <div class="content-wrap">{!! $section2['description'] ?? '' !!}</div>

                </div> 
            </div> 
            <div class="col-xl-4 col-12 d-flex align-items-center justify-content-center">
                <img src="{{ asset('web/images/commodities-item.png') }}" class="commodities-item delay-shiny" alt="">
                <div class="image-wrap">
                    <img src="{{ asset('web/images/commodities-man.png') }}" class="img-full bounce-animation" alt="">
                </div>
            </div>
        </div>
    </div>
</section> 
<section class="space-market-wrapper commodities-space" id="section3">
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">

                <!-- <div class="space-heading">
                    <h3> <span class="f24">Why Trade Energies & Commodities With
                    </span> <strong>Space Markets?</strong> </h3>
                </div>

                <p class="f22">Looking for yet another asset class to diversify your ever-growing portfolio? Look no further than the variety of options that we offer you at Space Markets. An offering that includes access to the world's most renownked energy and commodity indices.</p> -->

                <!-- <div class="pre_title">{!! $section3['pre_title'] ?? '' !!}</div> -->
                <div class="space-heading">{!! $section3['main_title'] ?? '' !!}</div>
                {!! $section3['description'] ?? '' !!}

                <div class="space-marketing-listing">
                    <ul class="myList">
                        @php $lastIndex = 2 + count($dataList) % 2; @endphp
                        @foreach($dataList as $index => $item)
                            <li class="{{ $index >= (count($dataList) - $lastIndex) ? 'w-100' : '' }}">{{ $item->detail }}</li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection