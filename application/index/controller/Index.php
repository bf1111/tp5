<?php
namespace app\index\controller;

class Index
{

    /**
     * 轮播图数据显示
     *
     * @return void
     */
    public function imageShow()
    {
        $data = model("common/Show")->bgShow(0, $limit = 5);
        echo show("0","",$data);
    }

    /**
     * 导航栏信息显示
     *
     * @return void
     */
    public function showNavCategory()
    {
        $data = model("common/NavCategory")->getNavCategorys();
        if($data){
            echo show(0,"",$data);
        }else{
            echo show(2,"数据不合法");
        }
    }

    /**
     * 首页导航商品显示
     *
     * @return void
     */
    public function showNavProducts()
    {
        if(!request()->isGet()){
            echo show("2","请求不合法");
            exit;
        }
        //接收get数据
        $getId = input("get.id");
        if($getId){
            $data = model("NavProducts")->getNavProducts($getId);
            echo show("0","",$data);
        }else{
            echo show("0","请求不合法");
        }
    }
}
