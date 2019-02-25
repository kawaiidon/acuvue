<div class="form-group">
    <div class="checkbox">
        <label>
            {!! Form::checkbox($key, TRUE, !empty($item)? $item->$key : FALSE, ['autocomplete' => 'off']) !!}
            <i class="input-helper"></i> {{$field->rus_title}}
        </label>
    </div>
</div>