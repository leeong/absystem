<?php
namespace Common\Controller;
use Think\Controller;

class AdminController extends Controller {

    protected function _initialize()
    {
        $sessionAuth = session(C('AUTH_USER'));
        if (!$sessionAuth) {
            redirect(U('Admin/Default/login'));
        }
        if (is_pjax()) {
            show('is_pjax');
            layout(false);
        } else {
            show('is_not_pjax');
            layout('Layout/admin');
        }
    }

    //todo 是pjax时返回带hidden input 前端通过接受判断进行URL跳转
    public function _empty()
    {
        redirect(U('Admin/Default/error'));
    }

}
