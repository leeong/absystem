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

    /**
     * 规范Ajax方式返回数据到客户端
     * @access protected
     * @param mixed $data 要返回的数据
     * @param String $type AJAX返回数据格式
     * @param int $json_option 传递给json_encode的option参数
     * @return void
     */
    protected function ajaxReturn($data,$type='',$json_option=0) {
        $data['status'] = $data['status'] ? 1 : 0;
        $data['url'] = $data['url'] ? $data['url'] : '';
        if(empty($type)) $type  =   C('DEFAULT_AJAX_RETURN');
        switch (strtoupper($type)){
            case 'JSON' :
                // 返回JSON数据格式到客户端 包含状态信息
                header('Content-Type:application/json; charset=utf-8');
                exit(json_encode($data,$json_option));
            case 'XML'  :
                // 返回xml格式数据
                header('Content-Type:text/xml; charset=utf-8');
                exit(xml_encode($data));
            case 'JSONP':
                // 返回JSON数据格式到客户端 包含状态信息
                header('Content-Type:application/json; charset=utf-8');
                $handler  =   isset($_GET[C('VAR_JSONP_HANDLER')]) ? $_GET[C('VAR_JSONP_HANDLER')] : C('DEFAULT_JSONP_HANDLER');
                exit($handler.'('.json_encode($data,$json_option).');');
            case 'EVAL' :
                // 返回可执行的js脚本
                header('Content-Type:text/html; charset=utf-8');
                exit($data);
            default     :
                // 用于扩展其他返回格式数据
                Hook::listen('ajax_return',$data);
        }
    }

    // 后台分页
    protected function page($total_size = 1, $page_size = 0) {
        if ($page_size == 0) {
            $page_size = C("PER_PAGE");
        }
        $Page = new \Think\AdminPage($count,$perPage);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show();// 分页显示输出
    }

}
