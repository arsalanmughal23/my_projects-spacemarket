@php $testimonials = getModuleData(\App\Models\Setting::MODULE_TESTIMONIALS); @endphp

<div class="reviews-slider overflow-hidden">
    <div class="swiper-wrapper">

        @forelse($testimonials as $testimonial)

            <div class="swiper-slide">
                <div class="listener-item">
                    <span class="quote-icon"></span>
                    <h3>{{ $testimonial->title }}</h3>
                    <p>{{ $testimonial->description }}</p>
                </div>
            </div>

        @empty
            <!-- No Content Available -->
        @endforelse

    </div>
    <div class="swiper-pagination-reviews-slider"></div>
</div>