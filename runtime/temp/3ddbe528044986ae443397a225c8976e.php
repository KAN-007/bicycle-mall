<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:56:"F:\wamp\www\shop/application/index\view\index\index.html";i:1552133093;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>家电商城</title>
  <link rel="stylesheet" type="text/css" href="/shop/public/demo/res/static/css/main.css">
  <link rel="stylesheet" type="text/css" href="/shop/public/demo/res/layui/css/layui.css">
  <script type="text/javascript" src="/shop/public/demo/res/layui/layui.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
</head>
<body id="list-cont">
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
          <a href="#" title="母婴商城">
            <img src="/shop/public/demo/res/static/img/logo1.png">
          </a>
        </h1>
        <div class="mallSearch">
          <form action="<?php echo url('select'); ?>" class="layui-form" method="post" name="key" novalidate>
            <input type="text" name="key" required  lay-verify="required" autocomplete="off" class="layui-input" placeholder="请输入需要的商品" >
            <button class="layui-btn" onclick="SendForm();"  lay-submit lay-filter="formDemo">
                <i class="layui-icon layui-icon-search"></i>
            </button>
            <input type="hidden" name="" value="">
          </form>
        </div>
      </div>
    </div>
  </div>


  <div class="content">
    <div class="main-nav">
      <div class="inner-cont0">
        <div class="inner-cont1 w1200">
          <div class="inner-cont2">
            <a href="<?php echo url('typelist'); ?>" class="active">所有商品</a>
          </div>
        </div>
      </div>
    </div>
    <div class="category-con">
      <div class="category-inner-con w1200">
        <div class="category-type">
          <h3>全部分类</h3>
        </div>
        <div class="category-tab-content">
          <div class="nav-con">
            <ul class="normal-nav layui-clear">
              <?php if(is_array($left_list) || $left_list instanceof \think\Collection || $left_list instanceof \think\Paginator): $_5c83c70621fa7 = is_array($left_list) ? array_slice($left_list,0,10, true) : $left_list->slice(0,10, true); if( count($_5c83c70621fa7)==0 ) : echo "" ;else: foreach($_5c83c70621fa7 as $key=>$vo): ?>
              <li class="nav-item">
                <div class="title" style="margin-top:10px;"><a href="<?php echo url('typelist',['tid'=>$vo['id']]); ?>"><?php echo $vo['name']; ?></a></div>
                <i class="layui-icon layui-icon-right"></i>
              </li>
              <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="category-banner">
        <div class="w1200">
          <img src="/shop/public/demo/res/static/img/banner.jpg">
        </div>
      </div>
    </div>



    <div class="product-cont w1200" id="product-cont">
       <?php if(is_array($left_list) || $left_list instanceof \think\Collection || $left_list instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($left_list) ? array_slice($left_list,0,5, true) : $left_list->slice(0,5, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
      <div class="product-item product-item1 layui-clear">
        <div class="left-title" style="height:200px;">
          <div style="margin-top:20px;">
            <img src="/shop/public/demo/res/static/img/icon_gou.png">
            <h5><?php echo $vo['name']; ?></h5>
          </div>
        </div>
        <div class="right-cont">
          <div class="img-box">
            <?php if(is_array($vo['goods']) || $vo['goods'] instanceof \think\Collection || $vo['goods'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['goods'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
              <a href="<?php echo url('details',['id'=>$vo['id']]); ?>"><img src="/shop/public/<?php echo $v['pic']; ?>"></a>
            <?php endforeach; endif; else: echo "" ;endif; ?>
          </div>
        </div>
      </div>
      <?php endforeach; endif; else: echo "" ;endif; ?>
    
    
    </div>

  </div>

  <div class="footer">
    <div class="ng-promise-box">
      <div class="ng-promise w1200">
        <p class="text">
          <a class="icon1" href="javascript:;">7天无理由退换货</a>
          <a class="icon2" href="javascript:;">满99元全场免邮</a>
          <a class="icon3" style="margin-right: 0" href="javascript:;">100%品质保证</a>
        </p>
      </div>
    </div>
    <div class="mod_help w1200">                                     
    
      <p class="coty">家电商城版权所有 &copy; 2019-2030 </p>
    </div>
  </div>
  <script type="text/javascript">

layui.config({
    base: '../res/static/js/util/' //你存放新模块的目录，注意，不是layui的模块目录
  }).use(['mm','carousel'],function(){
      var carousel = layui.carousel,
     mm = layui.mm;
     var option = {
        elem: '#test1'
        ,width: '100%' //设置容器宽度
        ,arrow: 'always'
        ,height:'298' 
        ,indicator:'none'
      }
      carousel.render(option);

  });


     function SendForm() 
     {
        document.key.submit();
     }
  </script>
</body>
</html>