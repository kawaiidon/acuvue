@if(!empty($item))
    <br><br>

    <dl class="dl-horizontal sortable">
        <dt>
            Кол-во проголосовавших:
        </dt>
        <dd>
            {{$item->voices->count()}}
        </dd>
    </dl>
    @if(!empty($item->videoId))
        <dl class="dl-horizontal sortable">
            <dt>
                Кол-во просмотров:
            </dt>
            <dd id="video-views">
                {{$item->views}}
            </dd>
        </dl>
        <div class="videoembed"><iframe width="100%" src="{{'//www.youtube.com/embed/' . $item->videoId}}" frameborder="0" allowfullscreen></iframe></div>
    @endif
@endif