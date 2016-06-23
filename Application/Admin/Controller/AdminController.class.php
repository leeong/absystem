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
        $adminModel = D('Admin', 'Model');
        $listData =$adminModel->getList();
        $tableDom = $this->fetch("Common/table");
        $page = $this->page($adminModel->getParam('count'));
        $this->assign('tableDom', $tableDom)
            ->assign('page', $page);
        $this->display();
    }
}
