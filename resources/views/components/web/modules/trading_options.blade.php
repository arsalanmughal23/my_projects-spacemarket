@php $tradingOptions = getModuleData(\App\Models\Setting::MODULE_TRADING_OPTIONS); @endphp

<div class="trade-slider overflow-hidden">
    <div class="swiper-wrapper">

        @forelse($tradingOptions as $index => $tradingOption)
            <div class="swiper-slide">
                <div class="trade-inner">
                    <div class="image">
                        <img src="{{ asset('web/images/offer/icon-'.($index+1).'.png') }}" alt="">
                    </div>
                    <div class="content">
                        <h3>{{ $tradingOption->title }}</h3>
                        <p>{{ $tradingOption->description }}</p>
                        <!-- <p>Trade with ease on the world's <br /> largest and most liquid financial<br /> market.</p> -->
                    </div>
                    <div class="btn-wrap">
                        <a href="{{ $tradingOption->link }}" class="btn btn-link">Explore <span class="icon arrow-right"></span></a>
                    </div>
                </div>
            </div>
        @empty
            <!-- No Content Available -->
        @endforelse

    </div>
</div>
<div class="swiper-pagination-tradeslide"></div>
