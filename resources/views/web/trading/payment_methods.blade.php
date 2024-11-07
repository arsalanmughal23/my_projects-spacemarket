@extends('layouts.web.app')

@section('content')

@php
$section1 = $data['section_1'] ?? null;
$paymentMethods = getModuleData(\App\Models\Setting::MODULE_PAYMENT_METHOD);
@endphp

<section class="inner-banner paymentmethod-banner position-relative">

    <div class="container">
        <div class="row align-items-start mb-4">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="content-wrap text-center">
                    <!-- <h1 class="mb-4 hover-title-content garet-heavy">Payment <strong class="clr-new">Methods</strong></h1>
                    <p class="d-table m-auto">A Variety of Payment Methods to Assist Your Trading Journey</p> -->

                    <div class="hover-title-content">{!! $section1['main_title'] ?? '' !!}</div>
                    <p class="d-table m-auto">{!! $section1['sub_title'] ?? '' !!}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="paymentmethod-wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-9 col-md-10 col-12">

                    <div class="types-wrap payment-table">
                        <ul>
                            <li>
                                <ul class="top-header">
                                    <li>Payment Method</li>
                                    <li>Deposits</li>
                                    <li>Withdrawals</li>
                                </ul>
                            </li>
                            @forelse($paymentMethods as $paymentMethod)
                                <li>
                                    <ul class="bottom-data">
                                        <li><img src="{{ $paymentMethod->image_link }}" alt=""></li>
                                        @if($paymentMethod->is_deposit)
                                            <li><img src="{{ asset('/web/images/payment-icon/correct-icon.png') }}"></li>
                                        @else                                        
                                            <li><img src="{{ asset('/web/images/payment-icon/wrong-icon.png') }}"></li>
                                        @endif
                                        @if($paymentMethod->is_withdrawal)
                                            <li><img src="{{ asset('/web/images/payment-icon/correct-icon.png') }}"></li>
                                        @else                                        
                                            <li><img src="{{ asset('/web/images/payment-icon/wrong-icon.png') }}"></li>
                                        @endif
                                    </ul>
                                </li>
                            @empty
                                No Content Available
                            @endforelse
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>

</section>
@endsection