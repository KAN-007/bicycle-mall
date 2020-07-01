<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:55:"D:\phpStudy\WWW\shop/admin/index\view\goods\insert.html";i:1552011446;s:53:"D:\phpStudy\WWW\shop\admin\index\view\Index\base.html";i:1574690674;s:56:"D:\phpStudy\WWW\shop\admin\index\view\Index\sidebar.html";i:1552017341;}*/ ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title><?php echo $title; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!-- basic styles -->
		<link rel="stylesheet" href="/shop/public/admin/css/bootstrap.minB.css" />
		<link rel="stylesheet" href="/shop/public/admin/css/font-awesome.min.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="/shop/public/admin/css/ace.minB.css" />
		<link rel="stylesheet" href="/shop/public/admin/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="/shop/public/admin/css/ace-skins.min.css" />
		<block name="stylecss"></block>
	</head>

	<body>
		<div class="navbar navbar-default" id="navbar">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<!--<div class="navbar-header pull-left">-->
					<!--<a href="index">-->
						<!--<img src="/shop/public/admin/images/admin_logo.png" class="img-responsive" />-->
					<!--</a>&lt;!&ndash; /.brand &ndash;&gt;-->
				<!--</div>-->

				<div class="navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="/shop/public/admin/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>欢迎光临,</small>
									<?php echo $auname; ?>
								</span>

								<i class="icon-caret-down"></i>
							</a>

							<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="<?php echo url('Profile/index'); ?>">
										<i class="icon-cog"></i>
										修改密码
									</a>
								</li>
								<li class="divider"></li>

								<li>
									<a href="<?php echo url('Login/loginOut'); ?>">
										<i class="icon-off"></i>
										退出
									</a>
								</li>
							</ul>
						</li>
					</ul><!-- /.ace-nav -->
				</div><!-- /.navbar-header -->
			</div><!-- /.container -->
		</div>

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>
			<div class="main-container-inner">
				<a class="menu-toggler" id="menu-toggler" href="#">
					<span class="menu-text"></span>
				</a>
				
				<!-- 加载左部分 -->
				        <!-- 侧边菜单开始 -->
        <div class="sidebar" id="sidebar">
            <script type="text/javascript">
                try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
            </script>
            <ul class="nav nav-list">
                <li>
                    <a id="indexpage" href="<?php echo url('Index/index'); ?>">
                        <i class="icon-dashboard"></i>
                        <span class="menu-text"> 控制台 </span>
                    </a>
                </li>
                <?php if($status == 1): ?>
                    <li>
                        <a href="<?php echo url('Type/index'); ?>">
                            <i class="icon-group"></i>
                            <span class="menu-text"> 分类管理 </span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url('Brand/index'); ?>">
                            <i class="icon-group"></i>
                            <span class="menu-text"> 品牌管理 </span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url('Goods/index'); ?>">
                            <i class="icon-group"></i>
                            <span class="menu-text"> 商品管理 </span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url('User/index'); ?>">
                            <i class="icon-group"></i>
                            <span class="menu-text"> 用户管理 </span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url('Order/evaluate'); ?>">
                            <i class="icon-group"></i>
                            <span class="menu-text"> 评价管理 </span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url('Order/index'); ?>">
                            <i class="icon-group"></i>
                            <span class="menu-text"> 订单管理 </span>
                        </a>
                    </li>
                  
                <?php endif; ?>
             


            </ul>
            <div class="sidebar-collapse" id="sidebar-collapse">
                <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
            </div>
        </div>

				<!-- 中间部分开始 -->
				<block name="content"></block>
			
			</div>

		</div><!-- /.main-container -->

		<!-- //加载公共js -->
		<script type="text/javascript">
		window.jQuery || document.write("<script src='/shop/public/admin/js/jquery-2.0.3.min.js'>"+"<"+"script>");
		</script>
		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='/shop/public/admin/js/jquery.mobile.custom.min.js'>"+"<"+"script>");
		</script>
		<script src="/shop/public/admin/js/bootstrap.min.js"></script>
		<script src="/shop/public/admin/js/ace-elements.min.js"></script>
		<script src="/shop/public/admin/js/ace.min.js"></script>
		<script src="/shop/public/admin/js/ace-extra.min.js"></script>
		<block name="privatejs"></block>
	</body>
