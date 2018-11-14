<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:104:"C:\myphp_www\PHPTutorial\WWW\ResearchManage\public/../application/admin\view\resource\resource_edit.html";i:1541772852;s:83:"C:\myphp_www\PHPTutorial\WWW\ResearchManage\application\admin\view\public\base.html";i:1501913354;s:83:"C:\myphp_www\PHPTutorial\WWW\ResearchManage\application\admin\view\public\meta.html";i:1541999460;s:85:"C:\myphp_www\PHPTutorial\WWW\ResearchManage\application\admin\view\public\footer.html";i:1540896626;}*/ ?>
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

	<form action="" method="post" class="form form-horizontal" id="form-resource-add">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>文件名：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input  type="text" class="input-text disabled" value="<?php echo $resource_info['filename']; ?>" placeholder="" id="author" name="author">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>作者：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input  type="text" class="input-text" value="<?php echo $resource_info['author']; ?>" placeholder="" id="author" name="author">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>标签：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input class="btn btn-primary size-MINI radius" type="button" value="&nbsp;添加标签&nbsp;" id="addLabel" >	
				<div class="label_add"><?php echo $label_list; ?></div>
			</div>
			<input type="hidden" id="lbl_num" name="lbl_num" value="0">
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">来源：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input  type="text" class="input-text" value="<?php echo $resource_info['source']; ?>" placeholder="" id="source" name="source">
			</div>
		</div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">所属分类：</label>
            <div class="formControls col-xs-8 col-sm-9"> 
				<span class="select-box" style="width:150px;">
					<select class="select" name="category" id="category" size="1" onChange="getCateDtl(this)">
						<?php if(is_array($cateList) || $cateList instanceof \think\Collection || $cateList instanceof \think\Paginator): $i = 0; $__LIST__ = $cateList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['id'] == $resource_info['category']): ?>
						<option value="<?php echo $vo['id']; ?>" selected><?php echo $vo['category']; ?></option>
						<?php else: ?>
						<option value="<?php echo $vo['id']; ?>"><?php echo $vo['category']; ?></option>
						<?php endif; endforeach; endif; else: echo "" ;endif; ?>
					</select>
				</span>
				&nbsp;&nbsp;
				<span class="select-box" style="width:150px;">
					<select class="select" name="cat_dtl" id="cat_dtl" size="1">
						<?php if(is_array($cateDtlList) || $cateDtlList instanceof \think\Collection || $cateDtlList instanceof \think\Paginator): $i = 0; $__LIST__ = $cateDtlList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['id'] == $resource_info['cate_dtl']): ?>
						<option value="<?php echo $vo['id']; ?>" selected><?php echo $vo['cat_dtl']; ?></option>
						<?php else: ?>
						<option value="<?php echo $vo['id']; ?>"><?php echo $vo['cat_dtl']; ?></option>
						<?php endif; endforeach; endif; else: echo "" ;endif; ?>
					</select>
				</span>
            </div>
        </div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">描述：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea type="text" class="textarea radius" placeholder="请输入描述信息..." id="description" name="description"></textarea>
			</div>
		</div>	
		<!--将当前记录的id做为隐藏域发送到服务器-->
		<input type="hidden" value="<?php echo $resource_info['id']; ?>" name="id">
		
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
var label_num = <?php echo $num; ?>;
document.getElementById("description").value="<?php echo $resource_info['description']; ?>";
//添加标签
$('#addLabel').click(function(){
	label_num ++;
	document.getElementById("lbl_num").value=label_num;
	$(".label_add").append('<input  type="text" class="input-text size-MINI" style="width:100px;" placeholder="标签'+label_num+'" id="lbl'+label_num+'" name="lbl'+label_num+'">');
});
function getCateDtl(obj) 
{
	var id = $(obj).val();
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
$(function(){
	$("#submit").on("click", function(event){
		$.ajax({
			type: "POST",
			url: "<?php echo url('admin/resource/editResource'); ?>",
			data: $("#form-resource-add").serialize()+'&'+$.param({"lbl_num" : label_num}),
			dataType: "json",
			success: function(data){
					alert(data.message);
			}
		});
	})
});
</script>

</body>
</html>