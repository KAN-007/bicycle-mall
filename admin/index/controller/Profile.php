<?php
namespace app\index\controller;
use Think\Upload;
use think\Controller;
use think\Request;
use think\Session;

class Profile extends Controller {
    public function index(){
        $this -> assign('title','个人信息');
        $this -> assign('status',Session::get('status'));
        $this -> assign('auname',Session::get('auname'));
         return $this->fetch();
    }

    //处理修改密码
    public function updataPwd(){
        $this -> assign('title','个人信息');
        $this -> assign('status',Session::get('status'));
        $this -> assign('auname',Session::get('auname'));
    	$m = db('admin');
    	$res = $m -> field('password') -> find(Session::get('auid'));
        if(input('newpwd')!=input('repwd')){
            $this->error('两次密码不一致');
        }

        if($res['password']!=md5(input('oldpwd'))){
            $this->error('原密码错误');
        }
        $where['id']=Session::get('auid');
        $data['password']=md5(input('newpwd'));
        if($m->where($where)->update($data)){
            $this->success('更改成功',url('index'));
        }else{
            $this->error('更改失败');
        }
        // return $this->fetch('index');

    	// if ($res['password'] != md5(input('oldpwd'))) {
    	// 	$rnt=2;
    	// 	return json_encode($rnt);
    	// }

    	// $new['password'] =  md5(input('oldpwd'));
    	// $map['id'] = array('eq',Session::get('auid'));
    	// if ($m->where($map)->update($new)) {
    	// 	$rnt= 1;
    	// 	return json_encode($rnt);
    	// }
    	// $rnt= 0;
    }
}
