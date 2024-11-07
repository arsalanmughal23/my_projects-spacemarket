@extends('layouts.web.app')

@section('content')

@php 
    $section1 = $data['section_1'] ?? null;
    $section2 = $data['section_2'] ?? null;
    $section3 = $data['section_3'] ?? null;
    $dataList = getDataList(\App\Models\DataList::TYPE_MARKETPLACE_FOREX);
@endphp

<section class="inner-banner forex-banner" id="section1">
    <div class="container">
        <div class="row align-items-start">
            <div class="col-xl-6 col-lg-12 col-12">
                <div class="content-wrap text-xl-start text-center">
                    {!! $section1['main_title'] ?? '' !!}
                    {!! $section1['description'] ?? '' !!}
                </div>
            </div>
            <div class="col-xl-6 col-lg-12 col-12">
                <div class="hand-wrap image-wrap text-center">
                    <img src="{{ asset('web/images/hand-gif.gif') }}" class="gif-img" alt="">
                    <img src="{{ asset('web/images/hand-image.png') }}" class="main-img" alt="">
                </div>
            </div>
        </div>
    </div>
</section>


<section class="concept-wrapper forex-explore" id="section2">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12">  
                <div class="heading-inner">
                    <h3>{!! $section2['pre_title'] ?? '' !!}</h3>
                    {!! $section2['main_title'] ?? '' !!}
                    {!! $section2['description'] ?? '' !!}
                </div> 
            </div>
            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 text-xl-end text-center">
                <img src="{{ asset('web/images/gif/forex-trade-icon.gif') }}" alt="">
            </div>
        </div>
    </div>
</section> 
 
<div class="space-market-wrapper" id="section3">
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">

                <div class="space-heading">

                   
                    {!! $section3['main_title'] ?? '' !!}
                    {!! $section3['description'] ?? '' !!}

                </div>

               
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
</div>

@endsection