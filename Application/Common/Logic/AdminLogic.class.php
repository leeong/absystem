<?php
namespace Common\Logic;

/**
 *  [冻死迎风站]--[饿死不说么吃饭]
 *  =========================================================================@_@=====================================@_@
 * @desc
 * @author  leeong <9387524@gmail.com>
 * @version 1.0.0
 */
class AdminLogic
{

    private function _initialize()
    {

    }

    public function verifyForLogin($name, $pwd)
    {
        $return = array(
            'status' => 0,
            'info' => L('_ACTION_ERROR_'),
        );
        $condition['name'] = $name;
        $adminRow = D('Admin', 'Model')->fetchRow($condition);
        if (!$adminRow) {
            $return['info'] = L('_NAME_NOT_EXIST_');
            return $return;
        }
        if ($adminRow['pwd'] !== $this->encrypt($pwd)) {
            $return['info'] = L('_PASSWORD_ERROR_');
            return $return;
        }
        session(C('AUTH_USER'), $adminRow);
        $return['status'] = 1;
        $return['info'] = L('_VERIFY_SUCCESS_');
        return $return;
    }

    public function encrypt($basePwd)
    {
        return md5($basePwd);
    }
}
