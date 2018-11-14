<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:85:"D:\myphp_www\PHPTutorial\WWW\pt5\public/../application/admin\view\news\news_list.html";i:1539607568;s:72:"D:\myphp_www\PHPTutorial\WWW\pt5\application\admin\view\public\base.html";i:1501913354;s:72:"D:\myphp_www\PHPTutorial\WWW\pt5\application\admin\view\public\meta.html";i:1538812279;s:74:"D:\myphp_www\PHPTutorial\WWW\pt5\application\admin\view\public\header.html";i:1539226549;s:72:"D:\myphp_www\PHPTutorial\WWW\pt5\application\admin\view\public\menu.html";i:1539416998;s:74:"D:\myphp_www\PHPTutorial\WWW\pt5\application\admin\view\public\footer.html";i:1538838424;}*/ ?>
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



<title><?php echo (isset($title) && ($title !== '')?$title:'页面标题'); ?></title>
<meta name="keywords" content="<?php echo (isset($keywords) && ($keywords !== '')?$keywords:'页面关键字'); ?>">
<meta name="description" content="<?php echo (isset($desc) && ($desc !== '')?$desc:'页面描述'); ?>">

</head>
<body>


<!--_header 作为公共模版分离出去-->
<header class="navbar-wrapper">
    <div class="navbar navbar-fixed-top">
        <div class="container-fluid cl">
            <a class="logo navbar-logo f-l mr-10 hidden-xs" href="<?php echo url('index/index'); ?>">后台资源管理系统</a>
            <!--<a class="logo navbar-logo-m f-l mr-10 visible-xs" href="/aboutHui.shtml">H-ui</a>-->
            <!--<span class="logo navbar-slogan f-l mr-10 hidden-xs">v3.0</span>-->
            <a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>

            <nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
                <ul class="cl">
                    <li>
                        <?php if(\think\Session::get('user_info.name') == 'admin'): ?>
                        超级管理员
                        <?php else: if(\think\Session::get('user_info.role') == '1'): ?>
                            超级管理员
                          <?php else: ?>
                            管理员
                         <?php endif; endif; ?>

                    </li>
                    <li class="dropDown dropDown_hover"> <a href="#" class="dropDown_A"><?php echo session('user_info.name'); ?> <i class="Hui-iconfont">&#xe6d5;</i></a>
                        <ul class="dropDown-menu menu radius box-shadow">

                            <li><a href="<?php echo url('user/logout'); ?>">注销</a></li>
                        </ul>
                    </li>
                    <li id="Hui-skin" class="dropDown right dropDown_hover"> <a href="javascript:;" class="dropDown_A" title="换肤"><i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i></a>
                        <ul class="dropDown-menu menu radius box-shadow">
                            <li><a href="javascript:;" data-val="default" title="默认（黑色）">默认（黑色）</a></li>
                            <li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
                            <li><a href="javascript:;" data-val="green" title="绿色">绿色</a></li>
                            <li><a href="javascript:;" data-val="red" title="红色">红色</a></li>
                            <li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>
                            <li><a href="javascript:;" data-val="orange" title="橙色">橙色</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<!--/_header 作为公共模版分离出去-->




<!--_menu 作为公共模版分离出去-->
<aside class="Hui-aside">

    <div class="menu_dropdown bk_2">
	    <dl id="menu-admin">
            <dt><i class="Hui-iconfont">&#xe62b;</i> 成员管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a href="<?php echo url('member/memberList'); ?>" title="成员列表">成员列表</a></li>
                </ul>
            </dd>
        </dl>
	
        <dl id="menu-admin">
            <dt><i class="Hui-iconfont">&#xe616;</i> 资源管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>				
                    <li><a href="<?php echo url('resource/resourceList'); ?>" title="资源列表">资源列表</a></li>
                </ul>
                <ul>				
                    <li><a href="<?php echo url('resource/resourceCate'); ?>" title="资源分类">资源分类</a></li>
                </ul>
            </dd>
        </dl>
		
        <dl id="menu-admin">
            <dt><i class="Hui-iconfont">&#xe720;</i> 新闻管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>				
                    <li><a href="<?php echo url('news/newsList'); ?>" title="新闻列表">新闻列表</a></li>
                </ul>
            </dd>
        </dl>
		
        <dl id="menu-admin">
            <dt><i class="Hui-iconfont">&#xe637;</i> 任务管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>				
                    <li><a href="<?php echo url('task/taskList'); ?>" title="任务列表">任务列表</a></li>
                </ul>
            </dd>
        </dl>
		
        <dl id="menu-admin">
            <dt><i class="Hui-iconfont">&#xe62d;</i> 管理员管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a href="<?php echo url('user/adminList'); ?>" title="管理员列表">管理员列表</a></li>
                </ul>
            </dd>
        </dl>
    </div>
