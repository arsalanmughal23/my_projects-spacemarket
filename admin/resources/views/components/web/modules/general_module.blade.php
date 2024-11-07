@php $tradingOptions = getModuleData(\App\Models\Setting::MODULE_TESTIMONIALS); @endphp

@forelse($tradingOptions as $tradingOption)
@empty
    <!-- No Content Available -->
@endforelse

