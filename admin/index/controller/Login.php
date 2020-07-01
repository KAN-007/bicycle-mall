<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
use think\Session;
class Login extends Controller {
    public function index(){
        return $this->fetch();
    }
    //处理用户登录
    public function checkLogin(){
    	$login['uname'] = input('post.username');
    	$login['password'] = md5(input('post.userpwd'));
    	$m = db('Admin');
    	$user = $m -> where($login) -> field('id,uname,status') -> find();
    	if ($user) {
            Session::set('auid',$user['id']); 
            Session::set('auname',$user['uname']); 
            Session::set('status',$user['status']); 
            $this->success('登录成功',url('Index/index'));

    	}else{
             $this->error('账号或密码错误，登录失败！');
    	}
    }

    //处理用户登出
    public function loginOut(){
        session('auid',NULL);
        session('auname',NULL);
        session('status',NULL);
        $this->success('退出成功',url('Login/index'));
    }
}
