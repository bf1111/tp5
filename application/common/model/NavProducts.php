<?php

namespace app\common\model;

use think\Model;

class NavProducts extends Model
{
    /**
     * 首页导航商品数据
     *
     * @param [type] $id  类别id
     * @return void
     */
    public function getNavProducts($id, $limit = 6)
    {
        $data = [
            'status' => 1,
            'category_id' => $id
        ];
        $order = [
            "id" => "desc"
        ];
        return $this->where($data)->limit($limit)->order($order)->select();
    }


    /**
     * 导航商品添加
     *
     * @param [type] $data
     * @return void
     */
    public function navProductsAdd($data)
    {
        $data["ctime"] = time();
        return $this->allowField(true)->save($data);
    }


    public function navProductsStatus($id)
    {
        return $this->allowField(true)->save(["status" => 1], ["id" => $id]);
    }
}
