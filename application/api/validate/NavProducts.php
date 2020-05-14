<?php
namespace app\api\validate;

use think\Validate;

class NavProducts extends Validate
{
    //验证的数据
    protected $rule = [
        "category_id" => [   //分类id
            "require" //必填
        ],
        "product_name" => [
            "require"
        ],
        "price" => [
            "require"
        ],
        "image_url" => [
            "require"
        ]
    ];

    //自定义错误提示
    protected $message = [
        'category_id.require' => "请选择所属分类",
        'product_name.require' => '请输入商品名称',
        'price.require' => '请输入商品价格',
        "image_url" => "请上传商品图片"
    ];

    //验证场景
    protected $scene = [
        "add" => ['category_id','product_name','price','image_url']   //商品添加
    ];
}