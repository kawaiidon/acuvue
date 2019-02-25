@extends("core_system_views::layouts.$current_layout")
@section('title', trans('core_system_lang::dashboard.control_panel'))
@section('breadcrumb')
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}">
                <i class="zmdi zmdi-view-dashboard"></i> @lang('core_system_lang::system.dashboard')
            </a>
        </li>
        <li class="active">
            <i class="{{ config('solutions_news::menu.icon') }}"></i> {{$class::$rus_title}}
        </li>
    </ol>
@stop
@section('content')
    <div class="block-header">
        <h2>
            <i class="{{ config('solutions_news::menu.icon') }}"></i>
            {{$class::$rus_title}}
        </h2>
    </div>
    @if($class::$can_create)
        @if(!empty($parent_type))
            @BtnAdd('admin.generator.related_create', [$parent_type, $parent_id, $type])
        @else
            @BtnAdd('admin.generator.create', $type)
        @endif
    @endif

    <div class="card">
        <div class="list-group lg-odd-black">
            <div class="action-header clearfix">
                <div class="ah-label hidden-xs">
                    Список: {{$class::$rus_title}}
                </div>
                @if($items->count())
                    {!! Form::open(['route' => ['admin.generator.index', $type], 'method' => 'get']) !!}
                    <div class="ah-search">
                        <input type="text" name="search" placeholder="Поиск по заголовку" class="ahs-input">
                        <i class="ahs-close" data-ma-action="action-header-close">&times;</i>
                    </div>
                    {!! Form::close() !!}
                    <ul class="actions">
                        <li>
                            <a href="" data-ma-action="action-header-open">
                                <i class="zmdi zmdi-search"></i>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                                <i class="zmdi zmdi-sort-amount-asc"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right z-index-max">
                                <li>
                                    <a href="{{ route('admin.generator.index', array_merge(Request::all(), ['sort_field' => 'title', 'sort_direction' => 'asc'])) }}">
                                        По заголовку
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.generator.index', array_merge(Request::all(), ['sort_field' => 'created_at', 'sort_direction' => 'asc'])) }}">
                                        По дате создния
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.generator.index', array_merge(Request::all(), ['sort_field' => 'updated_at', 'sort_direction' => 'asc'])) }}">
                                        По дате последнего обновления
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                                <i class="zmdi zmdi-sort-amount-desc"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a href="{{ route('admin.generator.index', array_merge(Request::all(), ['sort_field' => 'title', 'sort_direction' => 'desc'])) }}">
                                        По заголовку
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.generator.index', array_merge(Request::all(), ['sort_field' => 'created_at', 'sort_direction' => 'desc'])) }}">
                                        По дате создния
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.generator.index', array_merge(Request::all(), ['sort_field' => 'updated_at', 'sort_direction' => 'desc'])) }}">
                                        По дате последнего обновления
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                @endif
            </div>
            <div class="card-body card-padding m-h-250 p-0">
                @forelse($items as $item)
                    <div class="js-item-container list-group-item media">

                        @if($class::$image_field and $item->{$class::$image_field} and \Storage::exists($item->{$class::$image_field}))
                            <div class="pull-left clearfix">
                                <img alt="{{ $item->title }}" class="lgi-img"
                                     src="{{ asset('uploads/' . $item->{$class::$image_field}) }}">
                            </div>
                        @endif
                        <div class="pull-right">
                            <div class="actions dropdown">
                                <a aria-expanded="true" data-toggle="dropdown" href="">
                                    <i class="zmdi zmdi-more-vert"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a href="{{ route('admin.generator.edit', ['type' => $type,'id' =>$item->id]) }}">Изменить</a>
                                    </li>
                                    {{--@if($news_single->publication)
                                        <li>
                                            <a href="{{ route('public.news.show', $news_single->PageUrl) }}"
                                               target="_blank">
                                                @lang('solutions_news_lang::news.blank')
                                            </a>
                                        </li>
                                    @endif--}}
                                    <li class="divider"></li>
                                    @if($class::$can_delete)
                                    <li>
                                        <a class="c-red js-item-remove" href="">
                                            Удалить
                                        </a>
                                        {!! Form::open(['route' => ['admin.generator.destroy', $type, $item->id], 'method' => 'DELETE', 'class' => 'hidden']) !!}
                                        <button type="submit"
                                                data-question="Удалить &laquo;{{ $item->title }}&raquo;?"
                                                data-confirmbuttontext="Да"
                                                data-cancelbuttontext="Отмена">
                                        </button>
                                        {!! Form::close() !!}
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="media-body">
                            <div class="lgi-heading">{{ $item->title_field() }}</div>
                            @if(!empty($item->description))
                                <small class="c-grey f-10">
                                    {{ $item->description }}
                                </small>
                            @endif
                        </div>
                    </div>
                @empty
                    <h2 class="f-16 c-gray m-l-30">Список пуст</h2>
                @endforelse
            </div>
            <div class="lg-pagination p-10">
                {!! $items->appends(\Request::only(['search', 'sort_field', 'sort_direction']))->render() !!}
            </div>

        </div>
    </div>
@stop