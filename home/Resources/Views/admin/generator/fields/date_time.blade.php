<?php
$params = ['class' => 'input-sm form-control fg-input date-time-picker date-time-mask text-left'];
if($field->required) $params['required'] = true;
?>
<div class="form-group fg-float">
    <div class="fg-line">
        {!! Form::text($key, !empty($item)? $item->$key->format('d.m.Y H:i') : null, $params) !!}
        <label class="fg-label">{{$field->rus_title}}</label>
    </div>
</div>