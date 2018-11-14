<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:81:"D:\myphp_www\PHPTutorial\WWW\pt5\public/../application/test\view\index\index.html";i:1539831058;s:71:"D:\myphp_www\PHPTutorial\WWW\pt5\application\test\view\public\base.html";i:1539780000;s:71:"D:\myphp_www\PHPTutorial\WWW\pt5\application\test\view\public\meta.html";i:1539326641;s:73:"D:\myphp_www\PHPTutorial\WWW\pt5\application\test\view\public\header.html";i:1539846513;s:73:"D:\myphp_www\PHPTutorial\WWW\pt5\application\test\view\public\footer.html";i:1539847084;}*/ ?>
<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="favicon.ico" >
<link rel="Shortcut Icon" href="favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<!-- <link rel="stylesheet" href="/static/lib/bootstrap/css/bootstrap.min.css"> -->
<script src="/static/lib/jquery/1.9.1/jquery.min.js"></script>
<script src="/static/lib/bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="/static/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/static/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/static/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/static/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/static/static/h-ui.admin/css/style.css" />
<link rel="stylesheet" type="text/css" href="/static/static/style.css" />
<link rel="stylesheet" type="text/css" href="/static/static/animate.min.css" />
<link rel="stylesheet" type="text/css" href="/static/static/animate-text.css" />
<link href="/static/static/styles.css" rel="stylesheet" type="text/css" />
<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<!--/meta 作为公共模版分离出去-->



<title><?php echo (isset($title) && ($title !== '')?$title:'页面标题'); ?></title>
<meta name="keywords" content="<?php echo (isset($keywords) && ($keywords !== '')?$keywords:'页面关键字'); ?>">
<meta name="description" content="<?php echo (isset($desc) && ($desc !== '')?$desc:'页面描述'); ?>">

</head>
<body>


<!-- header begins -->
<header class="navbar-wrapper">
	<div class="navbar navbar-fixed-top" style="background-color: #399">
		<div class="container cl">
			<a class="logo navbar-logo f-l mr-10 hidden-xs" href="/aboutHui.shtml">H-ui前端框架</a>
			<a class="logo navbar-logo-m f-l mr-10 visible-xs" href="/aboutHui.shtml">H-ui</a>
			<span class="logo navbar-slogan f-l mr-10 hidden-xs">简单 &middot; 免费 &middot; 适合中国网站</span>
			<a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
			<nav class="nav navbar-nav nav-collapse" role="navigation" id="Hui-navbar">
				<ul class="cl">
					<li class="current"><a href="/">首页</a></li>
					<li><a href="#">核心</a></li>
					<li><a href="#">扩展</a></li>
					<li class="dropDown dropDown_hover"><a href="#" class="dropDown_A">一级导航 <i class="Hui-iconfont">&#xe6d5;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="#">二级导航</a></li>
							<li><a href="#">二级导航<i class="arrow Hui-iconfont">&#xe6d7;</i></a>
								<ul class="menu">
									<li><a href="javascript:;">三级菜单<i class="arrow Hui-iconfont">&#xe6d7;</i></a>
										<ul class="menu">
											<li><a href="javascript:;">四级菜单</a></li>
											<li><a href="javascript:;">四级菜单</a></li>
											<li><a href="javascript:;">四级菜单</a></li>
										</ul>
									</li>
									<li><a href="#">三级导航</a></li>
								</ul>
							</li>
							<li><a href="#">二级导航</a></li>
							<li class="disabled"><a href="javascript:;">二级菜单</a></li>
						</ul>
					</li>
					<li><a href="#">联系我们</a></li>
				</ul>
			</nav>
			<nav class="navbar-userbar hidden-xs">
				
			</nav>
		</div>
	</div>
</header>
<body>
	<div class="container" style="width: 960px;">
		<div class="row">
			<div class="text-c mt-10">
				<img src="/static\img\head_bgd.png" alt="响应式图片" class="img-responsive" \>
			</div>
		</div>
		<div class="row mt-10">
			<div class="new_menu">
				<div class="teamPanel_container">
					<div><a href="#">首页</a></div>
					<div><a href="#">首页</a></div>
					<div><a href="#">首页</a></div>
					<div><a href="#">首页</a></div>
					<div><a href="#">首页</a></div>
					<div><a href="#">首页</a></div>
				</div>
			</div>
		</div>
	</div>
	

<!-- header ends -->





<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/static/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/static/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/static/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="/static/static/h-ui.admin/js/H-ui.admin.page.js"></script> 
<script type="text/javascript" src="/static/static/h-ui/js/main.js"></script> 
<script type="text/javascript" src="/static/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/static/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/static/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript" src="/static/lib/laypage/1.2/laypage.js"></script>
<!--/_footer /作为公共模版分离出去-->




</body>
</html>