<?php

class LoginControl extends Control{
	function __init(){

	}
    //退出登录
    public function out(){
        session(NULL);
        $this->success('退出成功','login');
    }
	function login(){

		if(session("aid")){
			go("Index/index");
		}
		if (IS_POST) {
            $json=array('stat'=>1);
            //验证验证码
            if(session('code') !== strtoupper(Q('post.code'))){
                $json=array('stat'=>0,'msg'=>'验证码输入错误');
                $this->ajax($json);
            }
            //验证用户名
            $db= M("admin");
            $field = $db->where('username="'.Q("username").'"')->find();
            if(!$field['username']){
                $json=array('stat'=>0,'msg'=>'帐号输入错误');
                $this->ajax($json);
            }
            //验证密码
            if($field['password']!=Q('post.password',NULL,'md5')){
                $json=array('stat'=>0,'msg'=>'密码输入错误');
                $this->ajax($json);
            }
            $_SESSION['aid']=$field['aid'];
            $_SESSION['username']=$field['username'];
            $this->ajax($json);
            exit;
        } else {
            $this->display();
        }
	}
	//验证码
    public function code()
    {
        $code = new Code();
        $code->show();
    }
    //验证用户输入的验证码
    public function check_code(){
    	if($code = Q("post.code")){
    		echo session("code") == strtoupper($code)?1:0;
    		exit;
    	}
    }
}