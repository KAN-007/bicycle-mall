<?php
namespace app\index\controller;
use Think\Upload;
use think\Controller;
use think\Request;
use think\Session;

class Goods extends Controller {
    public function index(){
        $this -> assign('status',Session::get('status'));
        $this -> assign('auname',Session::get('auname'));
        $user = db("goods g");
        $where['status']=1;
        $num = $user->field('count(*) count')->where($where) -> find();
        $total = $num["count"];
        $data = $user->field('g.*,t.name as tname,b.name as bname')
            ->join('db_type t ',' g.tid=t.id','left')
            ->join('db_brand b ',' g.bid=b.id','left')
            ->where($where)->order('g.add_time desc')->paginate(10);
        $this -> assign("title","商品管理");
        $this -> assign("user",$data);
        return $this->fetch();
    }

    //删除
    public function del(){
        $uid = $_GET["uid"];
        $where['id']=$uid;
        $data['status']=0;
        $del = db("goods");
        $res = $del ->where($where)-> update($data);
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
        $user = db("goods");
        if(Request::instance()->isPost()){
            $id=input('post.id');
            $where['id']=$id;
            $data['name']=input('name');
            $data['price']=input('price');
            $data['nums']=input('nums');
            $data['details']=stripslashes(input('details'));
            $data['tid']=input('tid');
            $data['bid']=input('bid');

            $file = request()->file('img');  
            if(!empty($file)) {                    
                $info = $file->move(ROOT_PATH.'public'.DS.'goods'); 
                $filename = $info->getSaveName();  //在测试的时候也可以直接打印文件名称来查看 
                $data['pic'] = htmlentities('goods/'.$filename);      
            }
            $res = $user ->where($where)-> update($data);
            if($res){
               $this -> success("修改成功",url('index'));
            }else{
               $this -> error("修改失败");
            }

        }else{
            $where['id']=input('id');
            $data = $user ->where($where)->find();
            $tlist=db('type')->select();
            $blist=db("brand")->select();
            $this -> assign('tlist',$tlist);
            $this -> assign('blist',$blist);
            $this -> assign("title",'修改商品信息');
            $this -> assign("data",$data);
            return $this->fetch();
        }

    }

    public function insert(){
        $this -> assign('status',Session::get('status'));
        $this -> assign('auname',Session::get('auname'));
        $tlist=db('type')->select();
        $blist=db("brand")->select();
        $this -> assign('tlist',$tlist);
        $this -> assign('blist',$blist);
        $this -> assign("title",'上传商品');
        return $this->fetch();
    }
    public function add(){
        $user = db("goods");
        $data['name']=input('name');
        $data['price']=input('price');
        $data['nums']=input('nums');
        $data['add_time']=date("Y-m-d H:i:s",time());
        $data['details']=stripslashes(input('details'));
        $data['tid']=input('tid');
        $data['bid']=input('bid');
        $data['status']=1;
        $img = request()->file("img");  
        if(!empty($img)) {                    
            $info = $img->move(ROOT_PATH.'public'.DS.'goods'); 
            $filename = $info->getSaveName();  //在测试的时候也可以直接打印文件名称来查看 
            $data['pic'] = htmlentities('goods/'.$filename);   
        }
        $ret=$user->insert($data);
        if($ret){
            $this->success('添加成功',url('Goods/index'));
        }else{
           $this->error('添加失败');
        }
    }
}