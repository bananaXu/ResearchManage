<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:92:"D:\myphp_www\PHPTutorial\WWW\pt5\public/../application/index\view\production\production.html";i:1540795819;s:72:"D:\myphp_www\PHPTutorial\WWW\pt5\application\index\view\public\base.html";i:1539847680;s:72:"D:\myphp_www\PHPTutorial\WWW\pt5\application\index\view\public\meta.html";i:1539326641;s:74:"D:\myphp_www\PHPTutorial\WWW\pt5\application\index\view\public\header.html";i:1540796153;s:74:"D:\myphp_www\PHPTutorial\WWW\pt5\application\index\view\public\footer.html";i:1540089153;}*/ ?>
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



<title><?php echo (isset($title) && ($title !== '')?$title:'研究成果'); ?></title>
<meta name="keywords" content="<?php echo (isset($keywords) && ($keywords !== '')?$keywords:'页面关键字'); ?>">
<meta name="description" content="<?php echo (isset($desc) && ($desc !== '')?$desc:'页面描述'); ?>">

</head>
<body>


<!-- header begins -->
<header class="navbar-wrapper">
	<div class="navbar navbar-fixed-top" style="background-color: #399">
		<div class="container cl" style="width: 960px;">
			<span class="logo navbar-logo f-l mr-10 hidden-xs">实验室门户网站</span>
			<a class="logo navbar-logo-m f-l mr-10 visible-xs" href="/aboutHui.shtml">H-ui</a>
			<span class="logo navbar-slogan f-l mr-10 hidden-xs">方便 &middot; 快捷 &middot; 为团队服务</span>
			<a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
			<nav class="nav navbar-nav nav-collapse" role="navigation" id="Hui-navbar">
				<ul class="cl">
					<li><a href="/">首页</a></li>
					<?php if(\think\Session::get('user_info.name') == ''): ?>
					<li class="f-r"><a href="/admin/user/login.html" id="loginHref" style="color: white; margin-right: 15px;" target="_self" title="用户登录">Login</a></li>
					<?php else: ?>
					<li><a href="http://www.comm.com" target="_blank">交流中心</a></li>
					<li class="f-r">欢迎&nbsp;&nbsp;<span style="color: #292421;"><?php echo \think\Session::get('user_info.name'); ?></span> <a href="<?php echo url('/admin/user/logout'); ?>" id="loginHref" style="color: white; margin-right: 15px;" target="_self" title="注销登录">Logout</a></li>
					<?php endif; ?>
				</ul>
			</nav>
			<nav class="navbar-userbar hidden-xs">
				
			</nav>
		</div>
	</div>
</header>
<div class="container" style="width: 960px;">
	<div class="row">
		<div class="theme_contentPic" style="margin-top:5px; padding-top: 20px;padding-left: 10px;width: 960px;height: 250px;background: url('/static/img/head_bgd.png') no-repeat;">
			<img src="/static/img/world.jpg" width="160px" height="160px" class="round" style="margin-left:380px;">
			<div class="theme_contentTitle" style="margin-top:5px;+margin-top:20px;">
				<div style="text-align: center;" title="社会计算研究组(Special Interest Group on Social Computing, SIGSC) " id="theme_contentName">
					大数据学习交流组(Big Data Learning And Communication Group, BDLACG) 
				</div>
				<div style="text-align: center; margin-top: 10px;padding-bottom:16px;color:#333;font-size:14px;background-color:#fff">
					120.79.145.100
				</div>
			</div>
		</div>
	</div>
	<div class="row mt-10">
		<div class="new_menu">
			<div id="toTop"></div>
			<div class="teamPanel_container">
				<div><a href="/index/index/index.html">首页</a></div>
				<div><a href="/index/member/member.html">成员介绍</a></div>
				<div><a href="/index/production/production.html">成果展示</a></div>
				<?php if(\think\Session::get('user_info.name') != ''): ?>
				<div><a href="/index/task/task.html">任务管理</a></div>
				<div><a href="/index/download/download.html">资源共享</a></div>
				<div><a href="/index/links/links.html">相关链接</a></div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<!-- header ends -->



<div class="container" style="width: 960px; background-color: white; min-height: 600px;">
	<div class="MyPage">
		<div class="mt-15">
			<h5>Recent publications (2018 – present)</h5>
			<p><a href="#2019">2019</a>/<a href="#2018">2018</a>/<br></p>
			<p><span style="font-family: Arial;"><span style="color: #808080;"><span style="font-size: 200%;"><strong><a name="2019"></a>2019</strong></span></span></span></p>
			<ul>
				<li>付聪, 余敦辉, 张灵莉. 面向中文敏感词变形体的识别方法研究[J]. 计算机应用研究, 2019(4).</li>
				<li>周壮, 余敦辉, 张万山, 王意. 基于活跃时间分组的软件众包工人选择机制[J]. 计算机应用, 2019</li>
				<li>王芳, 余敦辉, 张万山. 基于局部划分的匿名算法研究[J/OL]. 2019, 36(11)</li>
			</ul>
			<p><span style="font-family: Arial;"><span style="color: #808080;"><span style="font-size: 200%;"><strong><a name="2018"></a>2018</strong></span></span></span></p>
			<ul>
			<li>余敦辉, 张灵莉, 付聪. 基于动态效用的时空众包在线任务分配[J]. 电子与信息学报, 2018(7). </li>
			<li>赵焜松, 余敦辉, 张万山. 软件众包任务发布优先级计算方法[J]. 计算机应用, 2018, 38(7):2032-2036.</li>
			<li>余敦辉, 王意, 张万山. 软件众包工人能力动态度量算法[J]. 计算机应用, 2018.</li>
			</ul>
			<p class="to_top">[ <a href="#top">回顶部</a> ]</p>
			<br class="clear">
		</div>
	</div>
</div>


<!--_footer 作为公共模版分离出去-->
<footer class="footer mt-20">
	<div class="container-fluid">
		<nav> <a href="#" target="_blank">关于我们</a> <span class="pipe">|</span> <a href="#" target="_blank">联系我们</a> <span class="pipe">|</span> <a href="#" target="_blank">法律声明</a> </nav>
		<p>Copyright &copy;2016 H-ui.net All Rights Reserved. <br>
			<a href="http://www.miitbeian.gov.cn/" target="_blank" rel="nofollow">京ICP备1000000号</a><br>
		</p>
	</div>
</footer>
<script type="text/javascript" src="/static/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/static/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/static/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="/static/static/h-ui.admin/js/H-ui.admin.page.js"></script> 
<script type="text/javascript" src="/static/static/h-ui/js/main.js"></script> 
<script type="text/javascript" src="/static/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/static/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/static/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript" src="/static/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript" src="/static/lib/jquery.media/jquery.media.js"></script>
<!--/_footer /作为公共模版分离出去-->



</body>
</html>