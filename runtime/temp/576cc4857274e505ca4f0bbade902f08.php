<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:60:"G:\Adobe\phpStudy\WWW\shop/admin/index\view\brand\index.html";i:1551946515;s:59:"G:\Adobe\phpStudy\WWW\shop\admin\index\view\Index\base.html";i:1574690675;s:62:"G:\Adobe\phpStudy\WWW\shop\admin\index\view\Index\sidebar.html";i:1552017340;}*/ ?>
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
                            <li class="active">品牌管理</li>
                        </ul><!-- .breadcrumb -->

                    </div>

                    <div class="page-content">

                        <!-- 页面导航 -->
                        <div class="page-header">
                            <h1>
                                品牌管理
                                <small>
                                    <i class="icon-double-angle-right"></i>
                                     查看
                                </small>
                            </h1>
                        </div>

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="table-responsive">
                <div class="row" style="padding:0px;height:auto;overflow:hidden;margin-bottom:10px;">
                                <div class="col-xs-12 col-sm-8">
                                <a class="btn btn-primary pull-left" style="padding:1px 10px;" href="<?php echo url('insert'); ?>">
                                    <i class="icon-plus-sign bigger-125"></i>
                                    添加品牌
                                </a>
                            </div>

                </div><!--搜索结束-->
                                        <div class="table-responsive">
                                            <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="center">id</th>
                                                        <th class="center">品牌名称</th>
                                                        <th class="center">logo</th>
                                                        <th class="center">添加时间</th>
                                                        <th class="center">排序</th>
                                                        <th class="center">操作</th>
                                                    </tr>
                                                </thead>
                                                <!--一行的开始-->
                                                <!--遍历查询到的数据-->
                                                <?php if(is_array($user) || $user instanceof \think\Collection || $user instanceof \think\Paginator): if( count($user)==0 ) : echo "" ;else: foreach($user as $key=>$v): ?>
                                                <tbody>
                                                    <tr>
                                                        <td class="center"><?php echo $v['id']; ?></td>
                                                        <td class="center"><?php echo $v['name']; ?></td>
                                                        <td class="center"><img src="/shop/public/<?php echo $v['img']; ?>" alt="" style="width:50px;height:50px;"></td>
                                                        <td class="center"><?php echo $v['add_time']; ?></td>
                                                        <td class="center"><?php echo $v['order']; ?></td>
                                                        <td class="center">
                                                            <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
                                                                <a class="green" href="<?php echo url('mod',['id'=>$v['id']]); ?>">
                                                                    <i class="icon-pencil bigger-130"></i>
                                                                </a>
                                                                <a name="del_<?php echo $v['id']; ?>" class="red" data-toggle="modal" href="#deleteModal">
                                                                    <i class="icon-trash bigger-130"></i>
                                                                </a>
                                                            </div>

                                                            <div class="visible-xs visible-sm hidden-md hidden-lg">
                                                                <div class="inline position-relative">
                                                                    <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
                                                                        <i class="icon-caret-down icon-only bigger-120"></i>
                                                                    </button>

                                                                    <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
                                                                        <li>
                                                                            <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
                                                                                <span class="blue">
                                                                                    <i class="icon-zoom-in bigger-120"></i>
                                                                                </span>
                                                                            </a>
                                                                        </li>

                                                                        <li>
                                                                            <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
                                                                                <span class="green">
                                                                                    <i class="icon-edit bigger-120"></i>
                                                                                </span>
                                                                            </a>
                                                                        </li>


                                                                        <li>
                                                                            <a href="#" class="tooltip-error" title="Delete">
                                                                                <span class="red">
                                                                                    <i class="icon-trash bigger-120"></i>
                                                                                </span>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <!--遍历结束-->
                                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                                    <tr>
                                                        <td colspan=11><?php echo $user->render(); ?></td>
                                                    </tr>
                                                    <!--一行的结束-->

                                                    
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- PAGE CONTENT ENDS -->
                            <!--</div>--><!-- /.col -->
                        <!--</div>--><!-- /.row -->
                    <!--</div>--><!-- /.page-content -->
                <!--</div>--><!-- /.main-content -->
                 <!-- 删除按钮弹出层 -->
                <div class="modal modal-small fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog" style="width:300px;">
                        <div class="modal-content" style="top:160px;left:80%;">
                            <div class="modal-header" style="height:40px;padding:5px 10px;line-height:30px;">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <p class="bigger-120" id="myModalLabel">删除数据</p>
                            </div>
                            <div class="modal-body" style="height:70px;padding:5px 10px;line-height:60px;">
                                <p class="text-danger bigger-150">确定删除数据！</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-danger" id="delete-data">删除</button>
                                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">取消</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                <div id="success-info" class="alert alert-success fade in col-xs-4 hide" style="position:fixed;top:20px;left:35%;z-index:1000;">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <strong></strong>
            </div>
            <div id="error-info" class="alert alert-danger fade in col-xs-4 hide" style="position:fixed;top:20px;left:35%;z-index:1000;">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <strong></strong>
            </div>
            <!-- 删除按钮弹出层结束 -->
                
            
                
            </block>
<block name="privatejs">
        <!-- inline scripts related to this page -->
        
    <script type="text/javascript">
                    jQuery(function($) {

                    //设置当前页面的菜单高亮显示 开始
                    var nownav = "#sidebar a[href*=Kejian]";
                    var parentattr = $(nownav).parent().parent().attr("class");
                    $(nownav).parent().addClass('active');
                    if (parentattr == 'submenu') {
                    $(nownav).parent().parent().parent().addClass('active open');
                    };
                    //设置当前页面的菜单高亮显示 结束

                    //全选js
                    $('table th input:checkbox').on('click' , function(){
                        var that = this;
                        $(this).closest('table').find('tr > td:first-child input:checkbox')
                        .each(function(){
                        this.checked = that.checked;
                        $(this).closest('tr').toggleClass('selected');
                    });

                    });

                    var delid;
                    var delline;
                    $('a[name^=del]').on('click',function(){
                        delid = ($(this).attr('name').split('_'))[1];
                        delline = $(this).parent().parent().parent();
                    });

                    $('#delete-data').on('click',function(){
                    $.ajax({
                        url:"<?php echo url('del'); ?>",
                        type:"get",
                        data:{uid:delid},
                        success:function(data){
                            if (data == 1) {
                                warningInfo("#success-info","删除成功！");
                                location.href='';
                            }else if(data == 2){
                                warningInfo("#error-info","没有删除权限！");
                            }else{
                                warningInfo("#error-info","删除失败！");
                            }
                            $('#deleteModal').modal('hide');
                       }
                });
            });
             //信息提示函数
            function warningInfo(id,info){
                    $(id).removeClass('hide');
                    $(id).fadeOut(0);
                    $(id).children().eq(1).html(info);
                    $(id).fadeToggle(0).delay(1000).fadeToggle(1000);
                }

                });
    </script>
</block>

