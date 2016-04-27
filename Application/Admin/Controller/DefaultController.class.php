<?php
namespace Admin\Controller;

use Think\Controller;

/**
 * @desc    默认控制器
 * @access  private
 * @param   string  $param
 * @return  array   $array
 * @author  leeong <9387524@gmail.com>
 */
class DefaultController extends Controller
{

    public function _initialize()
    {
        layout(false);
    }

    /**
     *  @desc   登录
     *  @author leeong <9387524@gmail.com>
     */
    public function login()
    {
        if (IS_POST) {
            $arr = I("post.");
            $result = D('admin', 'Service')->verifyForLogin($arr['name'], $arr['pwd']);
            if ($result['status']) {
                $this->success($result['info'], U("Admin/Index/index"));
            } else {
                $this->error($result['info'], U("Admin/Default/login"));
            }
        }
        $this->display();
    }

    /**
     *  @desc   注销
     *  @author leeong <9387524@gmail.com>
     */
    public function logout()
    {
        echo "this is logout page!";
    }

    /**
     *  @desc   注册
     *  @author leeong <9387524@gmail.com>
     */
    public function reg()
    {
        echo "this is reg page!";
    }

    /**
     *  @desc 空操作
     */
    public function _empty()
    {
        redirect(U("Admin/Default/login"));
    }

}
