<div class="row">
    <div class="col-sm-4">
        <p class="c-gray m-b-5">{{$field->rus_title}}</p>
        <div class="clearfix"></div>
        <div class="fileinput m-t-5{!! (!empty($item) and $item->$key) ? ' fileinput-exists' : ' fileinput-new' !!}"
             data-provides="fileinput">
            <div class="fileinput-preview thumbnail" style="line-height: 150px;"
                 data-trigger="fileinput">
                @if(!empty($item) and $item->$key)
                    <img src="{!! asset('uploads' . $item->$key)!!}">
                @endif
            </div>
            <div>
                <div class="btn btn-info btn-file">
                    <span class="fileinput-new">Выбрать</span>
                    <span class="fileinput-exists">Изменить</span>
                    {!! Form::file($key, ['class' => 'image-file']) !!}
                    @if(!empty($item) and $item->$key)
                        {!! Form::hidden("$key"."_delete", 0, ['class' => 'image-delete', 'autocomplete' => 'off']) !!}
                    @endif

                </div>
                @if(!empty($item) and $item->$key)
                    <a href="#" class="btn btn-danger fileinput-exists file_delete_btn"
                       data-inputname="{{"$key"."_delete"}}"
                       data-dismiss="fileinput">Удалить</a>
                @endif

            </div>
        </div>
    </div>
</div>