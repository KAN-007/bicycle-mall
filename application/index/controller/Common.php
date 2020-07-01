<?php
namespace app\index\controller;
use think\Db;
use think\Controller;
use think\Request;
use think\Session;
class Common extends Controller 
{
    public function getCarNum(){
    	if(!empty(Session::get('UID'))){
            $car_where['uid']=Session::get('UID');
            $total=db("car")->where($car_where)->count();
     		$this->assign('total',$total);
        }
    }
}
