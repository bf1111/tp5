<?php
namespace app\common\model;

use think\Model;

class NavCategory extends Model
{
    /**
     * 获得导航分类数据
     *
     * @return void
     */
    public function getNavCategorys()
    {
        $data = [
            'status' => 1
        ];
        $order = [
            'id' => 'asc'
        ];

        return $this->where($data)->order($order)->select();
    }
}