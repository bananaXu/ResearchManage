<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:97:"C:\myphp_www\PHPTutorial\WWW\ResearchManage\public/../application/index\view\member\personal.html";i:1540795691;s:83:"C:\myphp_www\PHPTutorial\WWW\ResearchManage\application\index\view\public\base.html";i:1539847680;s:83:"C:\myphp_www\PHPTutorial\WWW\ResearchManage\application\index\view\public\meta.html";i:1539326641;s:85:"C:\myphp_www\PHPTutorial\WWW\ResearchManage\application\index\view\public\footer.html";i:1540963913;}*/ ?>
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



<title><?php echo (isset($title) && ($title !== '')?$title:'成员介绍'); ?></title>
<meta name="keywords" content="<?php echo (isset($keywords) && ($keywords !== '')?$keywords:'页面关键字'); ?>">
<meta name="description" content="<?php echo (isset($desc) && ($desc !== '')?$desc:'页面描述'); ?>">

</head>
<body>


<header class="navbar-wrapper" style="height: 25px;">
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



<div id="mainbody">
	<div id="topHeadBar">
		<div style="margin-left:38px; margin-top:18px;height:202px;">
			<div id="diviconcorner" style="position:absolute;margin-top:-18px;margin-left:-38px;display:none;">
				<img id="imgiconcorner">
			</div>
			<div style="float:left;">
			<img class="profilePicture" id="imgavataricon" src="/static/img/member/<?php echo $member_list['photoname']; ?>">
			</div>
			<div style="width: 480px; margin: 7px 0 0 270px;">
				<div class="controlLength">
				<span class="scholarName" id="scholarChName" style="font-size: 24px;" title="<?php echo $member_list['name']; ?>"><?php echo $member_list['name']; ?>
				</span>
				<span class="scholarName" id="scholarEngName" style="font-size: 20px;margin-left:14px;" title="<?php echo $member_list['spell']; ?>">
					<?php echo $member_list['spell']; ?>&nbsp;&nbsp;&nbsp;<?php if($member_list['sex'] == 0): ?><img src="/static\img\man.png" alt="响应式图片" class="info-title-img" \><?php else: ?><img src="/static\img\woman.png" alt="响应式图片" class="info-title-img" \><?php endif; ?>
				</span>
					<div id="topHeadBar_icon" style="margin-left: 45px;"></div>
				</div>
				<p class="controlLength" id="controlScholarworkTitle">
					<img src="/static/img/scholarName_icon.png">
					<span title="<?php echo $member_list['grade']; ?>" id="scholarTitleTitle" style="max-height: 56px"><?php echo $member_list['grade']; ?></span>
				</p>
				<p class="controlLength" id="controlScholarwork">
					<img src="/static/img/workUnit_icon.png">
					<span id="scholarwork" title="湖北大学 &nbsp; 计算机学院">
						<span id="workUnit" title="湖北大学"" target="_blank">
							湖北大学
						</span>
						<span id="department" title="计算机学院" target="_blank">
						计算机学院
						</span>
					</span>
				</p>
				<div class="div1">
					<img src="/static/img/address_icon.png" style="margin-top:-4px;margin-right:4px;">
					<span title="联系方式" href="" style="height: 28px; font-size: 16px; color: #000;">
					<span><?php echo $member_list['contact']; ?></span>
					</span>
				</div>
			</div>
		</div>
		<div style="opacity:0.9;float:right;margin-right:60px;margin-top:-190px;">
			<img src="/static/img/world1.jpg" style="display: block; max-height: 145px;" id="uni_logo">
		</div>
	</div>
