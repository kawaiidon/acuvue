<?php
$params = ['class'=>'input-sm form-control fg-input'];
if($field->required) $params['required'] = true;
?>

<div class="form-group fg-float">
    <div class="fg-line">
        {!! Form::text($key, !empty($item)? $item->$key : null, $params) !!}
        <label class="fg-label">{{$field->rus_title}}</label>
    </div>
</div>