</aside>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
<!--/_menu 作为公共模版分离出去-->


<section class="Hui-article-box">
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
		<span class="c-gray en">&gt;</span>
		新闻管理
		<span class="c-gray en">&gt;</span>
		新闻列表
		<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
	</nav>
	<div class="Hui-article">
		<article class="cl pd-20">
			<form action="<?php echo url('news/newsList'); ?>" method="get">
				<div class="cl pd-5 bg-1 bk-gray mt-20">
					<span class="l">
					<a href="javascript:;" onclick="startAll()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe615;</i> 批量启用</a>
					<a href="javascript:;" onclick="stopAll()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe631;</i> 批量停用</a>
					<a href="javascript:;" onclick="news_add('成员信息','<?php echo url("admin/news/newsAdd"); ?>','800','500')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe642;</i> 添加新闻</a> 
					</span>
				</div>
			</form>
			<div class="mt-5">
				<table class="table table-border table-bordered table-bg table-hover table-sort">
					<thead>
						<tr class="text-c">
							<th width="30"><input type="checkbox" id = "allChecks" name="" value="" onclick="ckAll()"></th>
							<th width="40">ID</th>
							<th width="100">标题</th>
							<th width="360">内容</th>
							<th width="90">图片名</th>
							<th width="70">更新时间</th>
							<th width="30">启用</th>
							<th width="50">操作</th>
						</tr>
					</thead>
					<tbody>
					<?php if(is_array($arrylist) || $arrylist instanceof \think\Collection || $arrylist instanceof \think\Paginator): $i = 0; $__LIST__ = $arrylist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<tr class="text-c">
							<td><input type="checkbox" value="<?php echo $vo['picture']; ?>" id="<?php echo $vo['id']; ?>" name="check"></td>
							<td><?php echo $vo['id']; ?></td>
							<td><?php echo $vo['title']; ?></td>
							<td><?php echo $vo['content']; ?></td>
							<td><?php echo $vo['picture']; ?></td>
							<td><?php echo $vo['updatetime']; ?></td>
							<td class="td-status">
								<?php if($vo['enable'] == '1'): ?>
								<span class="label label-success radius">是</span>
								<?php else: ?>
								<span class="label radius">否</span>
								<?php endif; ?>
							</td>
							<td class="td-manage">
								<?php if($vo['enable'] == '1'): ?>
								<a style="text-decoration:none" onClick="news_stop(this,<?php echo $vo['id']; ?>)" href="javascript:;" title="停用">
									<i class="Hui-iconfont">&#xe631;</i>
								</a>
								<?php else: ?>
								<a style="text-decoration:none" onClick="news_start(this,<?php echo $vo['id']; ?>)" href="javascript:;" title="启用">
									<i class="Hui-iconfont">&#xe615;</i>
								</a>
								<?php endif; ?>
								<a href="javascript:;" onclick="news_edit('新闻编辑','<?php echo url("admin/news/newsEdit",["id"=>$vo["id"]]); ?>','1','800','500')" class="ml-5" style="text-decoration:none">
									<i class="Hui-iconfont">&#xe6df;</i>
								</a>
							</td>
						</tr>
					<?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
				</table>
				
				<form action="" method="post" id="downloadfilesform" style="display:none">
					<input type="hidden" name="files" id="downloadfilesfiles" value="upload/tmp.zip" />
				</form>
			</div>
		</article>
	</div>
</section>


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


