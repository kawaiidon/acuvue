<?php
$params = ['class' => 'form-control auto-size fg-input', 'data-autosize-on' => 'true', 'rows' => 3];
if($field->required) $params['required'] = true;
?>
<div class="form-group fg-float">
    <div class="fg-line">
        {!! Form::textarea($key, !empty($item)? $item->$key : null, $params) !!}
        <label class="fg-label">{{$field->rus_title}}</label>
    </div>
</div>