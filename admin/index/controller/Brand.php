<?php
namespace app\index\controller;
use Think\Upload;
use think\Controller;
use think\Request;
use think\Session;

class Brand extends Controller {
    public function index(){
        $this -> assign('status',Session::get('status'));
        $this -> assign('auname',Session::get('auname'));  
        $user = db("Brand");
        $num = $user->field('count(*) count')-> find();
        $total = $num["count"];
        $data = $user->order('order asc')->paginate(5);
        $this -> assign("title","品牌管理");
        $this -> assign("user",$data);
        return $this->fetch();
    }

    //删除
    public function del(){
        $uid = $_GET["uid"];
        $del = db("brand");
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
        $user = db("brand");
        if(Request::instance()->isPost()){
            $id=input('post.id');
            $where['id']=$id;
            $data['name']=input('name');
            $data['order']=input('order');
            $file = request()->file('img');  
            if(!empty($file)) {                    
                $info = $file->move(ROOT_PATH.'public'.DS.'brand'); 
                $filename = $info->getSaveName();  //在测试的时候也可以直接打印文件名称来查看 
                $data['img'] = htmlentities('brand/'.$filename);      
            }
            $where['id']=$id;
            $res = $user ->where($where)-> update($data);
            if($res){
               $this -> success("修改成功",url('index'));
            }else{
               $this -> error("修改失败");
            }

        }else{
            $where['id']=input('id');
            $data = $user ->where($where)->find();
            $this -> assign("title",'修改品牌信息');
            $this -> assign("data",$data);
            return $this->fetch();
        }

    }

    public function insert(){
        $this -> assign('status',Session::get('status'));
        $this -> assign('auname',Session::get('auname'));
        $this -> assign("title",'添加品牌');
        return $this->fetch();
    }
    public function add(){
        $user = db("brand");
        $data['name']=input('name');
        $data['order']=input('order');
        $data['add_time']=date("Y-m-d H:i:s",time());
        $img = request()->file("img");  
        if(!empty($img)) {                    
            $info = $img->move(ROOT_PATH.'public'.DS.'brand'); 
            $filename = $info->getSaveName();  //在测试的时候也可以直接打印文件名称来查看 
            $data['img'] = htmlentities('brand/'.$filename);   
        }
        $ret=$user->insert($data);
        if($ret){
            $this->success('添加成功',url('brand/index'));
        }else{
           $this->error('添加失败');
        }
    }
}