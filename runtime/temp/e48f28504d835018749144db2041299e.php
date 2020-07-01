<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:58:"F:\wamp\www\shop/application/index\view\i\information.html";i:1552112892;s:51:"F:\wamp\www\shop\application\index\view\I\base.html";i:1552113872;s:54:"F:\wamp\www\shop\application\index\view\I\sidebar.html";i:1552115219;}*/ ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title><?php echo $title; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!-- basic styles -->
		<link rel="stylesheet" href="/shop/public/admin/css/bootstrap.min.css" />
		<link rel="stylesheet" href="/shop/public/admin/css/font-awesome.min.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="/shop/public/admin/css/ace.min.css" />
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
									<?php echo $UNAME; ?>
								</span>

								<i class="icon-caret-down"></i>
							</a>

							<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="<?php echo url('I/upPass'); ?>">
										<i class="icon-cog"></i>
										修改密码
									</a>
								</li>
								<li class="divider"></li>

								<li>
									<a href="<?php echo url('I/logOut'); ?>">
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
                    <a id="indexpage" href="<?php echo url('I/index'); ?>">
                        <i class="icon-dashboard"></i>
                        <span class="menu-text"> 控制台 </span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo url('I/information'); ?>">
                        <i class="icon-group"></i>
                        <span class="menu-text"> 个人信息 </span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo url('Order/index'); ?>">
                        <i class="icon-group"></i>
                        <span class="menu-text"> 订单管理 </span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo url('Order/evaluate'); ?>">
                        <i class="icon-group"></i>
                        <span class="menu-text"> 我的评价 </span>
                    </a>
                </li>
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
							<li class="active">个人信息</li>
						</ul><!-- .breadcrumb -->
					</div>

					<div class="page-content">
						<!-- 页面导航 -->
						<div class="page-header">
							<h1>
								个人信息
							</h1>
						</div>

						<div class="row" style="margin-top:35px;">
							<div class="col-xs-12">
								<form class="form-horizontal" role="form" action="<?php echo url('saveInformation'); ?>" method="post" enctype="multipart/form-data">
									<input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right"> 用户账号 </label>
										<div class="col-sm-10">
											<?php echo $data['name']; ?>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right"> 收货人名称 </label>
										<div class="col-sm-10">
											<input class="col-xs-10 col-sm-5" type="text"  name="realname" value="<?php echo $data['realname']; ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right"> 收货地址 </label>
										<div class="col-sm-10">
											<input class="col-xs-10 col-sm-5" type="text" name="address" value="<?php echo $data['address']; ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right"> 联系电话 </label>
										<div class="col-sm-10">
											<input class="col-xs-10 col-sm-5" type="text" name="tel" value="<?php echo $data['tel']; ?>">
										</div>
									</div>

									<div class="clearfix form-actions">
										<div class="col-md-offset-2 col-md-10">
											<button class="btn btn-info" type="submit">
												<i class="icon-ok bigger-110"></i>
												保存
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
	</block>
	<block name="privatejs">

		<!-- inline scripts related to this page -->

		<script type="text/javascript">
			jQuery(function($) {

				//设置当前页面的菜单高亮显示 开始
				var nownav = "#sidebar a[href*=Websetting]";
				var parentattr = $(nownav).parent().parent().attr("class");
				$(nownav).parent().addClass('active');
				if (parentattr == 'submenu') {
					$(nownav).parent().parent().parent().addClass('active open');
				};
				//设置当前页面的菜单高亮显示 结束
				$('#id-input-file-2').ace_file_input({
					no_file:'选择广告图片 ...',
					btn_choose:'上传',
					btn_change:'修改',
					droppable:false,
					onchange:null,
					thumbnail:false //| true | large
					//whitelist:'gif|png|jpg|jpeg'
					//blacklist:'exe|php'
					//onchange:''
					//
				});				
			
				//文件上传
				$('#id-file-format').removeAttr('checked').on('change', function() {
					var before_change
					var btn_choose
					var no_icon
					if(this.checked) {
						btn_choose = "Drop images here or click to choose";
						no_icon = "icon-picture";
						before_change = function(files, dropped) {
							var allowed_files = [];
							for(var i = 0 ; i < files.length; i++) {
								var file = files[i];
								if(typeof file === "string") {
									//IE8 and browsers that don't support File Object
									if(! (/\.(jpe?g|png|gif|bmp)$/i).test(file) ) return false;
								}
								else {
									var type = $.trim(file.type);
									if( ( type.length > 0 && ! (/^image\/(jpe?g|png|gif|bmp)$/i).test(type) )
											|| ( type.length == 0 && ! (/\.(jpe?g|png|gif|bmp)$/i).test(file.name) )//for android's default browser which gives an empty string for file.type
										) continue;//not an image so don't keep this file
								}
								
								allowed_files.push(file);
							}
							if(allowed_files.length == 0) return false;
			
							return allowed_files;
						}
					}
					else {
						btn_choose = "Drop files here or click to choose";
						no_icon = "icon-cloud-upload";
						before_change = function(files, dropped) {
							return files;
						}
					}
					var file_input = $('#id-input-file-3');
					file_input.ace_file_input('update_settings', {'before_change':before_change, 'btn_choose': btn_choose, 'no_icon':no_icon})
					file_input.ace_file_input('reset_input');
				});

			});
		</script>
</block>

