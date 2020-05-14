<?php
namespace app\common\model;

use think\Model;

class Category extends Model
{
    public function getFirstCategorys($limit = 10)
    {
        $data = [
            "parent_id" => 0,
            "list_status" => 1
        ];
        $order = [
            "id" => "desc"
        ];
        return $this->where($data)->order($order)->limit($limit)->select();
    }
}