<?php
Vendor('chromephp.ChromePhp');
function show($obj, $flag = 'log')
{
    \ChromePhp::$flag($obj);
}
