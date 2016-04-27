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
        //写入session
        if (IS_POST) {
        } else {
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
