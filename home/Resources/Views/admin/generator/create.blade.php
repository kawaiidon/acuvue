@extends("core_system_views::layouts.$current_layout")
@section('title', trans('core_system_lang::dashboard.control_panel'))
@section('breadcrumb')
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}">
                <i class="zmdi zmdi-view-dashboard"></i> @lang('core_system_lang::system.dashboard')
            </a>
        </li>
        <li>
            <a href="{{ route('admin.generator.index', $type) }}">
                <i class="{{ config('solutions_news::menu.icon') }}"></i> {{$class::$rus_title}}
            </a>
        </li>
    </ol>
@stop
@section('content')
    <div class="block-header">
        <h2><i class="zmdi zmdi-plus"></i> Новый объект: {{$class::$rus_title}}</h2>
    </div>
    <div class="card">
        <div class="card-body card-padding">
            <div class="row">
                {!! Form::open(['route' => ['admin.generator.store', $type], 'class' => 'form-validate', 'files' => TRUE]) !!}
                <div class="col-sm-9">
                    @foreach($fields->where('column', 'left')->all() as $key=>$field)
                        @include("admin.generator.fields.$field->type", compact('field', 'key'))
                    @endforeach

                    @if(!empty($class::$custom_templates) and !empty($class::$custom_templates['left']))
                            @foreach($class::$custom_templates['left'] as $custom_template)
                                @include('admin.generator.custom.'.$custom_template, compact('item', 'class'))
                            @endforeach
                    @endif
                </div>
                <div class="col-sm-3">
                    @foreach($fields->where('column', 'right')->all() as $key=>$field)
                        @include("admin.generator.fields.$field->type", compact('field', 'key'))
                    @endforeach
                    <button type="submit" autocomplete="off" class="btn btn-primary btn-sm m-t-10 waves-effect">
                        <i class="fa fa-save"></i>
                        <span class="btn-text">Сохранить</span>
                    </button>
                </div>

                @if(!empty($class::$custom_templates) and !empty($class::$custom_templates['right']))
                    @foreach($class::$custom_templates['right'] as $custom_template)
                        @include('admin.generator.custom.'.$custom_template, compact('item', 'class'))
                    @endforeach
                @endif
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
@section('scripts_after')
    @set($summernote_locale, \App::getLocale() . '-' . strtoupper(\App::getLocale()))
    {!! Html::script('core/summernote/summernote-' . $summernote_locale . '.js') !!}
    <script>

        $(".redactor").summernote({
            height: 250,
            tabsize: 2,
            lang: '{{ $summernote_locale }}',
            toolbar: [
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontsize', ['fontsize']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['table', ['table']],
                ['insert', ['link', 'picture']],
                ['view', ['fullscreen', 'codeview']],
            ]
        });
        $('.redactor').on('summernote.change', function (we, contents, $editable) {
            $(".redactor").html(contents);
            $(".redactor").change();
        });
        var form = $(".form-validate");
        BASIC.currentForm = form;
        BASIC.validateOptions.rules = {title: {required: true}};
        BASIC.validateOptions.messages = VALIDATION_MESSAGES.defaulRules;
        $(BASIC.currentForm).validate(BASIC.validateOptions);

    </script>
    @includeIf('generator.custom.'.$type.'_script')
@stop
