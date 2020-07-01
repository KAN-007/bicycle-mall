<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:62:"D:\phpStudy\WWW\shop/application/index\view\index\shopcar.html";i:1592038255;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>新华二手自行车</title>
  <link rel="stylesheet" type="text/css" href="/shop/public/demo/res/static/css/mainB.css">
  <link rel="stylesheet" type="text/css" href="/shop/public/demo/res/layui/css/layui.css">
  <script type="text/javascript" src="/shop/public/demo/res/layui/layui.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
</head>
<body>

  <div class="site-nav-bg">
    <div class="site-nav w1200">
      <p class="sn-back-home">
        <i class="layui-icon layui-icon-home"></i>
        <a href="<?php echo url('index'); ?>">首页</a>
      </p>
        <div class="sn-quick-menu">
        <?php if(session('UNAME') == ''): ?>
          <div class="login"><a href="<?php echo url('I/login'); ?>"><font color="blue">登录</font></a></div>
          <div ><a href="<?php echo url('I/register'); ?>">注册</a></div>
        <?php else: ?>
          <div class="login">欢迎您，<?php echo session('UNAME'); ?></div>
          <div class="login"><a href="<?php echo url('I/index'); ?>"><font color="blue">个人中心</font></a></div>
          <div class="login"><a href="<?php echo url('I/logOut'); ?>">退出</a></div>

        <?php endif; ?>
      </div>
    </div>
  </div>



  <div class="header">
    <div class="headerLayout w1200">
      <div class="headerCon">
        <h1 class="mallLogo">
          <a href="#" title="家电商城">
            <img src="/shop/public/demo/res/static/img/logo1.png">
          </a>
        </h1>
        <div class="mallSearch">
          <form action="" class="layui-form" novalidate>
            <input type="text" name="title" required  lay-verify="required" autocomplete="off" class="layui-input" placeholder="请输入需要的商品">
            <button class="layui-btn" lay-submit lay-filter="formDemo">
                <i class="layui-icon layui-icon-search"></i>
            </button>
            <input type="hidden" name="" value="">
          </form>
        </div>
      </div>
    </div>
  </div>


  <div class="content content-nav-base shopcart-content">
    <div class="main-nav">
      <div class="inner-cont0">
        <div class="inner-cont1 w1200">
          <div class="inner-cont2">
            <a href="commodity.html" class="active">所有商品</a>
          </div>
        </div>
      </div>
    </div>

    <div class="cart w1200">
      <div class="cart-table-th">
        <div class="th th-chk">
          <div class="select-all">
            <div class="cart-checkbox">
              <input class="check-all check" id="allCheckked" type="checkbox" value="true">
            </div>
          <label>&nbsp;&nbsp;全选</label>
          </div>
        </div>
        <div class="th th-item">
          <div class="th-inner">
            商品
          </div>
        </div>
        <div class="th th-price">
          <div class="th-inner">
            单价
          </div>
        </div>
        <div class="th th-amount">
          <div class="th-inner">
            数量
          </div>
        </div>
        <div class="th th-sum">
          <div class="th-inner">
            小计
          </div>
        </div>
        <div class="th th-op">
          <div class="th-inner">
            操作
          </div>
        </div>  
      </div>
      <div class="OrderList">
        <div class="order-content" id="list-cont">
          <form name="form1" method="post" action="<?php echo url('clearcar'); ?>">
          <input type="hidden" name="type" id="type" value="">
          <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$vo): ?>
          
          <ul class="item-content layui-clear">
            <li class="th th-chk">
              <div class="select-all">
                <div class="cart-checkbox">
                  <input class="CheckBoxShop check" id="ttt" type="checkbox" num="all" name="ids[]" value="<?php echo $vo['cid']; ?>">
                </div>
              </div>
            </li>
            <li class="th th-item">
              <div class="item-cont">
                <a href="javascript:;"><img src="/shop/public/<?php echo $vo['pic']; ?>" alt=""></a>
                <div class="text">
                  <div class="title"><?php echo $vo['name']; ?></div>
                  
                </div>
              </div>
            </li>
            <li class="th th-price">
              <span class="th-su"><?php echo $vo['price']; ?></span>
            </li>
            <li class="th th-amount">
              <div class="box-btn layui-clear">
                <a href="<?php echo url('minNum',['cid'=>$vo['cid']]); ?>"><div class="less layui-btn">-</div></a>
                <input class="Quantity-input" type="" name="" value="<?php echo $vo['num']; ?>" disabled="disabled">
                <a href="<?php echo url('addNum',['cid'=>$vo['cid']]); ?>"><div class="add layui-btn">+</div></a>
              </div>
            </li>
            <li class="th th-sum">
              <span class="sum"><?php echo $vo['total']; ?></span>
            </li>
            <li class="th th-op">
              <span class="dele-btn"><a href="<?php echo url('delcar',['cid'=>$vo['cid']]); ?>">删除</a></span>
            </li>
          </ul>
          <?php endforeach; endif; else: echo "" ;endif; ?>
        </form>
        </div>
      </div>



      <div class="FloatBarHolder layui-clear">
        <div class="th th-chk">
          <div class="select-all">
            <div class="cart-checkbox">
              <input class="check-all check" id="" name="select-all" type="checkbox"  value="true">
            </div>
            <label>&nbsp;&nbsp;已选<span class="Selected-pieces">0</span>件</label>
          </div>
        </div>
        <div class="th batch-deletion">
          <span class="batch-dele-btn" onclick="SendForm(2)">批量删除</span>
        </div>
        <div class="th Settlement">
          <button class="layui-btn" onclick="SendForm(1)">结算</button>
        </div>
        <div class="th total">
          <p>应付：<span class="pieces-total">0</span></p>
        </div>
      </div>
    </div>
  </div>

<script type="text/javascript">
  layui.config({
    base: '/shop/public/demo/res/static/js/util/' //你存放新模块的目录，注意，不是layui的模块目录
  }).use(['mm','jquery','element','car'],function(){
    var mm = layui.mm,$ = layui.$,element = layui.element,car = layui.car;
    
    car.init()

});
function SendForm(type){
    document.getElementById('type').value=type;
    document.form1.submit();
  }
</script>
</body>
</html>