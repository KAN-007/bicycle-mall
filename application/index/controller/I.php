<?php
namespace app\index\controller;
use think\Db;
use think\Controller;
use Think\Upload;
use think\Request;
use think\Session;
class I extends Common{
    //注册页
    public function register(){
        return $this->fetch();
    }
    //注册过程
    public function doReg(){
        $data['name']=input('name');
        $data['password']=md5(input('password'));
        $rpwd=md5(input('repass'));
        if($data['password']!=$rpwd){
            $this->error('密码与确认密码不一致');
        }
        $data['add_time']=date("Y-m-d H:i:s",time());
        $where['name']=$data['name'];
        $oneArr=db('User')->where($where)->find();

        unset($where);
        if(!empty($oneArr)){
            $this->error('此用户名已存在，请重新注册');
        }else{
            $ret=db('User')->insert($data);
            if($ret){
                $this->success('注册成功，请登录',url('I/login'));
            }else{
                $this->error('注册失败');
            }
        }
       return json_encode($rnt);
    }
    //登陆页
    public function login(){
        return $this->fetch();
    }
    //登录过程
    public function doLog(){
        $where['name']=input('name');
        $where['password']=md5(input('password'));
        $oneArr=db('User')->where($where)->find();
        if(empty($oneArr)){
            $this->error('用户名密码错误，请核对后重新输入');
        }else{
            session('UID',$oneArr['id']);
            session('UNAME',$oneArr['name']);
            $this->success('登录成功',url('Index/index'));
        }
    }
    //修改密码页面
    public function upPass(){
        $this -> assign('title','个人信息');
        $this -> assign('UNAME',Session::get('UNAME'));
        return $this->fetch();
    }
    //修改密码过程
    public function savePass(){
        $this -> assign('title','个人信息');
        $this -> assign('UNAME',Session::get('UNAME'));
        $db = db('User');
        $res = $db -> field('password') -> find(Session::get('UID'));
        if(input('newpwd')!=input('repwd')){
            $this->error('两次密码不一致');
        }

        if($res['password']!=md5(input('oldpwd'))){
            $this->error('原密码错误');
        }
        $where['id']=Session::get('UID');
        $data['password']=md5(input('newpwd'));
        if($db->where($where)->update($data)){
            $this->success('更改成功',url('index'));
        }else{
            $this->error('更改失败');
        }
    }
    //退出登录
    public function logOut(){
        Session::delete('UID');
        Session::delete('UNAME');
        $this->success('退出成功',url('Index/index'));
    }

    public function index(){
        if(empty(Session::get('UNAME'))){
            $this->error("尚未登录，请先登录",url('I/login'));
        }
        $this -> assign('title','控制台');
        $this -> assign('UNAME',Session::get('UNAME'));
        return $this->fetch();
    }

    public function information(){
        if(empty(Session::get('UNAME'))){
            $this->error("尚未登录，请先登录",url('I/login'));
        }
        $where['id']=Session::get('UID');
        $db = db("user");
        $data = $db ->where($where) -> find();
        $this -> assign("title","个人信息");
        $this -> assign("data",$data);
        $this -> assign('UNAME',Session::get('UNAME'));
        return $this->fetch();
    }

    //修改数据方法
    public function saveInformation(){
        $db = db("user");
        //得到从模板中传过来的wid
        $where['id']        =   input('id');
        $data['address']    =   input('address');
        $data['tel']        =   input('tel');
        $data['realname']   =   input('realname');
       
        $ret=$db->where($where)->update($data);
        if($ret){
            $this->success('修改成功',url('information'));
           
        }else{
            $this->error('修改失败',url('information'));
        } 
    }
}
