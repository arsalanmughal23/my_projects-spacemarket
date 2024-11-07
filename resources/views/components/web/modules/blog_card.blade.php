<div class="blog-boxes">
    <div class="thumb-img">
        <a href="{{ route('web.blogs.show', $data?->id ?? 0) }}"> <img src="{{ $data?->image ? $data?->image_link : asset('/web/images/latestblog.png') }}" /></a>
    </div>
    <div class="p20">
        <div class="dateitem">{{ \Carbon\Carbon::parse($data?->updated_at)->format('F d, Y') }}</div>
        <h3><a href="{{ route('web.blogs.show', $data?->id ?? 0) }}" class="text-decoration-none">{!! $data?->title !!}</a></h3>
        {!! $data?->short_description !!}
    </div>
</div>