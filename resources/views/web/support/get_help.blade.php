@extends('layouts.web.app')

@section('content')

@php
$section1 = $data['section_1'] ?? null;
$section2 = $data['section_2'] ?? null;
$section3 = $data['section_3'] ?? null;
$section4 = $data['section_4'] ?? null;
$section5 = $data['section_5'] ?? null;
$whatsappNumber = getWhatsappNumber();
@endphp

<section class="gethelp-page" id="section1">

    <div class="container">
        <div class="row justify-content-xl-start justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-8 col-sm-10 col-12">
                <div class="gethelp-wrap">
                    <div class="title-wrap">
                        <!-- <h1 class="garet-book">Get <span class="garet-heavy">Help</span></h1>
                        <img src="{{ asset('/web/images/dots.png') }}" alt="">
                        <h5>Talk to Us</h5> -->
                        {!! $section1['main_title'] ?? '' !!}
                        <img src="{{ asset('/web/images/dots.png') }}" alt="">
                        <h5>{!! $section1['sub_title'] ?? '' !!}</h5>
                    </div>
                    <ul>
                        <li>
                            <a href="{{ isset($section2['email']) ? 'mailto:'.$section2['email'] : '#' }}">
                                <span><img src="{{ asset('/web/images/g-1.png') }}" alt=""></span>
                                <span>
                                    <strong>{!! $section2['title'] ?? '' !!}</strong>
                                    {!! $section2['short_description'] ?? '' !!}
                                </span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ isset($section3['email']) ? 'mailto:'.$section3['email'] : '#' }}">
                                <span><img src="{{ asset('/web/images/g-2.png') }}" alt=""></span>
                            
                                <span>
                                    <!-- Got Issue? Well We Got the Solution for You? -->
                                    <strong>{!! $section3['title'] ?? '' !!}</strong>
                                    {!! $section3['short_description'] ?? '' !!}
                                </span>
                            </a>
                        </li>


                        <li>
                            <a href="{{ isset($section4['email']) ? 'mailto:'.$section4['email'] : '#' }}">
                                <span><img src="{{ asset('/web/images/g-3.png') }}" alt=""></span>
                              
                                <span>
                                    <!-- Deposit and Withdrawals Questions -->
                                    <strong>{!! $section4['title'] ?? '' !!}</strong>
                                    {!! $section4['short_description'] ?? '' !!}
                                </span>
                            </a>
                        </li>
                        
                        <li>
                            <a href="{{ isset($section5['email']) ? 'mailto:'.$section5['email'] : '#' }}">
                                <span><img src="{{ asset('/web/images/g-4.png') }}" alt=""></span>
                                <span>
                                    <strong>{!! $section5['title'] ?? '' !!}</strong>
                                    {!! $section5['short_description'] ?? '' !!}
                                </span>
                            </a>
                        </li>
                        
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <div class="hand"><img src="{{ asset('/web/images/help-hands.png') }}" alt=""></div>

</section>

@if($whatsappNumber)
    <div class="whatsapp-widget">
        <a href="https://wa.me/{{ $whatsappNumber?->value ?? '#' }}" target="_blank"><img src="{{ asset('/web/images/whatsapp-widget.png') }}" alt=""></a>
    </div>
@endif

@endsection

@push('page_scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const accordionButtons = document.querySelectorAll('.select-department-btn ');

        accordionButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent the form from being submitted

                const accordionItem = this.parentElement;
                const isActive = accordionItem.classList.contains('active');

                // Collapse all accordion items
                document.querySelectorAll('.accordion-item').forEach(item => {
                    item.classList.remove('active');
                });

                // Toggle the clicked accordion item
                if (!isActive) {
                    accordionItem.classList.add('active');
                }
            });
        });
    });
</script>
@endpush