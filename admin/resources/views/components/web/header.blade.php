<header>
    <div class="snowflakes  position-absolute h-100 z-1" aria-hidden="true">
        <div class="snowflake">
            <div class="inner">.</div>
        </div>
        <div class="snowflake">
            <div class="inner">.</div>
        </div>
        <div class="snowflake">
            <div class="inner">.</div>
        </div>
        <div class="snowflake">
            <div class="inner">.</div>
        </div>
        <div class="snowflake">
            <div class="inner">.</div>
        </div>
        <div class="snowflake">
            <div class="inner">.</div>
        </div>
        <div class="snowflake">
            <div class="inner">.</div>
        </div>
        <div class="snowflake">
            <div class="inner">.</div>
        </div>
        <div class="snowflake">
            <div class="inner">.</div>
        </div>
        <div class="snowflake">
            <div class="inner">.</div>
        </div>
        <div class="snowflake">
            <div class="inner">.</div>
        </div>
        <div class="snowflake">
            <div class="inner">.</div>
        </div>
    </div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-3 col-lg-6 col-6">
                <div class="logo">
                    <a href="{{ route('web.home') }}">
                        <img src="{{ asset(config('app.logo'))}}" alt="">
                    </a>
                </div>
            </div>
            <div class="col-xl-9 col-lg-6 col-6 ps-xl-0 d-flex justify-content-end">
                <button class="side-menu-close d-flex flex-wrap flex-column align-items-center justify-content-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>


                <nav class="desk-nav d-flex align-items-center justify-content-end">
                    <ul class="m-0 p-0 mainmenu">

                        <li><a href="javascript:;">Marketplace <i class="bi bi-chevron-down"></i></a>

                            <ul>
                                <li><a href="{{ route('web.marketplace', 'forex') }}"><img src="{{ asset('image/submenu/sb-1.png') }}" alt=""> Forex</a></li>
                                <li><a href="{{ route('web.marketplace', 'indices') }}"><img src="{{ asset('image/submenu/sb-2.png') }}" alt="">Indices</a></li>
                                <li><a href="{{ route('web.marketplace', 'shares') }}"><img src="{{ asset('image/submenu/sb-3.png') }}" alt="">Shares</a></li>
                                <li><a href="{{ route('web.marketplace', 'commodities_energies') }}"><img src="{{ asset('image/submenu/sb-4.png') }}" alt="">Commodities & Energies</a></li>
                            </ul>



                        </li>
                        <li><a href="javascript:;">Trading <i class="bi bi-chevron-down"></i></a>

                            <ul>
                                <li><a href="{{ route('web.trading', 'account_types') }}"><img src="{{ asset('image/submenu/sb-5.png') }}" alt="">Account Types</a></li>
                                <li><a href="{{ route('web.trading', 'payment_methods') }}"><img src="{{ asset('image/submenu/sb-6.png') }}" alt="">Payment Methods</a></li>
                                <li><a href="{{ route('web.trading', 'withdrawals') }}"><img src="{{ asset('image/submenu/sb-7.png') }}" alt="">Withdrawals</a></li>
                                <li><a href="{{ route('web.trading', 'deposits') }}"><img src="{{ asset('image/submenu/sb-8.png') }}" alt="">Deposits</a></li>
                            </ul>

                        </li>
                        <li><a href="javascript:;">Partners <i class="bi bi-chevron-down"></i> </a>
                            <ul>
                                <li><a href="{{ route('web.partner', 'affiliate') }}"><img src="{{ asset('image/submenu/sb-9.png') }}" alt="">Affiliates</a></li>
                                <li><a href="{{ route('web.partner', 'white_label') }}"><img src="{{ asset('image/submenu/sb-10.png') }}" alt="">White Label</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:;">Support <i class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a href="{{ route('web.support', 'get_help') }}"><img src="{{ asset('image/submenu/sb-11.png') }}" alt="">Get Help</a></li>
                                <li><a href="{{ route('web.support', 'faq') }}"><img src="{{ asset('image/submenu/sb-12.png') }}" alt="">FAQ</a></li>
                                <li><a href="{{ route('web.support', 'about_us') }}"><img src="{{ asset('image/submenu/sb-13.png') }}" alt="">About Us</a></li>
                                <li><a href="{{ route('web.support', 'legal_documents') }}"><img src="{{ asset('image/submenu/sb-14.png') }}" alt="">Legal Documents</a></li>
                                <li><a href="{{ route('web.support', 'subscribe_newsletter') }}"><img src="{{ asset('image/submenu/sb-15.png') }}" alt="">Subscribe </a></li>
                                <li><a href="{{ route('web.support', 'contact_us') }}"><img src="{{ asset('image/submenu/sb-16.png') }}" alt="">Contact Us </a></li>
                            </ul>
                        </li>
                        <!-- <li><a href="{{ route('web.blogs.index') }}">Learn </a></li> -->

                    </ul>
                    <div class="header-btn">
                        <a href="{{ $headerSection1['login_link'] ?? '#' }}"><span class="icon user-icon"></span> Sign In</a>
                        <a href="{{ $headerSection1['register_link'] ?? '#' }}"><span class="icon register-icon"></span> Register</a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>