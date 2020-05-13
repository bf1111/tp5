<?php
namespace app\index\controller;

class Index
{
    public function imageShow()
    {
        $data = model("Show")->bgShow(0, $limit = 5);
        echo show("0","",$data);
    }
}
