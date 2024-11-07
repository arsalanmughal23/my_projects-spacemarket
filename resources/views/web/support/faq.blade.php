@extends('layouts.web.app')

@section('content')

@php
$section1 = $data['section_1'] ?? null;
$faqs = getModuleData(\App\Models\Setting::MODULE_FAQS);
@endphp

<section class="faq-page" id="section1">
    <div class="container">
        <div class="row">
            <div class="col-12 mx-auto">
                <div class="cheading">
                    <!-- <h1>We're Here to Answer Your Burning Questions!</h1>
                    <h2>FAQ’s</h2> -->
                    
                    <h1>{!! $section1['pre_title'] ?? '' !!}</h1>
                    {!! $section1['main_title'] ?? '' !!}
                </div>

                <div class="faq-acc accordion" id="accordionExample">
                    
                    @forelse($faqs as $index => $faq)

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{ ($index+1) }}">
                                <button class="accordion-button {{ $index == 0 ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ ($index+1) }}" aria-expanded="true" aria-controls="collapse{{ ($index+1) }}">
                                    {{ $faq->title }}
                                </button>
                            </h2>
                            <div id="collapse{{ ($index+1) }}" class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}" aria-labelledby="heading{{ ($index+1) }}" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>{{ $faq->description }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <!-- No Content Available -->
                    @endforelse

                </div>
            </div>


        </div>
    </div>


    </div>

</section>

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