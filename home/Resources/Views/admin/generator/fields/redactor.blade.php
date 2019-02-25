<div class="form-group">
    <p class="c-gray m-b-20">{{$field->rus_title}}</p>
    {!! Form::textarea($key, !empty($item)? $item->$key : null, ['class' => 'redactor']) !!}
</div>