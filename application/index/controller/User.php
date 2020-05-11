<?php
namespace app\index\controller;

use think\Controller;

class User extends Controller
{

    protected $obj;

    /**
     * 对象初始化
     *
     * @return void
     */
    public function _initialize(){
        $this->obj = model('User');
    }

    /**
     * 用户注册
     *
     * @return void
     */
    public function registerCheck()
    {
        // 判断是否为post提交
        if(!request()->isPost()){
            echo show('2',"请求不合法");
            exit;
        }

        //接收数据
        $data = input('post.');
        
        //验证器 验证数据
        $validate = validate('User');   
        if (!$validate->scene('register')->check($data)) {
            echo show('2',$validate->getError());
            exit;
        }

        //判断用户名是否存在
        if($this->obj->dataExist('name',$data["name"])){
            echo show('2',"该用户名已存在");
            exit;
        }

        //判断邮箱是否存在
        if($this->obj->dataExist('email',$data["email"])){
            echo show('2',"该邮箱已被注册");
            exit;
        }

        //判断手机号是否存在
        if($this->obj->dataExist('phone',$data["phone"])){
            echo show('2',"该手机号已被注册");
            exit;
        }

        //判断两次密码是否一致
        if($data["password"] != $data["repassword"]){
            echo show('2',"您输入的两次密码不一致");
            exit;
        }

        //自动生成 密码的加盐字符串
        $data['code'] = mt_rand(100, 10000);
        $data["password"] = md5($data["password"].$data["code"]);
        $data["username"] = $data["name"];   //默认昵称为用户名

        //数据入库
        $res = $this->obj->registerAdd($data);
        if($res){
            echo show('0',"注册成功");
            exit;
        }else{
            echo show("2","注册失败");
            exit;
        }
    }
}