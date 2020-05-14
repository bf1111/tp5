<?php 
namespace app\api\controller;

use think\Controller;

class NavProducts extends Controller
{
    public function sendNavProductsApply()
    {
        //判断是否POST提交
        if(!request()->isPost()){
            echo show("2","请求不合法");
            exit;
        }

        //接收数据
        $data = input("post.");
        // dump($data);

        //验证器判断
        //验证器 验证数据
        $validate = validate('NavProducts');
        if (!$validate->scene('add')->check($data)) {
            echo show('2', $validate->getError());
            exit;
        }

        //数据入库
        $res = model("common/NavProducts")->navProductsAdd($data);
        if($res){
            echo show("0","商品添加成功");
            exit;
        }else{
            echo show("2","商品添加失败");
            exit;
        }
    }

    public function alterNavProductsStatus()
    {
        //判断请求方式
        if(!request()->isGet()){
            echo show("2","请求不合法");
            exit;
        }

        //接收数据
        $Id = input('get.id');

        if($Id){
            $res = model('common/NavProducts')->navProductsStatus($Id);
            if($res){
                echo show("0","状态修改成功");
                exit;
            }else{
                echo show("2","状态修改失败");
            }
        }else{
            echo show("2","请求不合法");
        }
    }
}