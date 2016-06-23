<?php
Vendor('chromephp.ChromePhp');

// debug 需安装chrome logger插件 $flag = log/warn/info/error/group/groupEnd
function show($obj, $flag = 'log')
{
    \ChromePhp::$flag($obj);
}

function layoutAdmin($flag) {
    if ($flag) {
        C('LAYOUT_ON',true);
        C('LAYOUT_NAME', C('LAYOUT_TEMPLATE'));
    } else {
        C('LAYOUT_ON',false);
    }
}
