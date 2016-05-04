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
    'DEFAULT_M_LAYER' => 'Model',//默认model层

    //session 处理
    'SESSION_TYPE'=>'Mysqli',

    //多语言配置
    'LANG_SWITCH_ON' => true, // 开启语言包功能
    'DEFAULT_LANG' => 'en-us',
    'LANG_LIST' => 'zh-cn，en-us', // 允许切换的语言列表 用逗号分隔
    'VAR_LANGUAGE' => 'l', // 默认语言切换变量

    //开启路由
    'URL_ROUTER_ON' => true,
    'URL_ROUTE_RULES'=>array(
        'news/:year/:month/:day' => array('News/archive', 'status=1'),
        'news/:id\d' => 'Admin/Index/index',
        'news/read/:id\d' => 'Admin/Index/test',
        ),
);
