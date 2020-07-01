<?php
namespace app\index\controller;
use think\Db;
use think\Controller;
class Admin extends Controller 
{
    public function _initialize(){
        //验证登陆,没有登陆则跳转到登陆页面
        if(empty($_SESSION['auname'])){
            $this->redirect('Login/index');
        }
    } 
}
