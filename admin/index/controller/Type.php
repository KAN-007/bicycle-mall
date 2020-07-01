<?php
namespace app\index\controller;
use Think\Upload;
use think\Controller;
use think\Request;
use think\Session;

class Type extends Controller {
    public function index(){
        $this -> assign('status',Session::get('status'));
        $this -> assign('auname',Session::get('auname'));

        $type = db("type");
        $num = $type->field('count(*) count')-> find();
        $total = $num["count"];

        $data = $type->order("order asc")->paginate(10);
        $this -> assign("title","分类管理");
        // $this -> assign("page",$page->show());
        $this -> assign("type",$data);
        return $this->fetch();
    }

    //删除
    public function del(){
        $uid = $_GET["uid"];
        $del = db("type");
        if($del-> delete($uid)){
            echo 1;
            return;
        }
        echo 0;
    }
    //修改时调用此方法
    public function mod(){
        $this -> assign('status',Session::get('status'));
        $this -> assign('auname',Session::get('auname'));
        $user = db("type");
        if(Request::instance()->isPost()){
            
            $id=input('post.id');
            $where['id']=$id;
            $data['name']=input('name');
            $data['order']=input('order');
            $res = $user ->where($where)-> update($data);
            if($res){
               $this -> success("修改成功",url('index'));
            }else{
               $this -> error("修改失败");
            }

        }else{
            $where['id']=input('id');
            $data = $user ->where($where)->find();
            $this -> assign("title",'修改分类信息');
            $this -> assign("data",$data);
            return $this->fetch();
        }

    }
    //添加用户
    public function insert(){
        $this -> assign('status',Session::get('status'));
        $this -> assign('auname',Session::get('auname'));

        if(Request::instance()->isPost()){
            $data['name']=input('name');
            $data['order']=input('order');
            $data['add_time']=date("Y-m-d H:i:s",time());
            $ret=db('type')->insert($data);
            if($ret){
               $this->success('添加成功',url('Type/index'));
            }else{
               $this->error('添加失败');
            }
        }else{
            $this -> assign("title",'添加分类');
            return $this->fetch();
        }
    }
}