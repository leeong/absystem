<?php
namespace Admin\Controller;

use Common\Controller\AdminController as BaseAdminController;

/**
 *  [冻死迎风站]--[饿死不说么吃饭]
 *  =========================================================================@_@=====================================@_@
 * @desc    管理员
 * @author  leeong <9387524@gmail.com>
 * @version 1.0.0
 */
class AdminController extends BaseAdminController
{
    public function index()
    {
        $listData = D('Admin', 'Logic')->getList();
        $this->assign('page', $listData['page'])
            ->assign('Adminlist', $listData['list']);
        $this->display();
    }

}
