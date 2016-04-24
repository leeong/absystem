<?php
namespace Common\Controller;
use Think\Controller;

class AdminController extends Controller {

    public function _initialize()
    {
        $sessionAuthUserId = session(C('AUTH_USER_COLUMN'));
        if (!$sessionAuthUserId) {
            redirect(U('Admin/Default/login'));
        }
        layout('Layout/admin');
    }

    public function _empty()
    {
        echo "This action does not exist!";
    }
}