<script type="text/javascript">
$('.table-sort').dataTable({
	"aaSorting": [[ 6, "desc" ]],//默认第几个排序
	"bStateSave": true,//状态保存
	"searching": true,//是否显示查询
    "lengthChange": true,//是否使用下位列表选择分页大小
	"aoColumnDefs": [
		//{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		{"orderable":false,"aTargets":[0, 3, 7]}// 不参与排序的列
	]
});
/*成员-添加*/
function news_add(title,url,w,h){
	$.post(url);
	layer_show(title,url,w,h);
}
/*成员-停用*/
function news_stop(obj,id){

	layer.confirm('确认要停用吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
		$.get("<?php echo url('news/setStatus'); ?>",{id:id});
		
		$(obj).parents("tr").find(".td-manage").prepend('<a onClick="news_start(this,'+id+')" href="javascript:;" title="启用" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">否</span>');
		$(obj).remove();
		layer.msg('已停用!',{icon: 5,time:1000});
	});
}

/*成员-启用*/
function news_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
        $.get("<?php echo url('news/setStatus'); ?>",{id:id});
		
		$(obj).parents("tr").find(".td-manage").prepend('<a onClick="news_stop(this,'+id+')" href="javascript:;" title="停用" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">是</span>');
		$(obj).remove();
		layer.msg('已启用!', {icon: 6,time:1000});
	});
}
/*批量停用*/
function stopAll()
{
	layer.confirm('确认要全部停用吗？',function(index){
		var cks=document.getElementsByName("check");
		for(var i=cks.length-1; i>=0; i--){
			if(cks[i].checked==true){
				var id = cks[i].id;
				$.get("<?php echo url('news/stopAll'); ?>",{id:id})
				$("#"+id).parents("tr").find(".td-manage").html('<a onClick=\"news_start(this,\'+id+\')\" href=\"javascript:;\" title=\"启用\" style=\"text-decoration:none\"><i class=\"Hui-iconfont\">&#xe615;</i></a><a title=\"编辑\" href=\"javascript:;\" onclick=\"news_edit(\'新闻编辑\',\'<?php echo url("news/newsEdit",["id"=>$vo["id"]]); ?>\',\'1\',\'800\',\'500\')\" class=\"ml-5\" style=\"text-decoration:none\"><i class=\"Hui-iconfont\">&#xe6df;</i></a>');
				$("#"+id).parents("tr").find(".td-status").html('<span class="label label-default radius">否</span>');
				//$("#"+id).parents("tr").remove();
			}
		}
		layer.msg('已停用!',{icon:1,time:1000});
	});
	
}
/*批量启用*/
function startAll()
{
	layer.confirm('确认要全部启用吗？',function(index){
		var cks=document.getElementsByName("check");
		for(var i=cks.length-1; i>=0; i--){
			if(cks[i].checked==true){
				var id = cks[i].id;
				$.get("<?php echo url('news/startAll'); ?>",{id:id})
				$("#"+id).parents("tr").find(".td-manage").html('<a onClick=\"news_stop(this,\'+id+\')\" href=\"javascript:;\" title=\"停用\" style=\"text-decoration:none\"><i class=\"Hui-iconfont\">&#xe631;</i></a><a title=\"编辑\" href=\"javascript:;\" onclick=\"news_edit(\'新闻编辑\',\'<?php echo url("news/newsEdit",["id"=>$vo["id"]]); ?>\',\'1\',\'800\',\'500\')\" class=\"ml-5\" style=\"text-decoration:none\"><i class=\"Hui-iconfont\">&#xe6df;</i></a>');
				$("#"+id).parents("tr").find(".td-status").html('<span class="label label-success radius">是</span>');
				//$("#"+id).parents("tr").remove();
			}
		}
		layer.msg('已启用!',{icon:1,time:1000});
	});
}
/*成员-编辑*/
function news_edit(title,url,id,w,h){
    $.get(url,{id:id}); //执行控制器中的编辑操作
	layer_show(title,url,w,h);
}
function ckAll(){
	var flag=document.getElementById("allChecks").checked;
	var cks=document.getElementsByName("check");
	for(var i=0;i<cks.length;i++){
		cks[i].checked=flag;
	}
}
</script>

</body>
</html>