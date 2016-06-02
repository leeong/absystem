<?php
Vendor('chromephp.ChromePhp');

// debug 需安装chrome logger插件 $flag = log/warn/info/error/group/groupEnd
function show($obj, $flag = 'log')
{
    \ChromePhp::$flag($obj);
}
