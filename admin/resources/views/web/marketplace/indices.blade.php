@extends('layouts.web.app')

@section('content')

@php 
    $section1 = $data['section_1'] ?? null;
    $section2 = $data['section_2'] ?? null;
    $section3 = $data['section_3'] ?? null;
    $dataList = getDataList(\App\Models\DataList::TYPE_MARKETPLACE_INDICES);
@endphp



<section class="inner-banner indices-banner position-relative" id="section1">
 
    <div class="container">
        <div class="row align-items-start">
            <div class="col-xl-6 col-12">
                <div class="content-wrap">
                    {!! $section1['main_title'] ?? '' !!}
                    {!! $section1['description'] ?? '' !!}
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row align-items-start">
            <div class="">
                <div class="indices-wrap">
                    <div class="indices-inner position-relative">
                        <div class="indices-slider overflow-hidden">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="image-wrap">
                                        <img src="{{ asset('web/images/slide-1.png') }}" class="indices-img" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="image-wrap">
                                        <img src="{{ asset('web/images/slide-2.png') }}" class="indices-img" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="image-wrap">
                                        <img src="{{ asset('web/images/slide-3.png') }}" class="indices-img" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="image-wrap">
                                        <img src="{{ asset('web/images/slide-4.png') }}" class="indices-img" alt="">
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
<section class="concept-wrapper indices-explore" id="section2">
    <div class="container">
        <div class="row justify-content-between ">
            <div class="col-xl-6 col-12 pe-lg-0 pe-xl-0"> 
                <div class="heading-inner">
                    <!-- <h3 >Explore the Concept of </h3>
                    <h2 class="text-red f78 pb-60  pt-20">Indices</h2>
                    <p>
                        In FX trading, 'indices' refer to a specific type of financial instrument that represents a <strong>basket of stocks</strong>  from a particular region, country, or sector. Unlike individual stocks, which represent ownership in a single company, indices provide a way to track the overall performance of a <strong>group of stocks</strong>. </p>
                        
                        <p> Forex indices are commonly used as indicators of <strong>broader market</strong> trends and <strong></strong>sentiment</strong>. They allow traders to <strong>speculate</strong> on the performance of entire economies or sectors rather than individual companies. Some well-known forex indices include the <strong>S&P 500, Dow Jones</strong> Industrial Average, <strong> FTSE 100, and DAX. </strong> </p>
                        
                        <p> Trading Forex indices <strong> involves</strong> speculating on whether the overall value of the index <strong>will rise</strong> or fall over a certain period. This can be done through various financial instruments such as index futures, options, or <strong>contracts for difference (CFDs)</strong>.
                    </p> -->
                    
                    {!! $section2['pre_title'] ?? '' !!}
                    {!! $section2['main_title'] ?? '' !!}
                    {!! $section2['description'] ?? '' !!}
                </div> 
            </div>
            <div class="col-xl-5 col-12 d-flex align-items-center justify-content-center  ">
                <img src="{{ asset('web/images/indeices-mobile.png') }}" class="img-full" alt="">
            </div>
        </div>
    </div>
</section> 
<section class="space-market-wrapper indices-space" id="section3">
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">

                <!-- <div class="space-heading">
                    <h3> <span class="f24">Access the Benefits of Trading Indices with</span> <strong>Space
                            Market?</strong> </h3>
                </div>

                <p class="f22">By Trading indices with Space Markets, we provide our Traders with the opportunity to
                    diversify their portfolio and exposure to multiple stocks within a single trade.</p> -->

                <!-- {!! $section3['pre_title'] ?? '' !!} -->
                 <div class="space-heading">
                     {!! $section3['main_title'] ?? '' !!}
                </div>
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