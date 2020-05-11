<?php

namespace app\index\validate;

use think\Validate;

class User extends Validate
{
    //验证的数据
    protected $rule = [
        'name' => [   //用户名
            'require',  //必填
            'min' => 5,  //最小长度6
            'max' => 12  //最大长度12
        ],
        'password' => [  //密码
            'require',
            'min' => 8,
            'max' => 16,
            'alphaNum'  //只能是字母和数字
        ],
        'repassword' => [  //重复密码
            'require'
        ],
        'email' => [   //邮箱
            'require',
            'email'
        ],
        'phone' => [    //手机号
            'require',
            '/^1[3-8]{1}[0-9]{9}$/'  //验证手机号
        ]
    ];

    //自定义错误提示
    protected $message = [
        'name.require' => "用户名不能为空",
        'name.min' => '用户名最少6个字符',
        'name.max' => '用户名不能超过12个字符',
        'password.require' => "密码不能为空",
        'password.min' => '密码最少8个字符',
        'password.max' => '密码不能超过16个字符',
        'password.alphaNum' => '密码只能包含数字和字母',
        'repassword.require' => "请重复密码",
        'email.require' => '邮箱不能为空',
        'email.email' => '请输入正确的邮箱',
        'phone.require' => '请输入手机号',
        'phone./^1[3-8]{1}[0-9]{9}$/' => '请输入正确的手机格式'
    ];


    //验证场景
    protected $scene = [
        'register' => ['name','phone','password','repassword','email']   //注册
    ];
}
