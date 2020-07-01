<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:52:"F:\wamp\www\shop/application/index\view\i\login.html";i:1552109073;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>家电商场</title>
  <link rel="stylesheet" type="text/css" href="/shop/public/demo/res/static/css/main.css">
  <link rel="stylesheet" type="text/css" href="/shop/public/demo/res/layui/css/layui.css">
  <script type="text/javascript" src="/shop/public/demo/res/layui/layui.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
</head>
<body>
  <div class="content content-nav-base  login-content">

    <div class="login-bg">
      <div class="login-cont w1200">
        <div class="form-box">
          <form class="layui-form" action="<?php echo url('doLog'); ?>" type="post">
            <legend>账号登录</legend>
            <div class="layui-form-item">
              <div class="layui-inline iphone">
                <div class="layui-input-inline">
                  <i class="layui-icon layui-icon-cellphone iphone-icon"></i>
                  <input type="text" name="name"   placeholder="请输入账号" autocomplete="off" class="layui-input">
                </div>
              </div>
              <div class="layui-inline veri-code">
                <div class="layui-input-inline">
                  <input type="password" name="password"  placeholder="请输入密码" autocomplete="off" class="layui-input">
                </div>
              </div>
            </div>
            <div class="layui-form-item login-btn">
              <div class="layui-input-block">
                <input type="submit" class="layui-btn" style="width:100%" value="登录">
              </div>
              <div style="margin-top:15px;text-align:center">
                <p><a href="<?php echo url('register'); ?>">没有账号，点此注册</a></p>
              </div>
            </div>
          </form>
        </div>
      </div>
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

</body>
</html>