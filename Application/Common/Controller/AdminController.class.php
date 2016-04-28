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
        layout('Layout/admin');
    }

    public function _empty()
    {
        echo "This action does not exist!";
    }
}
