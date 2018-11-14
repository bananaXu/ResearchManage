<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:88:"D:\myphp_www\PHPTutorial\WWW\pt5\public/../application/index\view\download\download.html";i:1540795963;s:72:"D:\myphp_www\PHPTutorial\WWW\pt5\application\index\view\public\base.html";i:1539847680;s:72:"D:\myphp_www\PHPTutorial\WWW\pt5\application\index\view\public\meta.html";i:1539326641;s:74:"D:\myphp_www\PHPTutorial\WWW\pt5\application\index\view\public\header.html";i:1540796153;s:74:"D:\myphp_www\PHPTutorial\WWW\pt5\application\index\view\public\footer.html";i:1540089153;}*/ ?>
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



<title><?php echo (isset($title) && ($title !== '')?$title:'资源共享'); ?></title>
<meta name="keywords" content="<?php echo (isset($keywords) && ($keywords !== '')?$keywords:'页面关键字'); ?>">
<meta name="description" content="<?php echo (isset($desc) && ($desc !== '')?$desc:'页面描述'); ?>">
<style>
#forTab>ul>li>a {
	padding: 5px 10px;
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



<div class="container" style="width: 960px; background-color: white; min-height: 700px;">
	<br />
	<div class="mt-5">
	 <form action="<?php echo url('download/searchResByLabels#toTop'); ?>" method="post" id="_form">
		<div id="forTab" class="text-c">
			日期范围：
			<input type="text" name="logmin" id="logmin" onfocus="WdatePicker({maxDate:'#F{ $dp.$D(\'logmax\')||\'%y-%M-%d\' }'})" class="input-text Wdate" style="width:100px;" value="<?php echo $logmin; ?>" />
			-
			<input type="text" name="logmax" id="logmax" onfocus="WdatePicker({minDate:'#F{ $dp.$D(\'logmin\') }',maxDate:'%y-%M-%d'})" class="input-text Wdate" style="width:100px;" value="<?php echo $logmax; ?>" />
			<span class="select-box inline">
			<select name="selected" class="select">
				<option value="%" <?php if ($selected == '%') echo 'selected'?>>全部</option>
				<option value="1" <?php if ($selected == '1') echo 'selected'?>>资源名称</option>
				<option value="2" <?php if ($selected == '2') echo 'selected'?>>来源</option>
				<option value="3" <?php if ($selected == '3') echo 'selected'?>>作者</option>
				<option value="4" <?php if ($selected == '4') echo 'selected'?>>上传者</option>
			</select>
			</span>
			<input type="text" name="keywords" id="" placeholder=" 搜索内容" style="width:160px" class="input-text" value="<?php echo $keywords; ?>" />
			<a name="" id="" class="btn btn-success" onclick='getAjaxData()'><i class="Hui-iconfont">&#xe665;</i> 搜资源</a>
			<br />
			<br />
			<div id="group" class="hid" style="display: block;">
				<ul>
					<?php if(is_array($lbl_list) || $lbl_list instanceof \think\Collection || $lbl_list instanceof \think\Paginator): $i = 0; $__LIST__ = $lbl_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<li><a type="0" id="<?php echo $vo['id']; ?>" class="btn btn-secondary size-MINI radius" href="javascript:;" onclick="clickLabel(this, <?php echo $vo['id']; ?>, '<?php echo $vo['name']; ?>')"><?php echo $vo['name']; ?></a></li>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
			<input type="hidden" id="provSelect" name="provSelect" value="%" />
			<span class="l">
			<a href="javascript:;" onclick="datadownload()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe641;</i> 批量下载</a>
			<a href="javascript:;" onclick="addfile('资源信息','<?php echo url("download/fileAdd"); ?>','800','500')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe642;</i> 上传资源</a> 
			</span>
		</div>
	</form>
	</div>
	<div class="mt-5" id='table-mt5' style="padding-bottom: 60px;">
		<table class="table table-border table-bordered table-bg table-hover table-sort">
			<thead>
				<tr class="text-c">
					<th width="40"><input type="checkbox" id = "allChecks" name="" value="" onclick="ckAll()"></th>
					<th width="50">ID</th>
					<th width="130">资源名称</th>
					<th width="130">来源</th>
					<th width="200">标签</th>
					<th width="100">上传时间</th>
					<th width="60">操作</th>
				</tr>
			</thead>
			<tbody>
			<?php if(is_array($arrylist) || $arrylist instanceof \think\Collection || $arrylist instanceof \think\Paginator): $i = 0; $__LIST__ = $arrylist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				<tr class="text-c">
					<td><input type="checkbox" value="<?php echo $vo['filename']; ?>.<?php echo $vo['filetype']; ?>" name="check"></td>
					<td width="40"><?php echo $vo['id']; ?></td>
					<td><button class="btn btn-link size-MINI" data-toggle="tooltip" data-placement="right" title="<?php echo $vo['description']; ?>"><?php echo $vo['filename']; ?></button></td>
					<td><?php echo $vo['source']; ?></td>
					<td><?php echo $vo['labels']; ?></td>
					<td><?php echo $vo['uploadtime']; ?></td>
					<td width="40"><a title="下载" href="downloadfile?filename=upload/<?php echo $vo['filename']; ?>.<?php echo $vo['filetype']; ?>" class="text-decoration:none"><i class="Hui-iconfont">&#xe640;</i></a>&nbsp;
					<a title="预览" href="javascript:;" onclick="Media('资料预览','/index/download/media/fileName/<?php echo $vo['filename']; ?>/fileType/<?php echo $vo['filetype']; ?>','1','900','600')" class="text-decoration:none"><i class="Hui-iconfont">&#xe695;</i></a>
					</td>
				</tr>
			<?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
		</table>
		<form action="" method="post" id="downloadfilesform" style="display:none">
			<input type="hidden" name="files" id="downloadfilesfiles" value="upload/tmp.zip" />
		</form>
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

