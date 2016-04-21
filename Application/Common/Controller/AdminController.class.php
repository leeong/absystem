<?php
namespace Common\Controller;
use Think\Controller;

class AdminController extends Controller {

    public function _initialize()
    {
        layout('Layout/admin');
    }
}
