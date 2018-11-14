<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"D:\myphp_www\PHPTutorial\WWW\pt5\public/../application/admin\view\user\login.html";i:1539233281;}*/ ?>
﻿<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/static/lib/html5.js"></script>
<script type="text/javascript" src="/static/lib/respond.min.js"></script>
<![endif]-->
<link href="/static/static/h-ui/css/H-ui.min.css" rel="stylesheet" type="text/css" />
<link href="/static/static/h-ui/css/H-ui.login.css" rel="stylesheet" type="text/css" />
<link href="/static/static/h-ui.admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/static/lib/Hui-iconfont/1.0.8/iconfont.css" rel="stylesheet" type="text/css" />
<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script><![endif]-->
<title><?php echo (isset($title) && ($title !== '')?$title:'标题'); ?></title>
<meta name="keywords" content="<?php echo (isset($keywords) && ($keywords !== '')?$keywords:'关键字'); ?>">
<meta name="description" content="<?php echo (isset($desc) && ($desc !== '')?$desc:'描述'); ?>">
</head>
<body>
<input type="hidden" id="TenantId" name="TenantId" value="" />
<div class="loginWraper">
	<div id="loginform" class="loginBox">
		<form class="form form-horizontal" action="index.html" method="post">
			<div class="row cl">
				<label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
				<div class="formControls col-xs-8">
					<input id="" name="name" type="text" placeholder="用户名" class="input-text size-L">
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
				<div class="formControls col-xs-8">
					<input id="" name="password" type="password" placeholder="密码" class="input-text size-L">
				</div>
			</div>
			<div class="row cl">
				<div class="formControls col-xs-8 col-xs-offset-3">
					<input id="captcha" name="captcha" class="input-text size-L" type="text" placeholder="验证码" value="" style="width:150px;">
					<img src="<?php echo captcha_src(); ?>" id="captcha_img">
					<a id="kanbuq" href="javascript:captcha_refresh();">看不清，换一张</a>
				</div>
			</div>
			<div class="row cl">
				<div class="formControls col-xs-8 col-xs-offset-3">
					<label for="online">
						<input type="checkbox" name="online" id="online" value="">
						使我保持登录状态</label>
				</div>
			</div>
			<div class="row cl">
				<div class="formControls col-xs-8 col-xs-offset-3">
					<input id="login" type="button" class="btn btn-success radius size-L" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">
				</div>
			</div>
		</form>
	</div>
</div>
<div class="footer"><?php echo (isset($copyRight) && ($copyRight !== '')?$copyRight:"版权提示"); ?></div>

<script type="text/javascript" src="/static/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/static/static/h-ui/js/H-ui.js"></script>
<!--ajax提交-->
<script>
	$(document).keyup(function(event){
	  if(event.keyCode ==13){
		$("#login").trigger("click");
	  }
	});
	$(function(){
	    $('#login').on('click', function(){
	        $.ajax({
				type: 'POST',
				url: "<?php echo url('checkLogin'); ?>",
				data: $('form').serialize(),
				dataType: 'json',
				success: function(data){
					alert(data.message);
					if (data.status == 1) {
					    window.location.href="<?php echo url('admin/index/index'); ?>";
					}
					else if (data.status == 2) {
						window.location.href="<?php echo url('index/index/index'); ?>";
					}
					captcha_refresh();
					document.getElementById('captcha').value = '';
				}
			});
		})
	})
</script>

<!--自动刷新验证码-->
<script>
	function captcha_refresh(){
        var str = Date.parse(new Date())/1000;
        $('#captcha_img').attr("src", "/captcha?id="+str);
	}
</script>

</body>
</html>