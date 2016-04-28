<?php
Vendor('chromephp.ChromePhp');
function show($obj, $flag = 'log')
{
    \ChromePhp::$flag($obj);
}
function is_pjax(){
    return array_key_exists('HTTP_X_PJAX', $_SERVER) && $_SERVER['HTTP_X_PJAX'];
}
