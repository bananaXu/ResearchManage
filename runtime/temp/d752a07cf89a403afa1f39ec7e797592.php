<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:85:"D:\myphp_www\PHPTutorial\WWW\pt5\public/../application/index\view\task\task_edit.html";i:1540128910;}*/ ?>
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
</title>
</head>

<body>
<article class="cl pd-20">

	<form action="<?php echo url("index/task/editTask"); ?>", method="post" enctype="multipart/form-data" target="nm_iframe" class="form form-horizontal" id="form-task-edit">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input  type="text" class="input-text disabled" value="<?php echo $task_info['title']; ?>" placeholder="" id="title" name="title">
			</div>
		</div>		
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>负责人：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input  type="text" class="input-text disabled" value="<?php echo $task_info['principal']; ?>" placeholder="" id="principal" name="principal">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>预计完成时间：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input  type="text" class="input-text disabled" value="<?php echo $task_info['estimatedTime']; ?>" placeholder="" id="estimatedTime" name="estimatedTime">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>当前状态：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:80px;">
				<select class="select" name="state" size="1">
					<option value="0"<?php if($task_info['state'] == 0){echo 'selected="selected"';} ?>>其他</option>
					<option value="1"<?php if($task_info['state'] == 1){echo 'selected="selected"';} ?>>发起</option>
					<option value="2"<?php if($task_info['state'] == 2){echo 'selected="selected"';} ?>>进行中</option>
					<option value="3"<?php if($task_info['state'] == 4){echo 'selected="selected"';} ?>>已完成</option>
				</select>
				</span>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">文件选择：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<span class="btn-upload form-group">
				  <input class="input-text upload-url radius" type="text" name="uploadfile-1" id="uploadfile-1" readonly><a href="javascript:void();" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe642;</i> 浏览文件</a>
				  <input type="file" multiple name="myFile" class="input-file">
				</span>
			</div>
		</div>	
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">进度描述：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea type="text" class="textarea radius" placeholder="请输入任务描述..." id="desc" name="desc"></textarea>
			</div>
		</div>	
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;" id="submit" >
			</div>
		</div>
		<input type="hidden" value="<?php echo $task_info['id']; ?>" name="id">
	</form>
	<iframe id="id_iframe" name="nm_iframe" style="display:none;"> </iframe>
</article>
</body>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/static/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="/static/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/static/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script id="jquery_172" type="text/javascript" class="library" src="/static/lib/jquery/jquery-1.7.2.min.js"></script>
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
<script>
document.getElementById("desc").value="<?php echo $task_info['desc']; ?>";
</script>
</html>