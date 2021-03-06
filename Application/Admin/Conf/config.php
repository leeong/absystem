<?php
return array(
	//'配置项'=>'配置值'
    'AUTH_USER'         =>  'admin',
    'AUTH_USER_COLUMN'  =>  'admin.id',

    'PER_PAGE'          =>  '5',
    //auth 配置
    'AUTH_CONFIG'       =>  array(
        'AUTH_GROUP'        =>  'auth_group',           //用户组数据表名
        'AUTH_GROUP_ACCESS' =>  'auth_group_access',    //用户-用户组关系表
        'AUTH_RULE'         =>  'auth_rule',            //权限规则表
        'AUTH_USER'         =>  'admin',                //用户信息表
        'AUTH_ON'           =>  false,                  //关闭验证
    ),
    'LAYOUT_TEMPLATE'       => 'Layout/admin',
);
