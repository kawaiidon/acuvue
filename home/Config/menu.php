<?php
$admin_menu = APPLICATION_HOME\Http\Controllers\AdminGenerator::menu();
$normal_menu = [];
//dd(array_merge($admin_menu, $normal_menu));
return ( [
    'package' => 'application',
    'title' => ['ru' => 'Acuvue'],
    'route' => '__#',
    'icon' => 'zmdi zmdi-drink',
    'menu_child' => array_merge($admin_menu, $normal_menu)

]);