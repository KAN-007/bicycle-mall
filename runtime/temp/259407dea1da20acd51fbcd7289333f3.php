<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:63:"D:\phpStudy\WWW\shop/application/index\view\index\typelist.html";i:1592122654;}*/ ?>
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
<style type="text/css">
#menu { 
    font:12px verdana, arial, sans-serif;
    text-align: center; 
  }

#menu ul {
    list-style: none;
    margin-left: 50px;
}
 
#menu li {
    display: inline;
    line-height: 40px;
    float:left
}

</style>
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
          <a href="#" title="家电商城">
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


  <div class="content content-nav-base commodity-content">
    <div class="main-nav">
      <div class="inner-cont0">
        <div class="inner-cont1 w1200">
          <div class="inner-cont2">
            <a href="<?php echo url('typelist'); ?>" class="active">所有商品</a>
          </div>
        </div>
      </div>
    </div>
    <div class="commod-cont-wrap">
      <div class="commod-cont w1200 layui-clear">
        <div class="left-nav">
          <div class="title">所有品牌</div>
          <div class="list-box">
            <dl>
             <dt></dt>
             <?php if(is_array($left_list) || $left_list instanceof \think\Collection || $left_list instanceof \think\Paginator): if( count($left_list)==0 ) : echo "" ;else: foreach($left_list as $key=>$vo): ?>
              <dd><a href="<?php echo url('typelist',['tid'=>$vo['id']]); ?>"><?php echo $vo['name']; ?></a></dd>
             <?php endforeach; endif; else: echo "" ;endif; ?>
            </dl>
          </div>
        </div>
        <div class="right-cont-wrap">
          <div class="right-cont">
            <div style="font-size:25px;font-weight:bold;font-family:'Comic Sans MS', cursive, sans-serif;color:#F93">
              品牌：
                <?php if(is_array($brand_list) || $brand_list instanceof \think\Collection || $brand_list instanceof \think\Paginator): if( count($brand_list)==0 ) : echo "" ;else: foreach($brand_list as $key=>$vo): ?>
                  <span><a href="<?php echo url('typelist',['bid'=>$vo['id'],'tid'=>$tid]); ?>"><font color="#F93"><?php echo $vo['name']; ?></font></a></span>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <div class="prod-number">
              <span>分类：<?php echo $message; ?></span>
            </div>
            <div class="cont-list layui-clear" id="list-cont">
              <?php if(is_array($goods_list) || $goods_list instanceof \think\Collection || $goods_list instanceof \think\Paginator): if( count($goods_list)==0 ) : echo "" ;else: foreach($goods_list as $key=>$vo): ?>
              <div class="item">
                <div class="img">
                  <a href="<?php echo url('details',['id'=>$vo['id']]); ?>"><img src="/shop/public/<?php echo $vo['pic']; ?>" width="280px" height="300px;"></a>
                </div>
                <div class="text">
                  <p class="title"><?php echo $vo['name']; ?></p>
                  <p class="price">
                    <span class="pri">￥<?php echo $vo['price']; ?></span>
                    <span class="nub">库存：<?php echo $vo['nums']; ?></span>
                  </p>
                </div>
              </div>
              <?php endforeach; endif; else: echo "" ;endif; ?>


            </div>
            <div id="menu"  class="layui-box layui-laypage layui-laypage-default"><ul style="list-style:none;padding:0;margin:0;"><?php echo $page; ?></ul></div>

          </div>

          </div>
        </div>

      </div>

    </div>

  </div>
<script>

  layui.config({
    base: '/shop/public/demo/res/static/js/util/' //你存放新模块的目录，注意，不是layui的模块目录
  }).use(['mm','laypage','jquery'],function(){
      var laypage = layui.laypage,$ = layui.$,
     mm = layui.mm;
       laypage.render({
        elem: 'demo0'
        ,count: 100 //数据总数
      });


    // 模版引擎导入
    //  var html = demo.innerHTML;
    //  var listCont = document.getElementById('list-cont');
    //  // console.log(layui.router("#/about.html"))
    // mm.request({
    //     url: '/shop/public/demo/json/commodity.json',
    //     success : function(res){
    //       console.log(res)
    //       listCont.innerHTML = mm.renderHtml(html,res)
    //     },
    //     error: function(res){
    //       console.log(res);
    //     }
    //   })

    $('.sort a').on('click',function(){
      $(this).addClass('active').siblings().removeClass('active');
    })
    $('.list-box dt').on('click',function(){
      if($(this).attr('off')){
        $(this).removeClass('active').siblings('dd').show()
        $(this).attr('off','')
      }else{
        $(this).addClass('active').siblings('dd').hide()
        $(this).attr('off',true)
      }
    })

});
function SendForm() 
     {
        document.key.submit();
     }
</script>


</body>
</html>