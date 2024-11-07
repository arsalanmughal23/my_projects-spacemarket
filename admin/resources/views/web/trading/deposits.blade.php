@extends('layouts.web.app')

@section('content')

@php
$section1 = $data['section_1'] ?? null;
$section2 = $data['section_2'] ?? null;
$section3 = $data['section_3'] ?? null;
@endphp

<section class="inner-banner deposit-banner" id="section1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 col-12">
                <div class="content-wrap text-center">
                    <!-- <h1><strong class="clr-new">Deposit Funds to Start Trading Today!</strong> </h1>
                    <p>Empower your trading journey with seamless fund deposits through a variety of payment service providers, directly on our platform. With us, adding funds to your trading account has never been easier. Whether you prefer traditional bank transfers, secure credit/debit card transactions, or the convenience of e-wallets, our intuitive interface ensures a smooth and secure deposit process every time. Say goodbye to delays and complications – simply select your preferred deposit method from the client portal, input the desired amount, and watch as your funds are swiftly credited to your account. Trade with confidence knowing that your deposits are handled with the utmost security and efficiency, enabling you to focus on what truly matters – making informed investment decisions.</p> -->
                    {!! $section1['main_title'] ?? '' !!}
                    {!! $section1['description'] ?? '' !!}
                </div>
            </div>
            <div class="col-lg-12  text-center col-12">
                <img src="{{ asset('/web/images/deposit-gif.gif') }}" alt="">
            </div>
        </div>
    </div>
</section>

<div class="linebar-area"></div>

<section class="withdrawal-wrapper" id="section2">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <!-- <h2 class="text-center">How to Make a
                    <strong>Deposit</strong>
                </h2> -->
                <!-- <div class="pre_title">{!! $section2['pre_title'] ?? '' !!}</div> -->
                {!! $section2['main_title'] ?? '' !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="facPri">
                    <a href="{{ $section2['video'] ?? '#' }}" class="vid-link">
                        <img src="{{ asset('/web/images/vidio-secion.png') }}" alt="" class="mw-100" id="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="linebar-area"></div>

<section class="help-wrapper deposit-help" id="section3">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">

                <div class="help-para text-center">
                    <!-- <h3 class="text-center">We're Here to Help!</h3>
                    <p class="text-center">Need assistance to make a deposit or need a status update on your existing deposit reflecting? Complete the form below and one of our support team members will be in touch shortly to get you funded and Trading ASAP!</p> -->
                    {!! $section3['main_title'] ?? '' !!}
                    {!! $section3['description'] ?? '' !!}
                </div>
                <div class="form-joinorbit">
                    <form action="{{ route('web.user_requests.store') }}" method="post">
                        @csrf()
                        <input type="hidden" name="type" value="deposit">
                        <input name="full_name" type="text" placeholder="Full Name" class="fullname" maxlength="50">
                        <input name="email" type="email" placeholder="E-Mail Address" class="emailaddress" maxlength="50">
                        <input name="contact_number" type="tel" placeholder="Mobile Number" class="phonenumber" maxlength="15">
                        <input name="ticket_number" type="tel" placeholder="Ticker Number" class="tickernumber" maxlength="50">
                        <input name="trade_number" type="tel" placeholder="Trader No." class="tradernumber" maxlength="50">
                        <textarea name="description" id="description" placeholder="Brief Description of Your Query" maxlength="250"></textarea>
                        <button type="submit" class="sendmessage"> Submit <span></span></button>
                    </form>
                </div>

            </div>
        </div>
    </div>

</section>

@endsection

@push('page_scripts')
@endpush