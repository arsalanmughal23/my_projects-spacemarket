<footer>
    <div class="footer-wrap mb-60" id="footerSection1">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-12 pe-xl-0">
                    <div class="footer-info">
                        <div class="logo">
                            <img src="{{ asset(config('app.logo'))}}" alt="">
                        </div>
                        <div class="info">
                            <!-- <p>Space Markets is an FSCA registered and regulated financial services provider with FSP #53183</p> -->
                            {!! $footerSection1['about_description'] ?? '' !!}
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-12">
                    <div class="f-menu-wrap">
                        <div class="footer-menu">
                            <h4 class="clr-new">Global Markets</h4>
                            <ul>
                                <li><a href="{{ route('web.marketplace', 'forex') }}">Forex</a></li>
                                <li><a href="{{ route('web.marketplace', 'indices') }}">Indices</a></li>
                                <li><a href="{{ route('web.marketplace', 'shares') }}">Shares</a></li>
                                <li><a href="{{ route('web.marketplace', 'commodities_energies') }}">Commodities</a></li>
                            </ul>
                        </div>
                        <div class="footer-menu">
                            <h4 class="clr-new">Trading</h4>
                            <ul>
                                <li><a href="{{ route('web.trading', 'account_types') }}">Account Types</a></li>
                                <li><a href="{{ route('web.trading', 'payment_methods') }}">Payment Methods</a></li>
                                <li><a href="{{ route('web.trading', 'withdrawals') }}">Withdrawals</a></li>
                                <li><a href="{{ route('web.trading', 'deposits') }}">Deposits</a></li>

                            </ul>
                        </div>
                        <div class="footer-menu">
                            <h4 class="clr-new">Support</h4>
                            <ul>
                                <li><a href="{{ route('web.support', 'about_us') }}">About</a></li>
                                <li><a href="{{ route('web.support', 'legal_documents') }}">Legal Documents</a></li>
                                <li><a href="{{ route('web.support', 'contact_us') }}">Contact</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="disclaimer-wrap" id="footerSection2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="content ">
                        <!-- <p><span><strong>Risk Disclosure and Warning Notice: </strong></span>Trading forex and CFD's on margin carries a high level of risk, and may not be suitable for all investors. The high degree of leverage can work against you as well as for you. Before deciding to trade forex and CFD's you should carefully consider your investment objectives, level of experience, and risk appetite. The possibility exists that you could sustain a loss of some or all of your initial investment and therefore you should not invest money that you cannot afford to lose. You should be aware of all the risks associated with forex and CFD trading, and seek advice from an independent financial advisor if you have any doubts.</p>
                        <p><span><strong>Disclaimer: </strong></span>Kindly note that Space Markets does not offer services to US investors. Additionally, under no condition is scalping permissible.</p>
                        <p><span class="text-white"><strong>LEGAL AND REGULATION: </strong></span>Space Markets (Pty) Ltd is incorporated in South Africa with registration number <code>2023 / 651612 / 07</code>

                            . Space Markets (PTY) LTD is an Authorised Financial Services Provider with the FSCA: FSP53183. <br />Registered address: <span>CLEARWATER OFFICE PARK ROODEPOORT, WEST RAND, GAUTENG</span> -->

                        <div class="description risk_disclosure_and_warning_notice">{!! $footerSection2['risk_disclosure_and_warning_notice'] ?? '' !!}</div>
                        <div class="description disclaimer">{!! $footerSection2['disclaimer'] ?? '' !!}</div>
                        <div class="description legal_and_regulation">{!! $footerSection2['legal_and_regulation'] ?? '' !!}</div>
                        <div class="description registered_address">{!! $footerSection2['registered_address'] ?? '' !!}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copy-write mgr-top-30" id="footerSection3">
        <div class="container">
            <div class="copy-write-inner position-relative pad-top-30">
                <div class="row align-items-center flex-lg-row flex-column-reverse">
                    <div class="col-lg-6 col-12">
                        <p>Copyright @ Space Markets (Pty) Ltd 2024</p>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="social">
                            <ul class="social-links d-flex justify-content-lg-end justify-content-center">
                                <!-- <li><a href="https://www.instagram.com/space_markets/" target="_blank"><span class="social-icon instagram"></span></a></li>
                                <li><a href="https://www.facebook.com/profile.php?id=61559597152608" target="_blank"><span class="social-icon facebook"></span></a></li>
                                <li><a href="https://www.youtube.com/channel/UCxHXqeeWnlddQefTZ8XalkQ" target="_blank"><span class="social-icon youtube"></span></a></li> -->

                                <li><a href="{{ $footerSection3['instagram_link'] ?? '#' }}" target="_blank"><span class="social-icon instagram"></span></a></li>
                                <li><a href="{{ $footerSection3['facebook_link'] ?? '#' }}" target="_blank"><span class="social-icon facebook"></span></a></li>
                                <li><a href="{{ $footerSection3['youtube_link'] ?? '#' }}" target="_blank"><span class="social-icon youtube"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>