<?php

namespace app\index\model;

use think\Model;

class User extends Model
{

    protected $autoWriteTimestamp = true;   //开始自动时间戳

    /**
     * 用户注册数据入库
     *
     * @param [type] $data  数据
     * @return void
     */
    public function registerAdd($data)
    {
        $data['status'] = 1;
        $data['update_ip'] = $_SERVER['REMOTE_ADDR'];
        return $this->allowField(true)->save($data);
    }

    /**
     * 判断用户数据是否存在
     *
     * @param [type] $list  字段名
     * @param [type] $data  判断数据
     * @return mixed  int或空
     */
    public function dataExist($list, $data)
    {
        $user = $this->where($list,$data)->find();
        if($user){
            return $user->id;
        }else{
            return "";
        }
    }
}
