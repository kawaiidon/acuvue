<?php
$generator_actions = \APPLICATION_HOME\Http\Controllers\AdminGenerator::actions();
$normal_actions = [
    'application' => [
    'title' => ['ru' => 'Acuvue'],
    'enabled' => false,
    'icon' => 'zmdi zmdi-shopping-cart'
    ]
];
return array_merge($generator_actions, $normal_actions);