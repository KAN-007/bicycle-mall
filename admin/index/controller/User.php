<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/3
 * Time: 21:39
 */
namespace app\index\controller;
use Think\Upload;
use think\Controller;
use think\Request;
use think\Session;
class User extends Controller{
    public function index(){
        $this -> assign('status',Session::get('status'));
        $this -> assign('auname',Session::get('auname'));
        $uname=input('uname');

        $this->assign('uname',$uname);
        $user = db("User");
        if($uname!=''){
            $where['name']=array('like',"%$uname%");
            $num = $user->field('count(*) count') ->where($where)-> find();
            $data = $user->where($where)->paginate(10);
        }else{
            $num = $user->field('count(*) count') -> find();
            $data = $user->paginate(10);
        }
        
        $total = $num["count"];
        
        $this -> assign("title","用户管理");
        $this -> assign("user",$data);
         return $this->fetch();
    }
}