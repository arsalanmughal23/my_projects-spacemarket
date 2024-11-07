@extends('layouts.web.app')

@section('content')

@php
$section1 = $data['section_1'] ?? null;
@endphp

<section class="inner-banner join-our-orbit">
    <div class="container">
        <div class="row align-items-center justify-content-xl-start justify-content-center">
            <div class="col-xl-8 col-lg-8 col-md-10 col-12">
                <div class="content-wrap">
                    <!-- <h1>Join our Orbit <strong class="clr-new">
                            Stay Abreast of the Latest Developments at Space Markets </strong>
                    </h1> -->
                    
                    {!! $section1['main_title'] ?? '' !!}
                    <p>{!! $section1['sub_title'] ?? '' !!}</p>

                    <div class="form-joinorbit">
                        <form action="{{ route('web.user_requests.store') }}" method="post" id="subscribeNewsletter">
                            @csrf()
                            <input type="hidden" name="type" value="subscribe_newsletter">
                            <input type="text" name="first_name" placeholder="First Name" class="fullname" maxlength="50">
                            <input type="text" name="last_name" placeholder="Last Name" class="fullname" maxlength="50">
                            <input type="tel" name="contact_number" placeholder="Mobile Number" class="phonenumber" maxlength="15">
                            <input type="email" name="email" placeholder="E-Mail Address" class="emailaddress" maxlength="50">
                            
                            <input name="full_name" type="hidden" value="-" placeholder="Full Name" class="fullname">
                            <textarea name="description" id="text" value="-" placeholder="Brief Description of Your Query" maxlength="250"></textarea>

                            <button type="submit" class="subscriber-btn"> Subscribe <span></span></button>
                        </form>
                    </div>

                </div>
            </div>
            <div class="col-xl-4 col-12">

                <div class="orbitslider ">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="{{ asset('/web/images/sub-1.png') }}" alt="" class="rotateimage"></div>
                        <div class="swiper-slide"><img src="{{ asset('/web/images/sub-2.png') }}" alt="" class="rotateimage"></div>
                        <div class="swiper-slide"><img src="{{ asset('/web/images/sub-3.png') }}" alt="" class="rotateimage"></div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>

@endsection

@push('page_scripts')
<script>
    // script.js
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

        
        $('form#subscribeNewsletter').submit((e) => {
            const url = $('#video_link').val();
            const first_name = $('input[name=first_name]').val();
            const last_name = $('input[name=last_name]').val();
            $('input[name=full_name]').val(`${first_name} ${last_name}`);


            // if (!first_name || !last_name) {
            //     e.preventDefault(); // Prevent form submission if URL is invalid
            //     alert('Please enter a valid YouTube URL.');
            // }
        });
    });
</script>
@endpush