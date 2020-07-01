<?php
namespace app\index\controller;
use think\Db;
use think\Controller;
use think\Session;
class Index extends Common
{
    //首页
    public function index(){
        $this->getCarNum();
        $left_list=db('type')->order('order asc')->select();
        foreach ($left_list as $key => $value) {
            $where['status']    =   1;
            $where['tid']       =   $value['id'];
            $left_list[$key]['goods']=db('goods')->where($where)->limit(5)->select();
        }
        $this->assign('left_list',$left_list);
        return $this->fetch();
    }
    //分类列表页
    public function typelist(){
        $this->getCarNum();
        $tid=input('tid');
        if($tid!=''){
            $where['tid']   =   $tid;
            $t_where['id']  =   $tid;
            $g_where['tid'] =   $tid;
            $tname=db('type')->where($t_where)->value('name');
        }else{
            $tid='';
            $tname="所有分类";
        }
        $bid=input('bid');
        if($bid!=""){
            $where['bid']   =   $bid;
            $b_where['id']  =   $bid;
            $g_where['bid'] =   $bid;
            $bname=db('brand')->where($b_where)->value('name');
        }else{
            $bid='';
            $bname="所有品牌";
        }
        $this->assign('bid',$bid);
        $this->assign('tid',$tid);
        $message=$tname."&nbsp;&nbsp;".$bname;
        $brand_list=db('brand')->select();
        $this->assign('brand_list',$brand_list);
        $g_where['status']=1;
        $goods_list=db('goods')->where($g_where)->paginate(9);
        $page = $goods_list->render();
        $this->assign('message',$message);
        $left_list=db('type')->select();
        $this->assign('left_list',$left_list);
        $this->assign('goods_list',$goods_list);
        $this->assign('page',$page);
        return $this->fetch();
    }
    //品牌列表页
    public function select(){
        $this->getCarNum();
        $where=array();
        $key=input('key');
        $this->assign('key',$key);
        if($key!=''){
            $where['name']=array('like',"%$key%");
        }
        $list=db("goods")->where($where)->paginate(9,false,['query' => ['key'=>$key] ]);;
        $page = $list->render();
        $left_list=db('type')->select();
        $this->assign('list',$list);
        $this->assign('left_list',$left_list);
        $this->assign('page',$page);
        return $this->fetch();
    }
    //详情页
    public function details(){
        $this->getCarNum();
        $id=input('id');
        $where['id']=$id;
        $goods=db('goods')->where($where)->select();
        $this->assign('goods',$goods);
        return $this->fetch();
    }

    public function pay(){
        $this->getCarNum();
        if(empty(Session::get('UNAME'))){
            $this->error("尚未登录，请先登录",url('I/login'));
        }
        $type=input('type');
        $gid=input('gid');
        $num=input('num');
        $nums=input('nums');
        $price=input('price');
        //直接购买
        if($type==1){
            if($nums<$num){
                $this->error('库存不足，购买失败');
            }
            $where['id']=input('gid');
            $data['uid']=Session::get('UID');
            $data['gid']=$gid;
            $data['add_time']=date("Y-m-d H:i:s",time());
            $data['status']=1;
            $data['num']=$num;
            $data['price']=$price;
            $data['total']=$price*$num;
            if(db('order')->insert($data)&&db('goods')->where($where)->setDec('nums',$num)){
                $this->success('购买成功',url('Order/index'));
            }else{
                $this->error('购买失败');
            }
        }
        //加入购物车
        else{
            $data['uid']=Session::get('UID');
            $data['gid']=$gid;
            $data['num']=$num;
            if(db('car')->insert($data)){
                $this->success('加入成功');
            }else{
                $this->error('加入失败');
            }
        }
    }
    public function shopcar(){
        if(empty(Session::get('UNAME'))){
           $this->error("尚未登录，请先登录",url('I/login'));
        }
        $where['uid']=Session::get('UID');
        $where['num']=array('gt',0);
        $goods = db("goods g");
        $list= $goods->field('c.num,c.id as cid,g.*,g.price * c.num as total')
            ->join('db_car c ',' c.gid=g.id','left')
            ->where($where)->select();
        $this -> assign("title","购物车");
        $this -> assign("list",$list);
        return $this->fetch();
    }
    public function delcar(){
        if(empty(Session::get('UNAME'))){
           $this->error("尚未登录，请先登录",url('I/login'));
        }
        $where['id']=input('cid');
        if(db('car')->where($where)->delete()){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }
    public function clearcar(){
        $type=input('type');
        $list=input('ids/a');
        //结算
        if($type==1){
            foreach ($list as $key => $value) {
                $where['id']=$value;
                //获取购物车信息
                $car_list=db('car')->where($where)->select();
                //获取商品信息
                $gwhere['id']=$car_list[0]['gid'];
                $glist=db('goods')->where($gwhere)->select();
                //订单表数据
                $data['uid']=Session::get('UID');
                $data['gid']=$car_list[0]['gid'];
                $data['add_time']=date("Y-m-d H:i:s",time());
                $data['status']=1;
                $data['num']=$car_list[0]['num'];
                $data['price']=$glist[0]['price'];
                $data['total']=$car_list[0]['num']*$glist[0]['price'];
                //查询库存数是否小于购买数
                if($data['num']>$glist[0]['nums']){
                    $this->error('部分商品数量大于库存数，购买失败请重试',url('shopcar'));
                }else{
                    //商品表减少库存
                    db('goods')->where($gwhere)->setDec('nums',$data['num']);
                    //订单表添加记录
                    db('order')->insert($data);
                    //购物车清空已购买物品
                    db('car')->where($where)->delete();
                }  
            }
            $this->success('购买成功');
        }
        //清空
        else{
            foreach ($list as $key => $value) {
                $where['id']=$value;
                db('car')->where($where)->delete();
            }
            $this->redirect('shopcar');
        }
        

    }
    //购物车物品数量加一
    public function addNum(){
        $where['id']=input('cid');
        db('car')->where($where)->setInc('num',1);
        $this->redirect('Index/shopcar');
    }

    //购物车物品数量少一
    public function minNum(){
        $where['id']=input('cid');
        db('car')->where($where)->setDec('num',1);
        $this->redirect('Index/shopcar');
    }

}
