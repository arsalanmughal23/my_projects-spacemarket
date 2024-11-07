<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-body">
        <div class="flex-shrink-0 p-3">
            <div class="head-offcanvas">
                <button class="side-menu-close d-flex flex-wrap flex-column align-items-center justify-content-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
            <a href="{{ route('web.home') }}" class="offcanvas-logo d-flex align-items-center pb-4 mb-4 link-dark text-decoration-none border-bottom">
                <img src="{{ asset(config('app.logo'))}}" alt="Space Markets">
            </a>
            <ul class="list-unstyled ps-0">
                <li class="mb-3">
                    <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
                        Marketplace
                    </button>
                    <div class="collapse" id="home-collapse" style="">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ps-4">
                            <li><a href="{{ route('web.marketplace', 'forex') }}" class="rounded text-decoration-none"><img src="{{ asset('/web/images/submenu/sb-1.png') }}" alt=""> Forex</a></li>
                            <li><a href="{{ route('web.marketplace', 'indices') }}" class="rounded text-decoration-none"><img src="{{ asset('/web/images/submenu/sb-2.png') }}" alt=""> Indices</a></li>
                            <li><a href="{{ route('web.marketplace', 'shares') }}" class="rounded text-decoration-none"><img src="{{ asset('/web/images/submenu/sb-3.png') }}" alt=""> Shares</a></li>
                            <li><a href="{{ route('web.marketplace', 'commodities_energies') }}" class="rounded text-decoration-none"><img src="{{ asset('/web/images/submenu/sb-4.png') }}" alt=""> Commodities & Energies</a></li>
                        </ul>
                    </div>
                </li>
                <li class="mb-3">
                    <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                        Trading
                    </button>
                    <div class="collapse" id="dashboard-collapse" style="">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ps-4">
                            <li><a href="{{ route('web.trading', 'account_types') }}" class="rounded text-decoration-none"><img src="{{ asset('/web/images/submenu/sb-5.png') }}" alt=""> Account Types</a></li>
                            <li><a href="{{ route('web.trading', 'payment_methods') }}" class="rounded text-decoration-none"><img src="{{ asset('/web/images/submenu/sb-6.png') }}" alt=""> Payment Methods</a></li>
                            <li><a href="{{ route('web.trading', 'withdrawals') }}" class="rounded text-decoration-none"><img src="{{ asset('/web/images/submenu/sb-7.png') }}" alt=""> Withdrawals</a></li>
                            <li><a href="{{ route('web.trading', 'deposits') }}" class="rounded text-decoration-none"><img src="{{ asset('/web/images/submenu/sb-8.png') }}" alt=""> Deposits</a></li>
                        </ul>
                    </div>
                </li>
                <li class="mb-3">
                    <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#partner-collapse" aria-expanded="false">
                        Partners
                    </button>
                    <div class="collapse" id="partner-collapse" style="">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ps-4">
                            <li><a href="{{ route('web.partner', 'affiliate') }}" class="rounded text-decoration-none"><img src="{{ asset('/web/images/submenu/sb-9.png') }}" alt=""> Affiliates</a></li>
                            <li><a href="{{ route('web.partner', 'white_label') }}" class="rounded text-decoration-none"><img src="{{ asset('/web/images/submenu/sb-10.png') }}" alt=""> White Label</a></li>
                        </ul>
                    </div>
                </li>
                <li class="mb-3">
                    <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                        Support
                    </button>
                    <div class="collapse" id="orders-collapse" style="">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ps-4">
                            <li><a href="{{ route('web.support', 'get_help') }}" class="rounded text-decoration-none"><img src="{{ asset('/web/images/submenu/sb-11.png') }}" alt="">Get Help</a></li>
                            <li><a href="{{ route('web.support', 'faq') }}" class="rounded text-decoration-none"><img src="{{ asset('/web/images/submenu/sb-12.png') }}" alt="">FAQ</a></li>
                            <li><a href="{{ route('web.support', 'about_us') }}" class="rounded text-decoration-none"><img src="{{ asset('/web/images/submenu/sb-13.png') }}" alt="">About Us</a></li>
                            <li><a href="{{ route('web.support', 'legal_documents') }}" class="rounded text-decoration-none"><img src="{{ asset('/web/images/submenu/sb-14.png') }}" alt="">Legal Documents</a></li>
                            <li><a href="{{ route('web.support', 'subscribe_newsletter') }}" class="rounded text-decoration-none"><img src="{{ asset('/web/images/submenu/sb-15.png') }}" alt="">Subscribe </a></li>
                            <li><a href="{{ route('web.support', 'contact_us') }}" class="rounded text-decoration-none"><img src="{{ asset('/web/images/submenu/sb-16.png') }}" alt="">Contact Us </a></li>
                        </ul>
                    </div>
                </li>
                <!-- <li class="mb-3">
                    <a href="{{ route('web.blogs.index') }}" class="btn btn-toggle single-btn align-items-center rounded collapsed">
                        Learn
                    </a>
                </li> -->
                <li class="border-top my-4"></li>
                <li class="mb-1">
                    <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                        Account
                    </button>
                    <div class="collapse" id="account-collapse" style="">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ps-4">
                            <li><a href="{{ $headerSection1['login_link'] ?? '#' }}" class="text-decoration-none"><span class="icon user-icon"></span> Sign In</a></li>
                            <li><a href="{{ $headerSection1['register_link'] ?? '#' }}" class="text-decoration-none"><span class="icon register-icon"></span> Register</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>


<!-- Modal for Video and Image -->
<div class="modal fade" id="videoModal" aria-hidden="true" aria-labelledby="videoModalLabel" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content rounded-0 bg-black">
      <div class="modal-header p-0 border-0">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body border-0 p-0 text-center">
        <!-- <img src="" id="modalImage" class="modalImage" alt=""> -->
        <iframe id="videoIframe" src="" frameborder="0" allow="autoplay" allowfullscreen loading="lazy"> 
        </iframe>
      </div>
    </div>
  </div>
</div>