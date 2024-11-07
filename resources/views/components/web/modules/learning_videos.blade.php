@php $learnVideos = getModuleData(\App\Models\Setting::MODULE_LEARNING_VIDEOS); @endphp
@if($learnVideos->count() > 0)
<div class="video-outer position-relative z-1">
    <div class="container-fluid">
        <div class="row">
            <div class="video-slider position-relative z-1">
                <div class="swiper-wrapper">
                    @foreach($learnVideos as $learnVideo)

                        <div class="swiper-slide">
                            <div class="vid-inner position-relative">
                                <div class="vid-iframe">
                                    <img src="{{ $learnVideo->thumbnail }}" alt="">
                                </div>
                                <a href="{{ $learnVideo->embed_url }}" class="video-btn">
                                    <img src="{{ asset('web/images/video-section/video-btn.png') }}" alt="">
                                </a>
                                <div class="content">
                                    <span class="date">{{ \Carbon\Carbon::parse($learnVideo->updated_at)->format('d/m/Y') }}</span>
                                    <span class="description">{{ $learnVideo->title }}</span>
                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>
            </div>
            <div class="swiper-pagination-videoslider"></div>
        </div>
    </div>
</div>
@else
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="video-title no-video text-center p-0 m-0">
                <h2 class="garet-heavy text-center">No <span class="clr-new">Videos Available</span></h2>
            </div>
        </div>
    </div>
</div>
@endif