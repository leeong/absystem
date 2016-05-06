<?php
namespace Common\Controller;

use Think\Controller;
use Think\Access;

class AdminController extends Controller {

    protected function _initialize()
    {
        $sessionAuth = session(C('AUTH_USER'));
        if (!$sessionAuth) {
            redirect(U('Admin/Default/login'));
        }

        // 权限判断
        $auth = new Access();
        if(!$auth->check(MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME, session(C('AUTH_USER_COLUMN')))){
            $this->error('你没有权限',U('Admin/Dash/index'));
        }


        if (array_key_exists('HTTP_X_PJAX', $_SERVER) && $_SERVER['HTTP_X_PJAX']) {
            // show('is_pjax');
            layout(false);
        } else {
            // show('is_not_pjax');
            // todo 加载菜单项

            $menuTotal = $auth->getMenu(session(C('AUTH_USER_COLUMN')));
            $menuModule = current($menuTotal);
            $this->assign('menuModule', $menuModule)
                ->assign('menuAction', $menuTotal);
            layout('Layout/admin');
        }
    }

    //todo 是pjax时返回带hidden input 前端通过接受判断进行URL跳转
    public function _empty()
    {
        redirect(U('Admin/Default/error'));
    }

}
