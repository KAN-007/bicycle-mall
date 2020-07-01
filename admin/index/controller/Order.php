<?php
namespace app\index\controller;
use Think\Upload;
use think\Controller;
use think\Request;
use think\Session;

class Order extends Controller {
    public function index(){
        $this -> assign('status',Session::get('status'));
        $this -> assign('auname',Session::get('auname'));
        $where=array();
        $uname=input('uname');
        $this->assign('uname',$uname);
        if($uname!=''){
            $where['o.id']=array('like',"%$uname%");
        }
        $status=Session::get('status');

        $user = db("Order o");
        $num = $user->field('count(*) count')->where($where) -> find();
        $total = $num["count"];
       
        $data = $user->field('o.*,u.name as uname,u.address,u.realname,u.tel,g.name')
            ->join('db_user u','u.id=o.uid','left')
            ->join('db_goods g','g.id=o.gid','left')
            ->where($where)->paginate(5);
        $this -> assign("title","订单管理");
        $this -> assign("user",$data);
        return $this->fetch();
    }

    //删除
    public function del(){
        $uid = $_GET["uid"];
        $del = db("Order");
        if($del-> delete($uid)){
            echo 1;
            return;
        }
        echo 0;
    }
    //发货
    public function upstatus(){
        $uid = $_GET["uid"];
        $where['id']=$uid;
        $data['status']=2;
        $data['send_time']=date("Y-m-d H:i:s",time());
        $db = db("Order");
        $res = $db ->where($where)-> update($data);
        if($res){
            echo 1;
            return;
        }
        echo 0;
    }
    //修改时调用此方法
    public function mod(){
        $this -> assign('status',Session::get('status'));
        $this -> assign('auname',Session::get('auname'));
        $user = db("Order");
        if(Request::instance()->isPost()){
            $id=input('post.id');
            $img = request()->file("img"); 
            if(!empty($img)) {                    
                $info = $img->move(ROOT_PATH.'public'.DS.'Order'); 
                $filename = $info->getSaveName();  //在测试的时候也可以直接打印文件名称来查看 
                $data['img'] = htmlentities('Order/'.$filename);   
            }

            $src = request()->file("src");  
            if(!empty($src)) {                    
                $info = $src->validate(['ext'=>'avi,mp4'])->move(ROOT_PATH.'public'.DS.'Order'); 
                $filename = $info->getSaveName();  //在测试的时候也可以直接打印文件名称来查看 
                $data['src'] = htmlentities('Order/'.$filename);      
            }
            $data['title']=input('title');
            $data['des']=input('des');
            $data['time']=input('time');
            $data['order']=input('order');
            $where['id']=$id;
          
            $res = $user ->where($where)-> update($data);
            if($res){

               $this->success('修改成功',url('Order/index'));
            }else{

               $this->error('修改失败！');
            }
        }else{
            $where['id']=input('uid');
            $data = $user ->where($where)->find();
            $this -> assign("title",'修改订单信息');
            $this -> assign("data",$data);
            return $this->fetch();
        }

    }
    //添加用户
    public function insert(){
        $this -> assign('status',Session::get('status'));
        $this -> assign('auname',Session::get('auname'));
        if(Request::instance()->isPost()){
            $user = db("Order");
            $data['times']=time();
            $data['tid']=Session::get('auid');
            $data['title']=input('title');
            $data['des']=input('des');
            $data['time']=input('time');
            $data['order']=input('order');
            $data['hot']=0;
            $img = request()->file("img");  
            if(!empty($img)) {                    
                $info = $img->move(ROOT_PATH.'public'.DS.'Order'); 
                $filename = $info->getSaveName();  //在测试的时候也可以直接打印文件名称来查看 
                $data['img'] = htmlentities('Order/'.$filename);   

            }

            $src = request()->file("src");  
            if(!empty($src)) {                    
                $info = $src->validate(['ext'=>'avi,mp4'])->move(ROOT_PATH.'public'.DS.'Order'); 
                $filename = $info->getSaveName();  //在测试的时候也可以直接打印文件名称来查看 
                $data['src'] = htmlentities('Order/'.$filename);      

            }
            $ret=$user->insert($data);
            if($ret){

               $this->success('添加成功',url('Order/index'));
            }else{

               $this->error('添加失败');
            }
        
        }else{
            $this -> assign("title",'上传订单');
            return $this->fetch();
        }
    }

    public function evaluate(){
        $this -> assign('status',Session::get('status'));
        $this -> assign('auname',Session::get('auname'));
        $where=array();
        $uname=input('uname');
        $this->assign('uname',$uname);
        if($uname!=''){
            $where['o.id']=array('like',"%$uname%");
        }
        $status=Session::get('status');

        $user = db("Order o");
        $num = $user->field('count(*) count')->where($where) -> find();
        $total = $num["count"];
       
        $data = $user->field('o.*,u.name as uname,u.address,u.realname,u.tel,g.name')
            ->join('db_user u','u.id=o.uid','left')
            ->join('db_goods g','g.id=o.gid','left')
            ->where($where)->paginate(5);
        $this -> assign("title","订单管理");
        $this -> assign("user",$data);
        return $this->fetch();
    }

    //回复评论
    public function revaluate(){
        $this -> assign('status',Session::get('status'));
        $this -> assign('auname',Session::get('auname'));
        $user = db("Order");
        if(Request::instance()->isPost()){
            $id=input('post.id');
            $where['id']=$id;
            $data['revaluate']=input('revaluate');
            $res = $user ->where($where)-> update($data);
            if($res){
               $this->success('回复成功',url('Order/index'));
            }else{

               $this->error('回复失败！');
            }
        }else{
            $where['id']=input('id');
            $data = $user ->where($where)->find();
            $this -> assign("title",'回复评论');
            $this -> assign("data",$data);
            return $this->fetch();
        }

    }

}