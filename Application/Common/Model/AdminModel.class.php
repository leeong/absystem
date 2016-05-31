<?php
namespace Common\Model;

use Think\Model\RelationModel;

/**
 *  [冻死迎风站]--[饿死不说么吃饭]
 *  =========================================================================@_@=====================================@_@
 * @desc
 * @author  leeong <9387524@gmail.com>
 * @version 1.0.0
 */
class AdminModel extends RelationModel
{

    protected $_validate = array(
            array('verify','require','验证码必须!'), //默认情况下用正则进行验证
            array('name','','帐号名称已经存在!',0,'unique',1), // 在新增的时候验证name字段是否唯一
            array('value',array(1,2,3),'值的范围不正确!',2,'in'), // 当值不为空的时候判断是否在一个范围内
            array('repassword','password','确认密码不正确',0,'confirm'), // 验证确认密码是否和密码一致
            array('password','checkPwd','密码格式不正确',0,'function'), // 自定义函数验证密码格式
        );

    protected function _initialize()
    {

    }

    //取列表
    public function getList($map = '1=1', $field = '*', $order = 'id')
    {
        // 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
        $list = $this->where($map)->order($order)->page($_GET['p'].','.$perPage)->select();
        $count = $this->where($map)->count();// 查询满足要求的总记录数
        return array(
            'count' => $count,
            'list' => $list,
        );
    }

    //取一条数据
    public function fetchRow($map = '1=1', $field = '*')
    {
        return $this->where($map)
                ->find();
    }

    //取多条数据
    public function fetchAll($map = '1=1', $field = '*', $order = 'id')
    {

    }


}
