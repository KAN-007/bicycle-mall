<?php
namespace app\index\controller;
use think\Db;
use think\Controller;
use think\Request;
use think\Session;
class Index extends Controller 
{
    public function index(){
    	if(empty(Session::get('auname'))){
    		$this->error("尚未登录，请先登录",url('login/index'));
    	}
        $this -> assign('title','控制台');
        $this -> assign('status',Session::get('status'));
        $this -> assign('auname',Session::get('auname'));
        return $this->fetch();
    }
}
