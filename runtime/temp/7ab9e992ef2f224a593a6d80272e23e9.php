<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:62:"D:\phpStudy\WWW\shop/application/index\view\index\details.html";i:1592122489;}*/ ?>
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
          <div class="sp-cart"><a href="<?php echo url('Index/shopcar'); ?>">购物车</a><span><?php if($total != 0): ?><?php echo $total; endif; ?></span></div>
        <?php endif; ?>
      </div>
    </div>
  </div>



  <div class="header">
    <div class="headerLayout w1200">
      <div class="headerCon">
        <h1 class="mallLogo">
          <a href="#" title="新华二手自行车">
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


  <div class="content content-nav-base datails-content">
    <div class="main-nav">
      <div class="inner-cont0">
        <div class="inner-cont1 w1200">
          <div class="inner-cont2">
            <a href="<?php echo url('typelist'); ?>" class="active">所有商品</a>
          </div>
        </div>
      </div>
    </div>
    <div class="data-cont-wrap w1200">
      <?php if(is_array($goods) || $goods instanceof \think\Collection || $goods instanceof \think\Paginator): $i = 0; $__LIST__ = $goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
      <div class="crumb">
        <a href="<?php echo url('Index/index'); ?>">首页</a>
        <span>></span>
        <a href="<?php echo url('Index/typelist'); ?>">所有商品</a>
        <span>></span>
        <a href="javascript:;">产品详情</a>
      </div>
      <div class="product-intro layui-clear">
        <div class="preview-wrap">
          <a href="javascript:;"><img src="/shop/public/<?php echo $vo['pic']; ?>"></a>
        </div>
        <div class="itemInfo-wrap">
          <div class="itemInfo">
            <div class="title">
              <h4><?php echo $vo['name']; ?> </h4>
              
            </div>
            <div class="summary" >
              <p class="activity"><span>现价</span><strong class="price"><i>￥</i><?php echo $vo['price']; ?></strong></p>
              <p class="activity"><span>库存</span><?php echo $vo['nums']; ?></p>
            </div>
            <div class="choose-attrs">
              <div class="number layui-clear">
                <form action="<?php echo url('pay'); ?>" name="pay" method="post">
                <span class="title">数&nbsp;&nbsp;&nbsp;&nbsp;量</span>
                <input type="hidden" name="gid" value="<?php echo $vo['id']; ?>">
                <input type="hidden" name="nums" value="<?php echo $vo['nums']; ?>">
                <input type="hidden" name="price" value="<?php echo $vo['price']; ?>">
                <input type="hidden" name="type" id="type" value="">
                <div class="number-cont">
                    <span class="cut btn">-</span>
                      <input onkeyup="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}" onafterpaste="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}" maxlength="4" type="" name="num" value="1">
                    <span class="add btn">+</span>
                </div>
                </form>
              </div>
            </div>
            <div class="choose-btns">
              <button class="layui-btn layui-btn-primary purchase-btn" onclick="SendForm(1)">立刻购买</button>
              <button class="layui-btn  layui-btn-danger car-btn" onclick="SendForm(2)"><i class="layui-icon layui-icon-cart-simple"></i>加入购物车</button>  
            </div>
          </div>
        </div>
      </div>
      <div class="layui-clear">

        <div class="detail" style="width:100%">
          <h4>详情</h4>
          <div >
            <?php echo $vo['details']; ?>
          </div>
        </div>
      </div>
      <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
  </div>
<script type="text/javascript">
  layui.config({
    base: '/shop/public/demo/res/static/js/util/' //你存放新模块的目录，注意，不是layui的模块目录
  }).use(['mm','jquery'],function(){
      var mm = layui.mm,$ = layui.$;
      var cur = $('.number-cont input').val();
      $('.number-cont .btn').on('click',function(){
        if($(this).hasClass('add')){
          cur++;
         
        }else{
          if(cur > 1){
            cur--;
          }  
        }
        $('.number-cont input').val(cur)
      })
      
  });

  function SendForm(type){
    document.getElementById('type').value=type;
    document.pay.submit();
  }
</script>


</body>
</html>