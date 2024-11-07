@php
    $pageSlug = $data['page_slug'] ?? null;
    $pageName = $data['page_name'] ?? null;

    $layoutPartsContent = getLayoutPartsContent() ?? null;

    $header = $layoutPartsContent['header'] ?? null;
    $headerSection1 = $header['section_1'] ?? null;

    $preFooter = $layoutPartsContent['pre_footer'] ?? null;
    $preFooterSection1 = $preFooter['section_1'] ?? null;

    $footer = $layoutPartsContent['footer'] ?? null;
    $footerSection1 = $footer['section_1'] ?? null;
    $footerSection2 = $footer['section_2'] ?? null;
    $footerSection3 = $footer['section_3'] ?? null;
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Space Markets') }} @if($pageName) | {{ $pageName }} @endif</title>
    <!-- fonts -->

    <link rel="icon" type="image/x-icon" href="{{ asset(config('app.favicon')) }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,400;0,900;1,900&display=swap" rel="stylesheet">
    <!-- custom fonts -->
    <link rel="preload" href="{{ asset('web/fonts/Garet-Heavy.woff2') }}" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="{{ asset('web/fonts/Garet-Book.woff2') }}" as="font" type="font/woff2" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('web/css/style.css') }}?v={{ date('is') }}">
    <link rel="stylesheet" href="{{ asset('web/css/custom.css') }}?v={{ date('is') }}">
    <link rel="stylesheet" href="{{ asset('web/css/responsive.css') }}?v={{ date('is') }}">

    <!-- Summernote Custom Sytling -->
    <link href="{{ asset('css/summernote_styling.css') }}" rel="stylesheet">

</head>

<body class="webpage {{ $pageSlug }}-body">

    <div class="star-color"></div>
    <div class="more-snow"></div>
    <!-- wrapper start -->
    <div class="wrapper position-relative z-1">

        <div class="alert-wrap {{ Session::has('errors') ? 'active' : '' }}">
            @include('adminlte-templates::common.errors')
        </div>

        <div class="alert-wrap {{ Session::get('flash_notification', collect())->count() ? 'active' : '' }}">
            @include('flash::message')
        </div>

        <!-- ERROR MESSAGES -->
        
        <!-- <div class="alert-wrap">
            <ul class="alert alert-danger" style="list-style-type: none">
                <li>The full name field is required.</li>
                <li>The contact number field is required.</li>
                <li>The ticket number field is required.</li>
                <li>The trade number field is required.</li>
            </ul>
        </div> -->

        <!-- SUCCESS MESSAGE -->
        <!-- <div class="alert-wrap">
            <div class="alert alert-success" role="alert">
                User Request saved successfully.
            </div>
        </div> -->

        @include('components.web.header')

        @yield('content')

        @include('components.web.pre_footer__trading_fx_revolution')
        @include('components.web.footer')

    </div>

    @include('components.web.mobile_menu')

    <script>
        //     var videoslider = new Swiper(
        //     '.video-slider', {
        //       // Optional parameters
        //       direction: 'horizontal',
        //       centeredSlides: true,
        //       slidesPerView: 1,
        //       spaceBetween: 30,
        //       //autoHeight: true,
        //        autoplay: {
        //          delay: 2000,
        //          disableOnInteraction: false,
        //        },
        //        speed: 1000,
        //       loop: false,
        //     //   effect: 'fade',
        //         navigation: {
        //         nextEl: '.swiper-button-next-videoslider',
        //         prevEl: '.swiper-button-prev-videoslider'
        //       },
        //       pagination: {
        //         el: '.swiper-pagination-videoslider',
        //         clickable: true,
        //       },
        //       mousewheel: {
        //         invert: false,
        //       },
        //       breakpoints: {
        //         768: {
        //           slidesPerView: 3,
        //           spaceBetween: 10, 
        //         },
        //       1200: {
        //           slidesPerView: 3,
        //           spaceBetween: 0,

        //         },
        //       },
        //   });
    </script>
    <!-- wrapper end -->

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- <script src="/space-markets/assets/js/swiper-bundle.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{ asset('web/js/script.js') }}?v={{ date('is') }}"></script>

    @stack('page_scripts')
</body>

</html>