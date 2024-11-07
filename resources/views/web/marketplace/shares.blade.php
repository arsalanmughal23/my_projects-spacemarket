@extends('layouts.web.app')

@section('content')

@php 
    $section1 = $data['section_1'] ?? null;
    $section2 = $data['section_2'] ?? null;
    $section3 = $data['section_3'] ?? null;
    $dataList = getDataList(\App\Models\DataList::TYPE_MARKETPLACE_SHARES);
@endphp


<section class="inner-banner shares-banner position-relative" id="section1">
    <div class="planet-left">
        <img src="{{ asset('web/images/share-planet.png') }}" class="planet-inner" alt="">
    </div>
    <div class="container">
        <div class="row align-items-start">
            <div class="col-xl-6 col-12">
                <div class="content-wrap text-xl-start text-center">
                    <!-- <h1 class="clr-new">Shares</h1>
                    <p>Profit From the Largest Companies in the World</p> -->
                    {!! $section1['main_title'] ?? '' !!}
                    {!! $section1['description'] ?? '' !!}
                </div>
            </div>
            <div class="col-xl-6 col-12">
                <div class="mount-wrap position-relative">
                    <div class="mountain-slider overflow-hidden">
                        <div class="swiper-wrapper">

                            <div class="swiper-slide">
                                <div class="image-wrap">
                                    <img src="{{ asset('web/images/share-1.png') }}" class="share-img" alt="">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="image-wrap">
                                    <img src="{{ asset('web/images/share-2.png') }}" class="share-img" alt="">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="image-wrap">
                                    <img src="{{ asset('web/images/share-3.png') }}" class="share-img" alt="">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="image-wrap">
                                    <img src="{{ asset('web/images/share-4.png') }}" class="share-img" alt="">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="concept-wrapper share-seize" id="section2">
    <div class="container">
        <div class="row justify-content-between ">
            <div class="col-xl-7 col-12 pe-lg-0 pe-xl-0"> 
                <div class="heading-inner">
                    <!-- <h3 >Seize Your  </h3>
                    <h2 class="text-red f78 pb-60  pt-20">Opportunity</h2>
                    <p>Trading with Space Markets opens doors to a world of unparalleled trading opportunities in shares. With a diverse array of stocks from leading global markets, we offer traders access to the most sought-after companies across various sectors. Our advanced trading platform provides <strong>lightning-fast execution , real-time market data,</strong>  and  <strong> powerful analytical tools</strong>, empowering traders to make informed decisions with   <strong>confidence</strong> . Backed by robust security measures and dedicated customer support, we prioritize the safety and success of our traders. Whether you're a <strong>seasoned investor</strong>   or just starting out, trust us to provide the optimal environment for your share trading journey, where every trade propels you closer to your financial goals.</p> -->
                    
                    {!! $section2['pre_title'] ?? '' !!}
                    {!! $section2['main_title'] ?? '' !!}
                    {!! $section2['description'] ?? '' !!}
                </div> 
            </div>
            <div class="col-xl-4 col-12 d-flex align-items-end justify-content-center">
                <img src="{{ asset('web/images/shares-mobiles.png') }}" class="img-full" alt="">
            </div>
        </div>
    </div>
</section>
<section class="space-market-wrapper shares-space" id="section3">
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">

                <!-- <div class="space-heading">
                    <h3> <span class="f24 garet-heavy">Why Trade Shares With 
                    </span> <strong class="garet-heavy">Space Markets<span class="text-white f62">?</span></strong> </h3>
                </div>
Why Trade Shares With Space Markets?
                <p class="f22">We place our clients first and aim to offer the highest level of service delivery, effectively equipping you with the tools to tackle the most liquid market in the world.</p> -->

                <!-- {!! $section3['pre_title'] ?? '' !!} -->
                <div class="space-heading">{!! $section3['main_title'] ?? '' !!}</div>
                {!! $section3['description'] ?? '' !!}

                <div class="space-marketing-listing">
                    <ul class="myList">
                        @foreach($dataList as $index => $item)
                            <li class="">{{ $item->detail }}</li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection