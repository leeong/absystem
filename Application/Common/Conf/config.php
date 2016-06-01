<?php
return array(
	//'配置项'=>'配置值'
    // 'DEFAULT_MODULE' => 'Admin',//默认模块
    'URL_MODEL' => '2',//URL类型
    'SESSION_AUTO_START' => 'true',//开启SESSION
    'LOAD_EXT_CONFIG' => 'db',//扩展配置
    'MODULE_DENY_LIST' => array('Common','Runtime'),//禁止访问模块
    'MODULE_ALLOW_LIST' => array('Home','Admin'),//允许访问模块

    //M三层 Service服务层 Logic逻辑层 Model数据层
    'DEFAULT_M_LAYER' => 'Model',//默认model层

    //分页参数名
    'VAR_PAGE' => 'p',
    //设置查询结果总条目参数
    'VAR_COUNT' => 'count',
    //session 处理
    'SESSION_TYPE'=>'Mysqli',

    'SESSION_OPTIONS'         =>  array(
            'name'                =>  'ABSSESSION',      //设置session名
            'expire'              =>  24*3600,           //SESSION保存1天
            'use_trans_sid'       =>  1,                 //跨页传递
            'use_only_cookies'    =>  0,                 //是否只开启基于cookies的session的会话方式
        ),

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
