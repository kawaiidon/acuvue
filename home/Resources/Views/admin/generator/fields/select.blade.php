<?php
$select_key = $key;
$data = null;
if(!empty($item)) {
    $data = $item->$key;
}
$params = ['class' => 'selectpicker', 'autocomplete' => 'off',
    'data-live-search'=>true];
if($field->multiple){
    $select_key.='[]';
    if(!empty($item)) $data = $item->$key()->pluck('id')->toArray();
    $params['multiple'] = true;
}
if(!empty($item)) {
    if(!empty($field->disable_on_update) and $field->disable_on_update){
        $params['disabled'] = 'disabled';
    }
}
?>
<div class="form-group">
    <label class="fg-label">{{$field->rus_title}}</label>
    {!! Form::select($select_key, $field->source, $data, $params
     ) !!}
</div>