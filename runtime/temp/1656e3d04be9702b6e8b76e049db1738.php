<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:99:"C:\myphp_www\PHPTutorial\WWW\ResearchManage\public/../application/admin\view\member\member_add.html";i:1540896728;s:83:"C:\myphp_www\PHPTutorial\WWW\ResearchManage\application\admin\view\public\base.html";i:1501913354;s:83:"C:\myphp_www\PHPTutorial\WWW\ResearchManage\application\admin\view\public\meta.html";i:1538812279;s:85:"C:\myphp_www\PHPTutorial\WWW\ResearchManage\application\admin\view\public\footer.html";i:1540896626;}*/ ?>
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
<link rel="stylesheet" type="text/css" href="/static/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/static/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/static/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/static/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/static/static/h-ui.admin/css/style.css" />
<link rel="stylesheet" type="text/css" href="/static/static/style.css" />
<link rel="stylesheet" type="text/css" href="/static/static/animate.min.css" />
<link rel="stylesheet" type="text/css" href="/static/static/animate-text.css" />
<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<!--/meta 作为公共模版分离出去-->



<title><?php echo (isset($title) && ($title !== '')?$title:"标题"); ?></title>
<meta name="keywords" content="<?php echo (isset($keywords) && ($keywords !== '')?$keywords:'关键字'); ?>">
<meta name="description" content="<?php echo (isset($desc) && ($desc !== '')?$desc:'描述'); ?>">

</head>
<body>





<article class="cl pd-20">
	<form action="doAction", method="post" enctype="multipart/form-data" target="nm_iframe" class="form form-horizontal" id="form-member-add">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>姓名：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input  type="text" class="input-text" value="" placeholder="" id="name" name="name">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>姓名拼音：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input  type="text" class="input-text" value="" placeholder="" id="spell" name="spell">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">学历：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:100px;">
				<select class="select" name="education" size="1">
					<option value="0" selected>本科生</option>
					<option value="1">硕士生</option>
					<option value="2">副教授</option>
					<option value="3">教授</option>
				</select>
				</span>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">性别：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:50px;">
				<select class="select" name="sex" size="1">
					<option value="0" selected>男</option>
					<option value="1">女</option>
				</select>
				</span>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>专业年级：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input  type="text" class="input-text" value="" placeholder="" id="grade" name="grade">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>研究方向：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input  type="text" class="input-text" value="" placeholder="" id="direction" name="direction">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">联系方式</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input  type="text" class="input-text" value="" placeholder="" id="contact" name="contact">
			</div>
		</div>			
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>图片选择：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<span class="btn-upload form-group">
				  <input class="input-text upload-url radius" type="text" name="uploadfile-1" id="uploadfile-1" readonly><a href="javascript:void();" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe642;</i> 浏览图片</a>
				  <input type="file" accept="image/*" multiple name="myFile" class="input-file">
				</span>
			</div>
		</div>	
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">简介：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea type="text" class="textarea radius" placeholder="请输入简介信息..." id="intro" name="intro"></textarea>
			</div>
		</div>	
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">兴趣爱好：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea type="text" class="textarea radius" placeholder="请输入兴趣爱好..." id="hobbies" name="hobbies"></textarea>
			</div>
		</div>	
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">个人成就：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea type="text" class="textarea radius" placeholder="请输入个人成就..." id="achievement" name="achievement"></textarea>
			</div>
		</div>	
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;" id="submit" >
			</div>
		</div>
	</form>
	<iframe id="id_iframe" name="nm_iframe" style="display:none;"> </iframe>
</article>


<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/static/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/static/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/static/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="/static/static/h-ui.admin/js/H-ui.admin.page.js"></script> 
<script type="text/javascript" src="/static/static/h-ui/js/main.js"></script> 
<script type="text/javascript" src="/static/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/static/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/static/lib/laypage/1.2/laypage.js"></script>
<!--/_footer /作为公共模版分离出去-->


<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/static/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="/static/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/static/lib/jquery.validation/1.14.0/messages_zh.js"></script>

</body>
</html>