</div>
<div class="container" style="width: 960px; background-color: white; min-height: 600px;">
	<?php if($member_list['direction'] != null): ?>
	<div class="panel_title">
		研究领域（Research Field）
	</div>
	<div class="panel_content" style="padding: 0 45px 10px 45px;">
		<span style="background.color: transparent; box-sizing: border-box; color: rgb(0, 0, 0); display: inline; float.: none; font-family:'Georgia', Georgia, 'Times New Roman', Times, 'Microsoft YaHei', SimSun, SimHei, serif; 宋体; font.size: 14.66px; font.style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; mar.gin-bottom: 0px; mar.gin-left: 0px; mar.gin-right: 0px; mar.gin-top: 0px; orphans: 2; text-align: left; text-decoration: none; text.indent: 28px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px;"><b style="box-sizing: border-box; mar.gin-bottom: 0px; mar.gin-left: 0px; mar.gin-right: 0px; mar.gin-top: 0px;"><?php echo $member_list['direction']; ?></b></span>
	</div>
	<div style="margin: 10px auto 0; + margin: -10px auto 15px; width: 88%; border-bottom: 1px solid #399;"></div>
	<?php endif; if($member_list['intro'] != null): ?>
	<div class="panel_title" id="个人简介（Biography）">
   	个人简介（Biography）
    </div>
	<div class="panel_content" style="padding: 0 45px 10px 45px;">
	<span style="color: black; font-family:'Georgia', Georgia, 'Times New Roman', Times, 'Microsoft YaHei', SimSun, SimHei, serif; 宋体; font.size: 11pt;">
	<?php echo str_replace(PHP_EOL, '<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="circle"></span>', $member_list['intro']);?></span>
	</div>
	<div style="margin: 10px auto 0; + margin: -10px auto 15px; width: 88%; border-bottom: 1px solid #399;"></div>
	<?php endif; if($member_list['hobbies'] != null): ?>
	<div class="panel_title">
   	兴趣爱好（Hobbies）
    </div>
	<div class="panel_content" style="padding: 0 45px 10px 45px;">
	<span style="color: black; font-family:'Georgia', Georgia, 'Times New Roman', Times, 'Microsoft YaHei', SimSun, SimHei, serif; 宋体; font.size: 11pt;"><?php echo $member_list['hobbies']; ?></span>
	</div>
	<div style="margin: 10px auto 0; + margin: -10px auto 15px; width: 88%; border-bottom: 1px solid #399;"></div>
	<?php endif; if($member_list['achievement'] != null): ?>
	<div class="panel_title">
   	个人成就（Achievement）
    </div>
	<div class="panel_content text-shadow" style="padding: 0 45px 10px 45px;">
	<span style="color: black; font-family:'Georgia', Georgia, 'Times New Roman', Times, 'Microsoft YaHei', SimSun, SimHei, serif; 宋体; font.size: 11pt;"><span class="circle"></span><?php echo str_replace(PHP_EOL, '<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="circle"></span>', $member_list['achievement']);?></span>
	</div>
	<div style="margin: 10px auto 0; + margin: -10px auto 15px; width: 88%; border-bottom: 1px solid #399;"></div>
	<?php endif; ?>
</div>


<!--_footer 作为公共模版分离出去-->
<footer class="footer mt-20">
	<div class="container-fluid">
		<nav> <a href="#" target="_blank">关于我们</a> <span class="pipe">|</span> <a href="#" target="_blank">联系我们</a> <span class="pipe">|</span> <a href="#" target="_blank">法律声明</a> </nav>
		<p>Copyright &copy;暂无 <br>
			<a href="http://www.miitbeian.gov.cn/" target="_blank" rel="nofollow">暂无备案</a><br>
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
<script>
function admin_edit(title,url,id,w,h){
    $.get(url,{id:id}); //执行控制器中的编辑操作
	layer_show(title,url,w,h);
}
</script>
<!--/_footer /作为公共模版分离出去-->


<script type="text/javascript">
$('.table-sort').dataTable({
	"aaSorting": [[ 0, "desc" ]],//默认第几个排序
	"bStateSave": false,//状态保存
	"searching": false,//是否显示查询
    "lengthChange": false,//是否使用下位列表选择分页大小
	"iDisplayLength": 3,
	"bInfo" : false, // 是否显示左下角记录数
	"aoColumnDefs": [
		//{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		{"orderable":false,"aTargets":[0]}// 不参与排序的列
	]
});
</script>

</body>
</html>