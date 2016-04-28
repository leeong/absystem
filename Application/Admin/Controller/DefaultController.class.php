<?php
namespace Admin\Controller;

use Think\Controller;

/**
 *  [冻死迎风站]--[饿死不说么吃饭]
 *  =========================================================================@_@=====================================@_@
 * @desc    登录注册控制器
 * @author  leeong <9387524@gmail.com>
 * @version 1.0.0
 */
class DefaultController extends Controller
{

    public function _initialize()
    {
        layout(false);
    }

    // 登录
    public function login()
    {
        if (IS_POST) {
            $arr = I("post.");
            $result = D('Admin', 'Service')->verifyForLogin($arr['name'], $arr['pwd']);
            if ($result['status']) {
                $this->success($result['info'], U("Admin/Dash/index"));
            } else {
                $this->error($result['info']);
            }
        }
        $this->display();
    }

    // 注销
    public function logout()
    {
        session(null);
        redirect(U("Admin/Default/login"));
    }

    // 注册
    public function reg()
    {
        echo "this is reg page!";
    }

    // 空操作
    public function _empty()
    {
        redirect(U("Admin/Default/login"));
    }

}
