<?php
namespace Common\Model;

use Common\Model\CommonModel;

/**
 *  [冻死迎风站]--[饿死不说么吃饭]
 *  =========================================================================@_@=====================================@_@
 * @desc
 * @author  leeong <9387524@gmail.com>
 * @version 1.0.0
 */
class AdminModel extends CommonModel
{
    protected $_comment = array(
        'en-us' => array(
            'id' => 'No.',
            'name' => 'Name',
            'email' => 'E-mail',
            'pwd' => 'Password',
            'role_id' => "Role's ID",
            'status' => 'Status',
            'at' => 'Add Time',
            'ut' => 'Update Time',
        ),
        'zh-cn' => array(
            'id' => '序号',
            'name' => '姓名',
            'email' => '邮箱',
            'pwd' => '密码',
            'role_id' => "角色ID",
            'status' => '状态',
            'at' => '添加时间',
            'ut' => '更新时间',
        )
    );

    protected $_validate = array(
            array('verify','require','验证码必须!'), //默认情况下用正则进行验证
            array('name','','帐号名称已经存在!',0,'unique',1), // 在新增的时候验证name字段是否唯一
            array('value',array(1,2,3),'值的范围不正确!',2,'in'), // 当值不为空的时候判断是否在一个范围内
            array('repassword','password','确认密码不正确',0,'confirm'), // 验证确认密码是否和密码一致
            array('password','checkPwd','密码格式不正确',0,'function'), // 自定义函数验证密码格式
        );

    protected function _initialize()
    {
        parent::_initialize();
    }




}
