<?php

namespace app\common\model;

use think\Model;

class Show extends Model
{
    /**
     * 大图展示
     *
     * @param [type] $position  展示的位置
     * @param [type] $limit  显示的数量
     * @return void
     */
    public function bgShow($position, $limit = 5)
    {
        $data = [
            'list_status' => 1,
            'position' => $position
        ];
        $order = [
            'id' => 'desc'
        ];
        return $this->where($data)->limit($limit)->order($order)->select();
    }
}
