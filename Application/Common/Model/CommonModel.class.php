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
    protected function _initialize()
    {

    }

    public function getList($map = '1=1', $field = '*', $order = 'id')
    {
        $this->__set(C('VAR_COUNT'),  $this->where($map)->count());// 记录满足要求的总记录数
        return $this
            ->where($map)
            ->order($order)
            ->page($_GET[C('VAR_PAGE')] ? $_GET[C('VAR_PAGE')] : 1 . ',' . C('PER_PAGE'))
            ->select();
    }

    //取一条数据
    public function fetchRow($map = '1=1', $field = '*')
    {
        return $this->where($map)
                ->find();
    }

    //取多条数据
    public function fetchAll($map = '1=1', $field = '*', $order = 'id')
    {

    }
}
