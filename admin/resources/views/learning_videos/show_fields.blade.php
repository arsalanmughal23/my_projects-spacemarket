<!-- Title Field -->
<div class="col-sm-12">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $learningVideo->title }}</p>
</div>

<!-- Thumbnail Field -->
<div class="col-sm-12">
    {!! Form::label('thumbnail', 'Thumbnail:') !!}
    <a href="{{ $learningVideo->thumbnail }}" target="_blank">Thumbnail</a>
    <!-- <img src="{{ $learningVideo->thumbnail }}" alt="" width="200"> -->
</div>

<!-- Video Link Field -->
<div class="col-sm-12">
    {!! Form::label('video_link', 'Video Link:') !!}
    <a href="{{ $learningVideo->video_link }}" target="_blank">Video Link</a>
</div>

<!-- Embed Url Field -->
<div class="col-sm-12">
    {!! Form::label('embed_url', 'Embed Url:') !!}
    <a href="{{ $learningVideo->embed_url }}" target="_blank">Embed Url</a>
</div>

