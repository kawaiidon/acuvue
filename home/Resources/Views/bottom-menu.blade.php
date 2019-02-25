@set($menu_items, \PublicMenu::make($menu_slug))
@if(count($menu_items))
    <ul>
        @foreach($menu_items as $item)
            @if($item['hide'])
                @continue
            @endif
            <li class="{!! !empty($item['css']) ? ' '.$item['css'] : '' !!}">
                @if($item['item_type'] == 'page_link')
                    <a href="{!! route('public.page.'.$item['page']['slug']) !!}"{!! $item['blank'] ? ' target="_blank"' : '' !!}>{{ $item['title'] }}</a>
                @elseif($item['item_type'] == 'external_link')
                    <a href="{!! $item['link'] !!}"{!! $item['blank'] ? ' target="_blank"' : '' !!}>{{ $item['title'] }}</a>
                @elseif($item['item_type'] == 'anchor_link')
                    <a href="{!! route('public.page.'.$item['page']['slug']) !!}{!! $item['anchor'] !!}"{!! $item['blank'] ? ' target="_blank"' : '' !!}>{{ $item['title'] }}</a>
                @endif
            </li>
        @endforeach
    </ul>
@endif