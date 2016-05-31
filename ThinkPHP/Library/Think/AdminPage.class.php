<?php

namespace Think;

class AdminPage
{
    public $firstRow; // 起始行数
    public $listRows; // 列表每页显示行数
    public $parameter; // 分页跳转时要带的参数
    public $totalRows; // 总行数
    public $totalPages; // 分页总页面数
    public $rollPage = 5;// 分页栏每页显示的页数

    private $p = 'p'; //分页参数名
    private $url = ''; //当前链接URL
    private $nowPage = 1;

    /**
     * 架构函数
     * @param array $totalRows 总的记录数
     * @param array $listRows 每页显示记录数
     * @param array $parameter 分页跳转的参数
     */
    public function __construct($totalRows, $listRows = 20, $parameter = array())
    {
        C('VAR_PAGE') && $this->p = C('VAR_PAGE'); //设置分页参数名称
        /* 基础设置 */
        $this->totalRows = $totalRows; //设置总记录数
        $this->listRows = $listRows;  //设置每页显示行数
        $this->parameter = empty($parameter) ? $_GET : $parameter;
        $this->nowPage = empty($_GET[$this->p]) ? 1 : intval($_GET[$this->p]);
        $this->nowPage = $this->nowPage > 0 ? $this->nowPage : 1;
        $this->firstRow = $this->listRows * ($this->nowPage - 1);
    }

    /**
     * 生成链接URL
     * @param  integer $page 页码
     * @return string
     */
    private function url($page)
    {
        return str_replace(urlencode('[PAGE]'), $page, $this->url);
    }

    /**
     * 组装分页链接
     * @return string
     */
    public function show()
    {
        if (0 == $this->totalRows) return '';

        /* 生成URL */
        $this->parameter[$this->p] = '[PAGE]';
        unset($this->parameter['_pjax']);
        $this->url = U(ACTION_NAME, $this->parameter);
        /* 计算分页信息 */
        $this->totalPages = ceil($this->totalRows / $this->listRows); //总页数
        if (!empty($this->totalPages) && $this->nowPage > $this->totalPages) {
            $this->nowPage = $this->totalPages;
        }

        /* 计算分页临时变量 */
        $now_cool_page = $this->rollPage / 2;
        $now_cool_page_ceil = ceil($now_cool_page);

        // up_page(上一页)  the_first(第一页)
        if ($this->nowPage - $now_cool_page_ceil <= 0 ) {
            $up_page = '<li class="disabled"><a>' . L('_PREV_') . '</a></li>';
            $the_first = '<li class="disabled"><a>' . L('_FIRST_') . '</a></li>';
        } else {
            $up_page = '<li><a data-pjax href="' . $this->url($this->nowPage - $now_cool_page_ceil) . '">' . L('_PREV_') . '</a></li>';
            $the_first = '<li><a data-pjax href="' . $this->url(1) . '">' . L('_FIRST_') . '</a></li>';
        }

        // down_page(下一页)  the_end(最后一页)
        if ($this->nowPage + $now_cool_page_ceil > $this->totalPages) {
            $down_page = '<li class="disabled"><a>' . L('_NEXT_') . '</a></li>';
            $the_end = '<li class="disabled"><a data-pjax class="tip-bottom" data-original-title="total:' . $this->totalPages . ' rows ' . $this->totalRows . ' page">' . L('_LAST_') . '</a></li>';
        } else {
            $down_page = '<li><a data-pjax href="' . $this->url($this->nowPage + $now_cool_page_ceil) . '">' . L('_NEXT_') . '</a></li>';
            $the_end = '<li><a data-pjax href="' . $this->url($this->totalPages) . '"  class="tip-bottom" data-original-title="total:' . $this->totalPages . ' rows ' . $this->totalRows . ' page">' . L('_LAST_') . '</a></li>';
        }

        // the_total(统计)
        $the_total = '<li class="disabled"><a>'.L('_TOTAL_').' '.$this->totalRows.' '.L('_ENTRY_').' '.$this->nowPage.'/'.$this->totalPages.'</a></li>';

        //数字连接
        $link_page = "";
        for ($i = 1; $i <= $this->rollPage; $i++) {
            if (($this->nowPage - $now_cool_page) <= 0) {
                $page = $i;
            } elseif (($this->nowPage + $now_cool_page - 1) >= $this->totalPages) {
                $page = $this->totalPages - $this->rollPage + $i;
            } else {
                $page = $this->nowPage - $now_cool_page_ceil + $i;
            }
            if ($page > 0 && $page != $this->nowPage) {

                if ($page <= $this->totalPages) {
                    $link_page .= '<li><a data-pjax href="' . $this->url($page) . '">' . $page . '</a></li>';
                } else {
                    break;
                }
            } else {
                if ($page > 0 && $this->totalPages != 1) {
                    $link_page .= '<li class="active"><a>' . $page . '</a></li>';
                }
            }
        }
        $link_page || $link_page = '<li class="active"><a>'. $this->nowPage . '</a><li>';

        return "<div class='pagination alternate pull-right' style='margin:5px 25px 0 0'><ul>{$the_total}{$the_first}{$up_page}{$link_page}{$down_page}{$the_end}</ul></div>";
    }
}
