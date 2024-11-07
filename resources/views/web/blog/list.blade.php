@extends('layouts.web.app')

@section('content')

@php
$section1 = $data['section_1'] ?? null;
$todayBlog = getBlogData(\App\Models\Blog::CONST_TODAY_BLOG);
$allBlogs = getBlogData(\App\Models\Blog::CONST_ALL_BLOG);
@endphp

<div class="blog-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="blogpage-heading">
                    <h1>{!! $section1['main_title'] ?? '' !!}</h1>
                    <p>{!! $section1['description'] ?? '' !!}</p>
                </div>
            </div>
        </div>
        
        @if($todayBlog)
            <div class="row">
                <div class="col-md-12">

                    <div class="latestpost-area">
                        <div class="latest-upperlayer d-lg-none d-block">
                            <h3>Today’s Blog</h3>
                        </div>

                        <img src="{{ $todayBlog?->banner_image ?  $todayBlog->banner_image_link : asset('/web/images/latestblog.png') }}" />

                        <div class="latest-upperlayer">
                            <h3 class="d-lg-block d-none">Today’s Blog</h3>

                            <div class="debunking-area">
                                <div class="row d-flex align-items-end ">
                                    <div class="col-lg-9 col-12">
                                        <div class="dateitem d-lg-none d-table">{{ \Carbon\Carbon::parse($todayBlog?->updated_at)->format('F d, Y') }}</div>
                                        <h5>{!! $todayBlog?->title !!}</h5>
                                        <p>{!! $todayBlog?->short_description !!}</p>
                                        <div class="dateitem d-lg-block d-none">{{ \Carbon\Carbon::parse($todayBlog?->updated_at)->format('F d, Y') }}</div>
                                    </div>

                                    <div class="col-lg-3 col-12 d-flex ">
                                        <a href="{{ route('web.blogs.show', $todayBlog?->id ?? 0) }}" class="readmore">Read More</a>
                                    </div>
                                </div>

                            </div>

                        </div>


                    </div>


                </div>


            </div>
        @endif


        <div class="row">
            @forelse($allBlogs as $blog)
                <div class="col-lg-4 col-md-6 col-12">
                    @include('components.web.modules.blog_card', [ 'data' => $blog ])
                </div>
            @empty
                Blogs are not available
            @endforelse
            
            <!-- <div class="col-lg-4 col-md-6 col-12">
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
            <div class="col-lg-4 col-md-6 col-12">
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
            <div class="col-lg-4 col-md-6 col-12">
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
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="blog-boxes">
                    <div class="thumb-img">
                        <a href="blog-details.php"> <img src="{{ asset('/web/images/B4.png') }}" /></a>
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
            <div class="col-lg-4 col-md-6 col-12">
                <div class="blog-boxes">
                    <div class="thumb-img">
                        <a href="blog-details.php"> <img src="{{ asset('/web/images/B5.png') }}" /></a>
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
            <div class="col-lg-4 col-md-6 col-12">
                <div class="blog-boxes">
                    <div class="thumb-img">
                        <a href="blog-details.php"> <img src="{{ asset('/web/images/B6.png') }}" /></a>
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
            <div class="col-lg-4 col-md-6 col-12">
                <div class="blog-boxes">
                    <div class="thumb-img">
                        <a href="blog-details.php"> <img src="{{ asset('/web/images/B7.png') }}" /></a>
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
            <div class="col-lg-4 col-md-6 col-12">
                <div class="blog-boxes">
                    <div class="thumb-img">
                        <a href="blog-details.php"> <img src="{{ asset('/web/images/B8.png') }}" /></a>
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
            <div class="col-lg-4 col-md-6 col-12">
                <div class="blog-boxes">
                    <div class="thumb-img">
                        <a href="blog-details.php"> <img src="{{ asset('/web/images/B9.png') }}" /></a>
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