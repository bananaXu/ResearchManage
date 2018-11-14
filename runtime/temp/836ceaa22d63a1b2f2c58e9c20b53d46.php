<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:97:"C:\myphp_www\PHPTutorial\WWW\ResearchManage\public/../application/admin\view\user\admin_edit.html";i:1542023537;s:83:"C:\myphp_www\PHPTutorial\WWW\ResearchManage\application\admin\view\public\base.html";i:1501913354;s:83:"C:\myphp_www\PHPTutorial\WWW\ResearchManage\application\admin\view\public\meta.html";i:1541999460;s:85:"C:\myphp_www\PHPTutorial\WWW\ResearchManage\application\admin\view\public\footer.html";i:1540896626;}*/ ?>
<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/favicon.ico" >
<link rel="Shortcut Icon" href="/favicon.ico" />
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

	<form action="" method="post" class="form form-horizontal" id="form-admin-add">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>用户名：</label>
			<div class="formControls col-xs-8 col-sm-9">

				<?php if($user_info['name'] == 'admin'): ?> <!--如果用户名是admin,不允许修改-->
				<input  type="text" class="input-text disabled" value="<?php echo $user_info['name']; ?>" placeholder="" id="name" name="name">
				<?php else: if(\think\Session::get('user_info.name') == $user_info['name']): ?>
				<input  type="text" class="input-text disabled" value="<?php echo $user_info['name']; ?>" placeholder="" id="name" name="name">
				<?php else: ?>
				<input  type="text" class="input-text" value="<?php echo $user_info['name']; ?>" placeholder="" id="name" name="name">
				<?php endif; endif; ?>

			</div>
		</div>
		<?php if(\think\Session::get('user_info.name') == 'admin'): ?>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>真实姓名：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<?php if($user_info['name'] == 'admin'): ?> <!--如果用户名是admin,不允许修改-->
				<input  type="text" class="input-text disabled" value="<?php echo $user_info['realname']; ?>" placeholder="" id="realname" name="realname">
				<?php else: ?>
				<input  type="text" class="input-text" value="<?php echo $user_info['realname']; ?>" placeholder="" id="realname" name="realname">
				<?php endif; ?>
			</div>
		</div>
		<?php endif; ?>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>新密码：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="password" class="input-text" autocomplete="off" value="<?php echo $user_info['password']; ?>"  placeholder="密码为6位" id="password" name="password">
			</div>
		</div>


		<?php if(\think\Session::get('user_info.name') == 'admin'): ?>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">启用状态：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
				<select class="select" name="status" size="1">

					<option value="1" <?php if($user_info['status'] == 1){echo 'selected="selected"';} ?>>启用</option>
					<option value="0" <?php if($user_info['status'] == 0){echo 'selected="selected"';} ?>>不启用</option>

				</select>
				</span>
			</div>
		</div>
		<?php endif; ?>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>邮箱：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" placeholder="@" name="email" id="email" value="<?php echo $user_info['email']; ?>">
			</div>
		</div>


		<?php if(\think\Session::get('user_info.name') == 'admin'): ?>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">角色：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
				<select class="select" id="role" name="role" size="1">
					<option value="0" <?php if($user_info['role'] == 0){echo 'selected="selected"';} ?>>管理员</option>
					<option value="1" <?php if($user_info['role'] == 1){echo 'selected="selected"';} ?>>超级管理员</option>
					<option value="2" <?php if($user_info['role'] == 2){echo 'selected="selected"';} ?>>用户</option>
				</select>
				</span>
			</div>
		</div>
		<?php endif; ?>

		<!--将当前记录的id做为隐藏域发送到服务器-->
		<input type="hidden" value="<?php echo $user_info['id']; ?>" name="id">

		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input class="btn btn-primary radius" type="button" value="&nbsp;&nbsp;提交&nbsp;&nbsp;" id="submit" >
			</div>
		</div>
	</form>


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

<script>
	<?php if($user_info['name'] == 'admin'): ?>
	$(".select").attr("disabled", true);
	<?php endif; ?>
	$(function(){
        $("#submit").on("click", function(event){
            $.ajax({
				type: "POST",
				url: "<?php echo url('user/editUser'); ?>",
				data: $("#form-admin-add").serialize(),
				dataType: "json",
				success: function(data){
                       alert(data.message);
				}
			});

		})
	})
</script>

</body>
</html>