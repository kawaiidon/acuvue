@set($menu_items, \PublicMenu::make($menu_slug))
@if(count($menu_items))
    <div class="header__links js-mobile-menu">
        @foreach($menu_items as $item)
            @if($item['hide'])
                @continue
            @endif
            @if($item['item_type'] == 'page_link')
                <a class="header__link big-link @if(\Route::currentRouteName() == 'public.page.'.$item['page']['slug'])active
                       @endif" href="{!! route('public.page.'.$item['page']['slug']) !!}"{!! $item['blank'] ? ' target="_blank"' : '' !!}><span>{{ $item['title'] }}</span></a>
            @elseif($item['item_type'] == 'external_link')
                <a class="{!! !empty($item['css']) ? ' '.$item['css'] : '' !!}" class="header__link big-link" href="{!! $item['link'] !!}"{!! $item['blank'] ? ' target="_blank"' : '' !!}>{{ $item['title'] }}</a>
            @elseif($item['item_type'] == 'anchor_link')
                <a  href="{!! route('public.page.'.$item['page']['slug']) !!}{!! $item['anchor'] !!}"{!! $item['blank'] ? ' target="_blank"' : '' !!}>{{ $item['title'] }}</a>
            @endif
        @endforeach
    </div>
@endif
