<?php
namespace Common\Model;

use Think\Model;

/**
 *  [冻死迎风站]--[饿死不说么吃饭]
 *  =========================================================================@_@=====================================@_@
 * @desc
 * @author  leeong <9387524@gmail.com>
 * @version 1.0.0
 */
class CommonModel extends Model
{
    protected $fields = array();
    protected $count = 0;

    protected function _initialize()
    {
        $this->fields = parent::$fields;
    }

    //获取参数
    public function getParam($name)
    {
        return isset($this->$name) ? $this->$name : null;
    }

    public function getList($map = '1=1', $field = '*', $order = 'id', $flag = 1)
    {
        // 记录满足要求的总记录数 分页用
        $this->count = $this->where($map)->count();
        // 处理field参数 并加载用户配置
        $field = $this->_fieldPro($field, $flag);
        $order = $this->_orderPro($order, $flag);
        $list = $this
            ->field($field)
            ->where($map)
            ->order($order)
            ->page($_GET[C('VAR_PAGE')] ? $_GET[C('VAR_PAGE')] : 1 . ',' . C('PER_PAGE'))
            ->select();
        return $list;
    }

    // 重新定义field 显示的field存储于数据库
    private function _fieldPro($field = '*', $flag = 1)
    {
        $map['admin_id'] = session(C('AUTH_USER_COLUMN'));
        $map['type'] = 1;
        $map['option_key'] = MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME;
        $row = D('Option', 'Model')->fetchRow($map, array('option_val'));
        if (!$row) {
            return $field == '*' ? $this->fields : $field;
        }


    }

    // 重新定义order order存储于cookies
    private function _orderPro($order = 'id', $flag = 1)
    {

    }

    //取一条数据
    public function fetchRow($map = '1=1', $field = '*')
    {
        return $this->field($field)
                ->where($map)
                ->find();
    }

    //取多条数据
    public function fetchAll($map = '1=1', $field = '*', $order = 'id')
    {

    }
}
