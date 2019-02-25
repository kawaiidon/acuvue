@if(!empty($item) and !empty($item->videoId))

<script>
    function videoViews() {
        videoId = '{{$item->videoId}}',
            jsonUrl = 'http://gdata.youtube.com/feeds/api/videos/' + videoId + '?v=2&alt=json',
            embedUrl = '//www.youtube.com/embed/' + videoId,
            embedCode = '<iframe width="350" height="197" src="' + embedUrl + '" frameborder="0" allowfullscreen></iframe>'


//Get Views from JSON
        $.getJSON(jsonUrl, function (videoData) {
            var videoJson = JSON.stringify(videoData),
                vidJson = JSON.parse(videoJson),
                views = vidJson.entry.yt$statistics.viewCount;
            $('.video-views').text(views);
        });

//Embed Video
        $('.videoembed').html(embedCode);
    }
    $(document).on('load', function () {
        videoViews();
    })
</script>
@endif