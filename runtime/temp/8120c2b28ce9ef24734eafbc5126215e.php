<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:99:"C:\myphp_www\PHPTutorial\WWW\ResearchManage\public/../application/index\view\download\file-add.html";i:1541999492;}*/ ?>
<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
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
	<form action="doAction", method="post" enctype="multipart/form-data" target="nm_iframe" class="form form-horizontal" id="form-admin-add">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>作者：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input  type="text" class="input-text" value="" placeholder="" id="author" name="author">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">来源：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input  type="text" class="input-text" value="" placeholder="" id="source" name="source">
			</div>
		</div>	
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">所属分类：</label>
            <div class="formControls col-xs-8 col-sm-9"> 
				<span class="select-box" style="width:150px;">
					<select class="select" name="category" id="category" size="1" onChange="getCateDtl(this)">
						<?php if(is_array($cateList) || $cateList instanceof \think\Collection || $cateList instanceof \think\Paginator): $i = 0; $__LIST__ = $cateList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<option value="<?php echo $vo['id']; ?>" selected><?php echo $vo['category']; ?></option>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
				</span>
				<a title="添加" href="javascript:;" onclick="addCate()"><i class="Hui-iconfont">&#xe600;</i></a>
				&nbsp;&nbsp;&nbsp;
				<span class="select-box" style="width:150px;">
					<select class="select" name="cat_dtl" id="cat_dtl" size="1">
						<option value="0" selected>其他</option>
					</select>
				</span>
				<a title="添加" href="javascript:;" onclick="addCateDtl()"><i class="Hui-iconfont">&#xe600;</i></a>
            </div>
        </div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>标签：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input class="btn btn-primary size-MINI radius" type="button" value="&nbsp;添加标签&nbsp;" id="addLabel" >	
				<div class="label_add"></div>
			</div>
			<input type="hidden" id="lbl_num" name="lbl_num" value="0">
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>文件选择：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<span class="btn-upload form-group">
				  <input class="input-text upload-url radius" type="text" name="uploadfile-1" id="uploadfile-1" readonly><a href="javascript:void();" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe642;</i> 浏览文件</a>
				  <input type="file" multiple name="myFile" class="input-file">
				</span>
			</div>
		</div>	
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">描述：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea type="text" class="textarea radius" value="" placeholder="请输入描述信息..." id="description" name="description"></textarea>
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
</body>
<!--请在下方写此页面业务相关的脚本-->
<script id="jquery_172" type="text/javascript" class="library" src="/static/lib/jquery/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/static/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="/static/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/static/lib/jquery.validation/1.14.0/messages_zh.js"></script>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/static/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/static/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="/static/static/h-ui.admin/js/H-ui.admin.page.js"></script> 
<script type="text/javascript" src="/static/static/h-ui/js/main.js"></script> 
<script type="text/javascript" src="/static/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/static/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/static/lib/laypage/1.2/laypage.js"></script>
<!--/_footer /作为公共模版分离出去-->
<script>
var label_num = 0;
//添加标签
$('#addLabel').click(function(){
	label_num ++;
	document.getElementById("lbl_num").value=label_num;
	$(".label_add").append('<input  type="text" class="input-text size-MINI" style="width:100px;" placeholder="标签'+label_num+'" id="lbl'+label_num+'" name="lbl'+label_num+'">');
});
function getCateDtl(obj) 
{
	var id = $(obj).attr('value');
	$.ajax({
		type: "POST",  
		url: "<?php echo url('getCateDtl'); ?>",  
		data: {"id": id},
		success: function(data){
			var html = "";
			let temp = eval(data);
			for (var i = 0; i < temp.length; i ++)
			{
				html += "<option value=\""+temp[i]['id']+"\" selected>"+temp[i]['cat_dtl']+"</option>";
			}
			$("#cat_dtl").html(html);
		}
	});
}
function addCate()
{
	layer.prompt({
		  title: '添加分类',
		},function(value, index, elem){
		$.ajax({
			type: "POST",  
			url: "<?php echo url('addCate'); ?>",  
			data: {"cate": value},
			success: function(data){
				alert(data.msg);
				if (data.result == 1)
				{
					var html = "<option value=\""+data.id+"\" selected>"+value+"</option>";
					$("#category").prepend(html);
				}
			}
		});
	  layer.close(index);
	});
}

function addCateDtl()
{
	var cate_id = $('#category').attr('value');
	layer.prompt({
		  title: '添加子分类',
		},function(value, index, elem){
		$.ajax({
			type: "POST",  
			url: "<?php echo url('addCateDtl'); ?>",  
			data: {"cateDtl" : value, "cat_id" :cate_id},
			success: function(data){
				alert(data.msg);
				if (data.result == 1)
				{
					var html = "<option value=\""+data.id+"\" selected>"+value+"</option>";
					$("#cat_dtl").prepend(html);
				}
			}
		});
	  layer.close(index);
	});
}
</script>
</html>