function Media(title,url,fileName,w,h){
    $.get(url,{fileName:fileName});
	layer_show(title,url,w,h);
}
var myArray=new Array();

$('.table-sort').dataTable({
	"aaSorting": [[ 1, "desc" ]],//默认第几个排序
	"bStateSave": false,//状态保存
	"searching": false,//是否显示查询
    "lengthChange": false,//是否使用下位列表选择分页大小	
	"iDisplayLength": 15,
	"aoColumnDefs": [
		//{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		{"orderable":false,"aTargets":[0, 6]}// 不参与排序的列
	]
});

function clickList(id) {
	var psel = document.getElementById("provSelect");
	psel.value = id;
	document.getElementById('_form').submit();
}

function ckAll(){
	var flag=document.getElementById("allChecks").checked;
	var cks=document.getElementsByName("check");
	for(var i=0;i<cks.length;i++){
		cks[i].checked=flag;
	}
}
function datadownload(){
	var cks=document.getElementsByName("check");
	var myarray=new Array();
	var index = 0;
	for(var i=cks.length-1; i>=0; i--){
		if(cks[i].checked==true){
			myarray[index ++] = cks[i].value;
		}
	}
	$.ajax({
		type: "POST",  
		url: "<?php echo url('downloadfiles'); ?>",  
		data: {"id": myarray},
		success: function(msg){
			window.open("downloadfile?filename=upload/tmp.zip");
		}
	});
}
function addfile(title,url,w,h)
{
	$.post(url);
	layer_show(title,url,w,h);
}
function clickLabel(obj, id, name){
	var option = $(obj).attr("type");
	if (option == 1)
	{
		myArray.splice($.inArray(id, myArray), 1);
		$(obj).attr("type", "0");
		$(obj).attr("class", "btn btn-secondary size-MINI radius");
	}
	else 
	{
		if (jQuery.inArray(id, myArray) == -1)
			myArray.push(id);
		$(obj).attr("type", "1");
		$(obj).attr("class", "btn btn-warning size-MINI radius");
	}
	getAjaxData();
}

function selLable(id, name)
{
	var btn = document.getElementById(id);
	console.log(btn);
	btn.click();
}

function getAjaxData(){
	$.ajax({
		type: "POST",
		url: "<?php echo url('ajaxSearchresbylabels'); ?>",
		data: $('#_form').serialize()+'&'+$.param({"labels" : myArray}),
		dataType: 'json',
		success: function(data){
			let temp = eval(data);
			let html ="<table class='table table-border table-bordered table-bg table-hover table-sort'><thead><tr class='text-c'><th width='40'><input type='checkbox' id = 'allChecks' name='' value='' onclick='ckAll()'></th><th width='50'>ID</th><th width='130'>资源名称</th><th width='130'>来源</th><th width='200'>标签</th><th width='100'>上传时间</th><th width='60'>操作</th></thead><tbody>";
			let endHtml = "</tbody></table><form action='' method='post' id='downloadfilesform' style='display:none'><input type='hidden' name='files' id='downloadfilesfiles' value='upload/tmp.zip' /></form>";
			for(var i = 0; i < temp.length; i ++){
				let tempHtml = 
				"<tr class='text-c'><td><input type='checkbox' value='"+temp[i]["filename"]+temp[i]["filetype"]+"' name='check'></td><td width='40'>"+temp[i]['id']+"</td><td><button class='btn btn-link size-MINI' temp-toggle='tooltip' temp-placement='right' title='"+temp[i]["description"]+"'> "+temp[i]["filename"]+"</button></td><td>"+temp[i]["source"]+"</td><td>"+temp[i]["labels"]+"</td><td>"+temp[i]["uploadtime"]+"</td><td width='40'><a title='下载' href='downloadfile?filename=upload/"+temp[i]["filename"]+temp[i]["filetype"]+"' class='text-decoration:none'><i class='Hui-iconfont'>&#xe640;</i></a>&nbsp;<a title='预览' href='javascript:;' onclick=\"Media('资料预览','/index/download/media/fileName/"+temp[i]["filename"]+"/fileType/"+temp[i]["filetype"]+"','1','900','600')\" class='text-decoration:none'><i class='Hui-iconfont'>&#xe695;</i></a></td></tr>";
				html+=tempHtml;
			}
			
			html +=endHtml;
			
			$('#table-mt5').html(html);
			$('.table-sort').dataTable({
				"aaSorting": [[ 1, "desc" ]],//默认第几个排序
				"bStateSave": false,//状态保存
				"searching": false,//是否显示查询
				"lengthChange": false,//是否使用下位列表选择分页大小
				"iDisplayLength": 15,
				"aoColumnDefs": [
					{"orderable":false,"aTargets":[0, 6]}// 不参与排序的列
				]
			});

		}
	});
};
</script>

</body>
</html>