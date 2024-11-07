<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:', [ 'class' => 'required' ]) !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required', 'maxlength' => config('constants.character_limits.main_title')]) !!}
</div>

<!-- Thumbnail Field -->
<div class="form-group col-sm-12 col-lg-12 d-none">
    <label for="video_key">Video Key</label>
    <input type="text" class="form-control" name="video_key">

    <label for="thumbnail">Thumbnail</label>
    <input type="text" class="form-control" name="thumbnail">
    
    <label for="embed_url">Embed Url</label>
    <input type="text" class="form-control" name="embed_url">    
</div>

<!-- Video Link Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('video_link', 'Video Link:', [ 'class' => 'required' ]) !!}
    {!! Form::url('video_link', null, ['class' => 'form-control', 'required' => 'required' ]) !!}
</div>

@push('page_scripts')
<script>
    $('form#learningVideosForm').submit((e) => {
        const url = $('#video_link').val();

        const getYouTubeVideoId = (url) => {
            const regex = /^(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/;
            const match = url.match(regex);
            return match ? match[1] : null;
        };

        const videoId = getYouTubeVideoId(url);

        if (!videoId) {
            e.preventDefault(); // Prevent form submission if URL is invalid
            alert('Please enter a valid YouTube URL.');
        } else {
            $('input[name=video_key]').val(videoId);
            $('input[name=embed_url]').val(`https://www.youtube.com/embed/${videoId}`);
            $('input[name=thumbnail]').val(`https://img.youtube.com/vi/${videoId}/maxresdefault.jpg`);
            // console.log(videoId);  // Output the video ID if URL is valid
        }
    });
</script>
@endpush