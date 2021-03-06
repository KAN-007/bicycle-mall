<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:62:"G:\Adobe\phpStudy\WWW\shop/application/index\view\i\index.html";i:1552115173;s:61:"G:\Adobe\phpStudy\WWW\shop\application\index\view\I\base.html";i:1574689670;s:64:"G:\Adobe\phpStudy\WWW\shop\application\index\view\I\sidebar.html";i:1552115219;}*/ ?>
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
    <div class="main-content">
        <div class="breadcrumbs" id="breadcrumbs">
            <!-- 面包屑导航 -->
            <ul class="breadcrumb">
                <li>
                    <i class="icon-home home-icon"></i>
                    <a href="<?php echo url('Index/index'); ?>">首页</a>
                </li>
                <li class="active">控制台</li>
            </ul>
        </div>

        
        <div class="page-content">
            <!-- 页面标题 -->
            <div class="page-header">
                <h1>
                    控制台
                    <small>
                        <i class="icon-double-angle-right"></i>
                         查看
                    </small>
                </h1>
            </div>

            <div class="row">
                <div class="col-xs-12">                    
                    <h3 class="header smaller lighter blue">快捷操作</h3>
                    <p>
                        <a class="btn btn-app btn-default no-radius" href="<?php echo url('I/information'); ?>">
                            <i class="icon-group bigger-230"></i>
                            个人信息
                        </a>
                        <a class="btn btn-app btn-default no-radius" href="<?php echo url('Order/index'); ?>">
                            <i class="icon-group bigger-230"></i>
                            订单管理
                        </a>
                        <a class="btn btn-app btn-default no-radius" href="<?php echo url('Order/evaluate'); ?>">
                            <i class="icon-group bigger-230"></i>
                            我的评价
                        </a>
                    </p>

                </div>
            </div>
        </div>
    </div>
</block>
<block name="privatejs">
    <script src="/shop/public/admin/js/jquery.slimscroll.min.js"></script>
    <script src="/shop/public/admin/js/jquery.easy-pie-chart.min.js"></script>
    <script src="/shop/public/admin/js/jquery.sparkline.min.js"></script>
    <script src="/shop/public/admin/js/flot/jquery.flot.min.js"></script>
    <script src="/shop/public/admin/js/flot/jquery.flot.pie.min.js"></script>
    <script src="/shop/public/admin/js/flot/jquery.flot.resize.min.js"></script>
    <script type="text/javascript">
        jQuery(function($) {
            //设置当前页面的菜单高亮显示 开始
            var nownav = "#indexpage";
            var parentattr = $(nownav).parent().parent().attr("class");
            $(nownav).parent().addClass('active');
            if (parentattr == 'submenu') {
                $(nownav).parent().parent().parent().addClass('active open');
            };
            //设置当前页面的菜单高亮显示 结束

            //首页展示效果js
            $('.easy-pie-chart.percentage').each(function(){
                var $box = $(this).closest('.infobox');
                var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
                var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
                var size = parseInt($(this).data('size')) || 50;
                $(this).easyPieChart({
                    barColor: barColor,
                    trackColor: trackColor,
                    scaleColor: false,
                    lineCap: 'butt',
                    lineWidth: parseInt(size/10),
                    animate: /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase()) ? false : 1000,
                    size: size
                });
            })
        
            $('.sparkline').each(function(){
                var $box = $(this).closest('.infobox');
                var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
                $(this).sparkline('html', {tagValuesAttribute:'data-values', type: 'bar', barColor: barColor , chartRangeMin:$(this).data('min') || 0} );
            });
        
            var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
            var data = [
                { label: "social networks",  data: 38.7, color: "#68BC31"},
                { label: "search engines",  data: 24.5, color: "#2091CF"},
                { label: "ad campaigns",  data: 8.2, color: "#AF4E96"},
                { label: "direct traffic",  data: 18.6, color: "#DA5430"},
                { label: "other",  data: 10, color: "#FEE074"}
            ]

            function drawPieChart(placeholder, data, position) {
                $.plot(placeholder, data, {
                    series: {
                        pie: {
                            show: true,
                            tilt:0.8,
                            highlight: {
                                opacity: 0.25
                            },
                            stroke: {
                                color: '#fff',
                                width: 2
                            },
                            startAngle: 2
                        }
                    },
                    legend: {
                        show: true,
                        position: position || "ne", 
                        labelBoxBorderColor: null,
                        margin:[-30,15]
                    }
                    ,
                    grid: {
                        hoverable: true,
                        clickable: true
                    }
                })
            }
            drawPieChart(placeholder, data);

            placeholder.data('chart', data);
            placeholder.data('draw', drawPieChart);
        
        
        
          var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
          var previousPoint = null;
        
            placeholder.on('plothover', function (event, pos, item) {
                if(item) {
                    if (previousPoint != item.seriesIndex) {
                        previousPoint = item.seriesIndex;
                        var tip = item.series['label'] + " : " + item.series['percent']+'%';
                        $tooltip.show().children(0).text(tip);
                    }
                    $tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
                } else {
                    $tooltip.hide();
                    previousPoint = null;
                }

            }); 
        
            var d1 = [];
            for (var i = 0; i < Math.PI * 2; i += 0.5) {
                d1.push([i, Math.sin(i)]);
            }
        
            var d2 = [];
            for (var i = 0; i < Math.PI * 2; i += 0.5) {
                d2.push([i, Math.cos(i)]);
            }
        
            var d3 = [];
            for (var i = 0; i < Math.PI * 2; i += 0.2) {
                d3.push([i, Math.tan(i)]);
            }
        });
    </script>
</block>