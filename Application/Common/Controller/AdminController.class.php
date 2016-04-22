<?php
namespace Common\Controller;
use Think\Controller;

class AdminController extends Controller {

    public function _initialize()
    {
        layout('Layout/admin');
    }

    public function _empty()
    {
        echo "This action does not exist!";
    }
}
