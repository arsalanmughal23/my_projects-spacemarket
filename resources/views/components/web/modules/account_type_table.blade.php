@php $accountTypes = getModuleData(\App\Models\Setting::MODULE_ACCOUNT_TYPES); @endphp

<div class="types-wrap position-relative">
    <ul class="top-header mobile-header d-xl-none d-grid">
        <li>Account Name</li>
        <li>Minimum</li>
        <li>Spread</li>
        <li>Commissions</li>
        <li>Bonus</li>
        <li>Platform</li>
        <li>Max Leverage</li>
    </ul>
    <ul class="wrap-ul">
        <div class="inner-wrap">
            <li>
                <ul class="top-header d-xl-grid d-none">
                    <li>Account Name</li>
                    <li>Minimum</li>
                    <li>Spread</li>
                    <li>Commissions</li>
                    <li>Bonus</li>
                    <li>Platform</li>
                    <li>Max Leverage</li>
                </ul>
            </li>

            @forelse($accountTypes as $accountType)
                <li>
                    <ul class="bottom-data">
                        <li class="leaft-head">{{ $accountType->account_name }}</li>
                        <li>{{ $accountType->minimum }}</li>
                        <li>{{ $accountType->spread }}</li>
                        <li>{{ $accountType->commission }}</li>
                        <li>{{ $accountType->bonus }}</li>
                        <li>{{ $accountType->platform }}</li>
                        <li>{{ $accountType->leverage }}</li>
                    </ul>
                </li>
            @empty
                <li>
                    <ul class="bottom-data">
                        <li class="leaft-head">No Record Available</li>
                    </ul>
                </li>
            @endforelse

        </div>
    </ul>
    <div class="next-arrow d-xl-none align-items-center d-inline-flex gap-2">
        Swipe<span class="icon arrow-right"></span>
    </div>
</div>