</html>



		<block name="content">

				<!-- 中间部分开始 -->
				<div class="main-content">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<!-- 面包屑导航 -->
						<ul class="breadcrumb">
							<li>
								<i class="icon-home home-icon"></i>
								<a href="<?php echo url('Index/index'); ?>">首页</a>
							</li>
							<li class="active">添加商品</li>
						</ul><!-- .breadcrumb -->

					</div>

					<div class="page-content">

						<!-- 页面导航 -->
						<div class="page-header">
							<h1>
								添加商品<a class="btn btn-info btn-sm pull-right" href="<?php echo url('index'); ?>">
									<i class="icon-reply icon-only"></i>
								</a>
							</h1>
						</div>

						<div class="row" style="margin-top:35px;">
							<div class="col-xs-12">
								<form class="form-horizontal" role="form" action="<?php echo url('add'); ?>" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right"> 商品名称 </label>
										<div class="col-sm-10">
											<input class="col-xs-10 col-sm-5" placeholder="商品名称" type="text" name="name">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right"> 商品分类 </label>
										<div class="col-sm-10">
											<select name="tid">
												<?php if(is_array($tlist) || $tlist instanceof \think\Collection || $tlist instanceof \think\Paginator): if( count($tlist)==0 ) : echo "" ;else: foreach($tlist as $key=>$v): ?>
													<option value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>
												<?php endforeach; endif; else: echo "" ;endif; ?>
											</select>
											<!-- <input class="col-xs-10 col-sm-5" placeholder="商品名称" type="text" name="title"> -->
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right"> 品牌 </label>
										<div class="col-sm-10">
											<select name="bid">
												<?php if(is_array($blist) || $blist instanceof \think\Collection || $blist instanceof \think\Paginator): if( count($blist)==0 ) : echo "" ;else: foreach($blist as $key=>$v): ?>
													<option value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>
												<?php endforeach; endif; else: echo "" ;endif; ?>
											</select>
											<!-- <input class="col-xs-10 col-sm-5" placeholder="商品名称" type="text" name="title"> -->
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right"> 价格 </label>
										<div class="col-sm-10">
											<input class="col-xs-10 col-sm-5" placeholder="价格" type="text" name="price">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right"> 库存 </label>
										<div class="col-sm-10">
											<input class="col-xs-10 col-sm-5" placeholder="库存" type="text" name="nums">
										</div>
									</div>
									
									
									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right">图片 </label>
										<div class="col-sm-10">
											<input class="col-xs-10 col-sm-5" type="file" name="img">
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right"> 详情 </label>
										<div class="col-sm-10">
											<textarea name="details" id="details" cols="80" rows="7"></textarea>
										</div>
									</div>
									<div class="clearfix form-actions">
										<div class="col-md-offset-2 col-md-10">
											<button class="btn btn-info" type="submit">
												<i class="icon-ok bigger-110"></i>
												提交
											</button>

											&nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="icon-undo bigger-110"></i>
												重置
											</button>
										</div>
									</div>
								</form>
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div><!-- /.main-content -->
				<!-- 中间部分结束 -->

								
		</block>
		<block name="privatejs">
		<!-- inline scripts related to this page -->

		<script type="text/javascript">
			jQuery(function($) {

				//设置当前页面的菜单高亮显示 开始
				var nownav = "#sidebar a[href*=Teacher]";
				var parentattr = $(nownav).parent().parent().attr("class");
				$(nownav).parent().addClass('active');
				if (parentattr == 'submenu') {
					$(nownav).parent().parent().parent().addClass('active open');
				};
				//设置当前页面的菜单高亮显示 结束

			});
		</script>
		<link rel="stylesheet" href="/shop/public/kindeditor/themes/default/default.css" />
    <script charset="utf-8" src="/shop/public/kindeditor/kindeditor-min.js"></script>
    <script charset="utf-8" src="/shop/public/kindeditor/lang/zh_CN.js"></script>
    <script>
        var editor;
        KindEditor.ready(function(K) {
            editor = K.create('textarea[name="details"]', {
                allowFileManager : true
            });
            K('input[name=getHtml]').click(function(e) {
                alert(editor.html());
            });
            K('input[name=isEmpty]').click(function(e) {
                alert(editor.isEmpty());
            });
            K('input[name=getText]').click(function(e) {
                alert(editor.text());
            });
            K('input[name=selectedHtml]').click(function(e) {
                alert(editor.selectedHtml());
            });
            K('input[name=setHtml]').click(function(e) {
                editor.html('<h3>Hello KindEditor</h3>');
            });
            K('input[name=setText]').click(function(e) {
                editor.text('<h3>Hello KindEditor</h3>');
            });
            K('input[name=insertHtml]').click(function(e) {
                editor.insertHtml('<strong>插入HTML</strong>');
            });
            K('input[name=appendHtml]').click(function(e) {
                editor.appendHtml('<strong>添加HTML</strong>');
            });
            K('input[name=clear]').click(function(e) {
                editor.html('');
            });
        });
    </script>
	</block>

