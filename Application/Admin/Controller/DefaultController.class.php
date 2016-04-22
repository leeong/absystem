<?php
namespace Admin\Controller;

use Common\Controller\AdminController;

/**
 * @desc    默认控制器
 * @author  leeong<9387524@gmail.com>
 */
class DefaultController extends AdminController {

    public function _initialize()
    {
        parent::_initialize();
    }

    /**
     *  @desc   登录
     *  @author leeong <9387524@gmail.com>
     */
    public function login()
    {
        echo "this is login page!";
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


}
