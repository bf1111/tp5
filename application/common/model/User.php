<?php
namespace app\common\model;

use think\Model;

class User extends Model
{

    /**
     * 通过id更新用户信息
     *
     * @param [type] $data  更新的数据
     * @param [type] $id    更新用户id
     * @return void
     */
    public function updateById($data,$id)
    {
        //allowField(true) 过滤表中不存在的字段
        return $this->allowField(true)->save($data,['id'=>$id]);
    }
}
