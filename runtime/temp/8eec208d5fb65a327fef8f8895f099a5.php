<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:84:"C:\myphp_www\PHPTutorial\WWW./ResearchManage/application/index\view\index\index.html";i:1540804201;s:83:"C:\myphp_www\PHPTutorial\WWW\ResearchManage\application\index\view\public\base.html";i:1539847680;s:83:"C:\myphp_www\PHPTutorial\WWW\ResearchManage\application\index\view\public\meta.html";i:1539326641;s:85:"C:\myphp_www\PHPTutorial\WWW\ResearchManage\application\index\view\public\header.html";i:1540796153;s:85:"C:\myphp_www\PHPTutorial\WWW\ResearchManage\application\index\view\public\footer.html";i:1540089153;}*/ ?>
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



<title><?php echo (isset($title) && ($title !== '')?$title:'大数据学习交流组'); ?></title>
<meta name="keywords" content="<?php echo (isset($keywords) && ($keywords !== '')?$keywords:'页面关键字'); ?>">
<meta name="description" content="<?php echo (isset($desc) && ($desc !== '')?$desc:'页面描述'); ?>">
<style>
 #DataTables_Table_0 .sorting_1{
	background-color: #fef5f500;
 }
</style>

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



<div class="container" style="width: 960px;">
	<div class="row">
		<div class="MyPage cl">
			<div class="f-l">
				<img src="/static\img\mem.jpg" style="width: 100%; height: 90%" alt="响应式图片" class="img-responsive" \>
			</div>
			<div class="f-r">
				<div class="cl">
					<div class="title-l">
						<img src="/static\img\notice_icon.png" alt="响应式图片" class="info-title-img" \>
						最新消息
					</div>
					<span class="title-more">
					<a href="/index/news/news">
					更多<i class="Hui-iconfont">&#xe6d7;</i>
					</a>
					</span>
				</div>
				<div class="text-shadow">
					<marquee marquee width=420 scrollamount=5>
						<?php if(is_array($news_content_list) || $news_content_list instanceof \think\Collection || $news_content_list instanceof \think\Paginator): $i = 0; $__LIST__ = $news_content_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 4 );++$i;if($i < 1): ?>
							<span class="c-primary f-16">
							<?php elseif($i < 2): ?>
							<span class="c-success f-16">
							<?php elseif($i < 3): ?>
							<span class="c-error f-16">
							<?php elseif($i < 4): ?>
							<span class="c-666 f-16">
							<?php else: ?>
							<span class="c-orange f-16">
							<?php endif; ?>
								<?php echo $vo['content']; ?>&nbsp;&nbsp;&nbsp;&nbsp;
							</span>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</marquee>
					<ul>
						<?php if(is_array($news_list) || $news_list instanceof \think\Collection || $news_list instanceof \think\Paginator): $i = 0; $__LIST__ = $news_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<li style="list-style-type:none;margin-left: 0px;">    
							<span class="circle"></span>
							<strong><?php echo $vo['title']; ?></strong>
							<div style="float:right;"><?php echo substr($vo['updatetime'], 0, 10)?>  <br /></div>
							<div class="text-overflow" style="width:400px;margin: 0 0 0 20px;">
								<?php echo $vo['content']; ?>
							</div>
						</li>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="row mt-10">
		<div class="MyPage">
		<div style="background-color: white;">
			<div class="info-title">
				<img src="/static\img\survey-24.png" alt="响应式图片" class="info-title-img" \>
				研究方向
			</div>
			<div class="text-shadow">
			<div class="cont" id="info_cont1">
			<span class="c-primary">1、服务计算</span><br />
			<span class="c-333">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			服务计算是跨越计算机与信息技术、商业管理、商业质询服务等领域的一个新的学科，是应用面向服务架构(SOA)技术在消除商业服务与信息支撑技术之间的横沟方面的直接产物。研究内容包括：
			</br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1）服务计算的理论与方法、服务基础设施与理论、本体&互操作及其云计算相关技术；
			</br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2）服务业务流程个性化定制、个性化服务组合建模、按需服务选择、服务组合等方法。<br /><br />
			</span>
			<span class="c-primary">2、大数据分析</span><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
			<span class="c-333">			“大数据”作为时下最火热的技术，与数据仓库、数据安全、数据分析、数据挖掘技术相结合，成为当前的研究热点。适用于大数据的技术，包括大规模并行处理（MPP）数据库、数据挖掘电网、分布式文件系统、分布式数据库、云计算平台、互联网和可扩展的存储系统。研究内容包括：
			</br>&nbsp;&nbsp;&nbsp;&nbsp;
			1）研究数据存储，分布式计算，数据分析挖掘以及数据可视化等技术，解决企业在GB到PB级数据分析领域碰到的各种问题；
			</br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2）研究数据的持久化和冗余复制，实现数据自动检测和修复的容错功能；
			</br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3）研究支持细粒度访问控制、应用程序安全及数据加密及解密等技术。<br /><br />
			</span>
			<span class="c-primary">3、需求工程</span><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
			<span class="c-333">
			需求工程是指应用已证实有效的技术、方法进行需求分析，确定客户需求，帮助分析人员理解问题并定义目标系统的所有外部特征的一门学科。它通过合适的工具和记号系统地描述待开发系统及其行为特征和相关约束，形成需求文档，并对用户不断变化的需求演进给予支持。研究内容包括：
			</br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	1）借助于基于RGPS的领域建模技术，实现领域资产构造及其演化，为应用程序构造提供支持；
			</br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2）面向个性化用户需求的需求裁剪及其个性化流程定制；
			</br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3）满足个性化需求的Web服务推荐与组合。
			</span>
			</div>
			</div>
		</div>
		</div>
	</div>
	<div class="row mt-10">
		<div class="MyPage cl">
			<div class="f-l">
				<div class="info-title">
					<img src="/static\img\manager-24.png" alt="响应式图片" class="info-title-img" \>
					成员介绍
					<span class="title-more">
					<a href="/index/member/member">
					更多<i class="Hui-iconfont">&#xe6d7;</i>
					</a>
					</span>
				</div>
				<div class="text-shadow">
					<div class="silder_out" style="float:left;">
						<ul id="mem" class="mem" style="margin-top: 5px;">
							<li style="list-style: none;margin-bottom:10px;padding-top:0;padding-bottom:9px;">
								<a href="/index/member/personal.html?id=1" target="_blank">
								<img src="/static/img/member/y.jpg" class="user_img" style="border: 0px; width: 45px; height: 45px;">
								</a>
								<div title="欢迎访问我的学者主页" style="width: 380px;word-break: keep-all;color:#333;
								white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
								<a style="text-decoration: none;color:#333;" href="/index/member/personal.html?id=1" target="_blank">
								欢迎访问我的简介 </a>
								</div>
								<a style="text-decoration: none;color:#999;" href="/index/member/personal.html?id=1" target="_blank">
								余敦辉(Yu Dun Hui)</a>
							</li>
							<li style="list-style: none;margin-bottom:10px;padding-top:0;padding-bottom:9px;">
								<a href="/index/member/personal.html?id=3" target="_blank">
								<img src="/static/img/member/zhangxs.jpg" class="user_img" style="border: 0px; width: 45px; height: 45px;">
								</a>
								<div title="欢迎访问我的学者主页" style="width: 380px;word-break: keep-all;color:#333;
								white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
								<a style="text-decoration: none;color:#333;" href="/index/member/personal.html?id=3" target="_blank">

								欢迎访问我的简介 </a>
								</div>
								<a style="text-decoration: none;color:#999;" href="/index/member/personal.html?id=3" target="_blank">
								张兴盛(Zhang Xing Sheng)</a>
							</li>
							<li style="list-style: none;margin-bottom:10px;padding-top:0;padding-bottom:9px;">
								<a href="/index/member/personal.html?id=4" target="_blank">
								<img src="/static/img/member/wus.jpg" class="user_img" style="border: 0px; width: 45px; height: 45px;">
								</a>
								<div title="欢迎访问我的学者主页" style="width: 380px;word-break: keep-all;color:#333;
								white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
								<a style="text-decoration: none;color:#333;" href="/index/member/personal.html?id=4" target="_blank">

								欢迎访问我的简介 </a>
								</div>
								<a style="text-decoration: none;color:#999;" href="/index/member/personal.html?id=4" target="_blank">
								吴珊(Wu Shan)</a>
							</li>
							<li style="list-style: none;margin-bottom:10px;padding-top:0;padding-bottom:9px;">
								<a href="/index/member/personal.html?id=5" target="_blank">
								<img src="/static/img/member/wangcx.jpg" class="user_img" style="border: 0px; width: 45px; height: 45px;">
								</a>
								<div title="欢迎访问我的学者主页" style="width: 380px;word-break: keep-all;color:#333;
								white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
								<a style="text-decoration: none;color:#333;" href="/index/member/personal.html?id=5" target="_blank">
								欢迎访问我的简介 </a>
								</div>
								<a style="text-decoration: none;color:#999;" href="/index/member/personal.html?id=5" target="_blank">
								王晨旭(Wang Chen Xu)</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="f-r">
				<div class="info-title">
					<img src="/static\img\voice_presentation-24.png" alt="响应式图片" class="info-title-img" \>
					成员动态
					<span class="title-more">
					<a href="/index/dynamic/dynamic">
					更多<i class="Hui-iconfont">&#xe6d7;</i>
					</a>
					</span>
				</div>
				<div class="text-shadow">
					<ul>
					<?php if(is_array($dynamic_list) || $dynamic_list instanceof \think\Collection || $dynamic_list instanceof \think\Paginator): $i = 0; $__LIST__ = $dynamic_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<li style="list-style-type:none;margin-left: 0px;">    
						<div class="text-overflow" style="width:400px;">
							<span class="circle"></span><strong><?php echo $vo['content']; ?></strong>
						</div>
						&nbsp&nbsp&nbsp<?php echo $vo['name']; ?>&nbsp&nbsp&nbsp<?php echo substr($vo['time'], 0, 10)?>
					</li>
					<?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="row mt-10">
		<div class="MyPage">
		<div style="background-color: white;">
			<div class="info-title">
				<img src="/static\img\link-24.png" alt="响应式图片" class="info-title-img" \>
				相关链接
				<span class="title-more">
				<a href="/index/links/links">
				更多<i class="Hui-iconfont">&#xe6d7;</i>
				</a>
				</span>
			</div>
			<div class="text-shadow">
				<div class="cont">
					<div class="name" style="width:460px;">
						<span class="circle"></span>
						<a href="http://ees.elsevier.com/jss/" title="http://www.scholat.com/team/ISST" target="_blank">
						JOURNAL OF SYSTEMS AND SOFTWARE
						</a>
					</div>
					<div class="name" style="width:460px;">
						<span class="circle"></span>
						<a href="https://mc.manuscriptcentral.com/sw-cs" title="http://www.scholat.com/team/scholatTeam" target="_blank">
						IEEE SOFTWARE
						</a>
					</div>
					<div class="name" style="width:460px;">
						<span class="circle"></span>
						<a href="https://mc.manuscriptcentral.com/ic-cs" title="http://www.scholat.com/team/GDCATCCC" target="_blank">
						IEEE INTERNET COMPUT
						</a>
					</div>
					<div class="name" style="width:460px;">
						<span class="circle"></span>
						<a href="https://mc.manuscriptcentral.com/hepfcs" title="http://www.scholat.com/team/GDCATCCC" target="_blank">
						Frontiers of Computer Science
						</a>
					</div>
					<div style="clear:both;"></div>
				</div>
			</div>
		</div>
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


<script type="text/javascript">
$('.table-sort').dataTable({
	"aaSorting": [[ 0, "desc" ]],//默认第几个排序
	"bStateSave": false,//状态保存
	"searching": false,//是否显示查询
    "lengthChange": false,//是否使用下位列表选择分页大小
	"iDisplayLength": 3,
	"bInfo" : false, // 是否显示左下角记录数
});
</script>

</body>
</html>