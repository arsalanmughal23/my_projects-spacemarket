@extends('layouts.web.app')

@section('content')

@php
$section1 = $data['section_1'] ?? null;
$section2 = $data['section_2'] ?? null;
$section3 = $data['section_3'] ?? null;
@endphp

<section class="inner-banner withdrawal-banner">
    <div class="container">
        <div class="row align-items-start">
            <div class="col-xl-7 col-12">
                <div class="content-wrap">
                    <!-- <h1>Withdrawing Your Profits
                        <strong class="clr-new">Has Never Been Easier.</strong>
                    </h1>
                    <p>Experience hassle-free withdrawals like never before. We understand the importance of swift and effortless access to your funds. With our user-friendly platform and access to our dedicated support team, withdrawing your earnings is an effortless process. Simply navigate to the withdrawals section on our client portal, choose your preferred method, and sit back as your four team ensures your funds are swiftly paid out to you via your wirthdrawal request. Whether you opt for bank transfers, e-wallets, or any other method, rest assured, your withdrawals are executed seamlessly, allowing you to focus on what truly matters
                        <strong class="clr-new">– trading with confidence.</strong>
                    </p> -->
                    
                    <!-- {!! $section1['pre_title'] ?? '' !!} -->
                    {!! $section1['main_title'] ?? '' !!}
                    {!! $section1['description'] ?? '' !!}

                </div>
            </div>
            <div class="col-xl-5 col-12 text-xl-start text-center">
                <img src="{{ asset('/web/images/withdrawn-1.gif') }}" alt="">
            </div>
        </div>
    </div>
</section>

<div class="linebar-area"></div>

<section class="withdrawal-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <!-- <h2 class="text-center">How to Process a
                    <strong>Withdrawal</strong>
                </h2> -->                
                <!-- {!! $section2['pre_title'] ?? '' !!} -->
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

<section class="help-wrapper with-help" id="section3">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">

                <div class="help-para text-center">
                    <!-- <h3 class="text-center">We're Here to Help!</h3>
                    <p class="text-center">Need assistance to process a withdrawal or need a status update on your existing withdrawal? Complete the form below and one of our support team members will be in touch shortly to guide you to successful withdrawal!</p> -->
                
                    {!! $section3['main_title'] ?? '' !!}
                    {!! $section3['description'] ?? '' !!}
                </div>
                <div class="form-joinorbit">
                    <form action="{{ route('web.user_requests.store') }}" method="post">
                        @csrf()
                        <input type="hidden" name="type" value="withdrawal">
                        <input name="full_name" type="text" placeholder="Full Name" class="fullname" maxlength="50">
                        <input name="email" type="email" placeholder="E-Mail Address" class="emailaddress" maxlength="50">
                        <input name="contact_number" type="tel" placeholder="Mobile Number" id="phonenumber" class="phonenumber" maxlength="15">
                        <input name="ticket_number" type="tel" placeholder="Ticker Number" id="tickernumber" class="tickernumber" maxlength="50">
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
<script>
    // document.addEventListener('DOMContentLoaded', (event) => {
    //     const phoneInputs = document.querySelectorAll('input[type="tel"]');

    //     phoneInputs.forEach(input => {
    //         input.addEventListener('keypress', function(event) {
    //             const charCode = event.charCode;
    //             if (charCode !== 0) {
    //                 const char = String.fromCharCode(charCode);
    //                 if (!/[0-9]/.test(char)) {
    //                     event.preventDefault();
    //                 }
    //             }
    //         });

    //         input.addEventListener('input', function(event) {
    //             this.value = this.value.replace(/[^0-9]/g, '');
    //         });
    //     });
    // });
</script>
@endpush