<?php
return array(
	//'配置项'=>'配置值'
    'DEFAULT_MODULE' => 'Admin',//默认模块
    'URL_MODEL' => '2',//URL类型
    'SESSION_AUTO_START' => 'true',//开启SESSION
    'LOAD_EXT_CONFIG' => 'db',//扩展配置
    'MODULE_DENY_LIST' => array('Common','Runtime'),//禁止访问模块
    'MODULE_ALLOW_LIST' => array('Home','Admin'),//允许访问模块

    //M三层 Service服务层 Logic逻辑层 Model数据层
    'DEFAULT_M_LAYER' => 'Service',//默认model层
);
