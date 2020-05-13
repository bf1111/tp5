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
        echo show(0,"",$data);
    }
}
