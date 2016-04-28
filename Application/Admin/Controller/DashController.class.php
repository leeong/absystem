<?php
namespace Admin\Controller;

use Common\Controller\AdminController;

/**
 *  [冻死迎风站]--[饿死不说么吃饭]
 *  =========================================================================@_@=====================================@_@
 * @desc    仪表盘/操作中心
 * @author  leeong <9387524@gmail.com>
 * @version 1.0.0
 */
class DashController extends AdminController
{

    protected function _initialize()
    {
        parent::_initialize();
    }

    public function index()
    {
        $this->display();
    }
}
