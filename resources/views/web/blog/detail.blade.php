@extends('layouts.web.app')

@section('content')

@php
$allBlogs = getBlogData(\App\Models\Blog::CONST_ALL_BLOG);
$relatedBlogs = getBlogData(\App\Models\Blog::CONST_RELATED_BLOG);
@endphp


<section class="blogbanner">
    <img src="{{ $data->banner_image ? $data->banner_image_link : null }}" alt="">
</section>
<div class="blog-wrapper-detail mt-60">

    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="d-flex gap30 ">
                    <a href="{{ route('web.blogs.index') }}" class="back-btn"><img src="{{ asset('/web/images/back-btn.png') }}" alt=""></a>
                    <div class="dateitem">{{ \Carbon\Carbon::parse($data?->updated_at)->format('F d, Y') }}</div>
                </div>
                <h1 class="hmgr">{!! $data?->title !!}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="blog-details">
                    {!! $data?->description !!}
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row related-articales">
            <div class="col-md-12 d-flex justify-content-between align-items-center p-0">
                <h2><strong>Related</strong> Articles</h2>
                <a href="{{ route('web.blogs.index') }}" class="see-all">See all</a>
            </div>
        </div>

        <div class="row">
            
            @forelse($relatedBlogs as $blog)
                <div class="col-md-4 col-sm-6 col-12">
                    @include('components.web.modules.blog_card', [ 'data' => $blog ])
                </div>
            @empty
                Related Blogs are not available
            @endforelse

            <!-- <div class="col-md-4 col-sm-6 col-12">
                <div class="blog-boxes">
                    <div class="thumb-img">
                        <a href="blog-details.php"> <img src="{{ asset('/web/images/B1.png') }}" /></a>
                    </div>
                    <div class="p20">
                        <div class="dateitem">November 29, 2023</div>
                        <h3><a href="blog-details.php" class="text-decoration-none">How to become a Partner/ IB with RCG Markets</a></h3>
                        <p>Remember, building a successful partnership requires time, effort, and dedication. Ensure you
                            offer genuine value to your clients and work closely with us to make the most out of the
                            partnership</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 col-12">
                <div class="blog-boxes">
                    <div class="thumb-img">
                        <a href="blog-details.php"> <img src="{{ asset('/web/images/B2.png') }}" /></a>
                    </div>
                    <div class="p20">
                        <div class="dateitem">November 29, 2023</div>
                        <h3><a href="blog-details.php" class="text-decoration-none">How to become a Partner/ IB with RCG Markets</a></h3>
                        <p>Remember, building a successful partnership requires time, effort, and dedication. Ensure you
                            offer genuine value to your clients and work closely with us to make the most out of the
                            partnership</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 col-12">
                <div class="blog-boxes">
                    <div class="thumb-img">
                        <a href="blog-details.php"> <img src="{{ asset('/web/images/B3.png') }}" /></a>
                    </div>
                    <div class="p20">
                        <div class="dateitem">November 29, 2023</div>
                        <h3><a href="blog-details.php" class="text-decoration-none">How to become a Partner/ IB with RCG Markets</a></h3>
                        <p>Remember, building a successful partnership requires time, effort, and dedication. Ensure you
                            offer genuine value to your clients and work closely with us to make the most out of the
                            partnership</p>
                    </div>
                </div>
            </div> -->

        </div>

    </div>
</div>

@endsection