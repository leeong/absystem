<?php
namespace Common\Service;

/**
 *  [冻死迎风站]--[饿死不说么吃饭]
 *  =========================================================================@_@=====================================@_@
 * @desc
 * @author  leeong <9387524@gmail.com>
 * @version 1.0.0
 */
class AdminService
{

    private function _initialize()
    {

    }

    // 获取列表
    public function getList($conditon, $field, $order)
    {

    }

    // 登录验证
    public function verifyForLogin($name, $pwd)
    {
        return D('Admin', 'Logic')->verifyForLogin($name, $pwd);
    }

}
