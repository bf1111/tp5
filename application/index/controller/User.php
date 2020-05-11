<?php
namespace app\index\controller;

use think\Controller;

class User extends Controller
{
    public function show($status,$msg="",$data=[])
    {
        return [
            'status' => $status,
            'msg' => $msg,
            'data' => $data
        ];
    }
    public function registerCheck()
    {
        if(!request()->isPost()){
            echo json_encode($this->show('0',"请求不合法"));
        }else{
            echo json_encode($this->show("1","请求合法"));
        }
    }
}