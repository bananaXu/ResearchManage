<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:97:"C:\myphp_www\PHPTutorial\WWW\ResearchManage\public/../application/admin\view\user\admin_list.html";i:1542187369;s:83:"C:\myphp_www\PHPTutorial\WWW\ResearchManage\application\admin\view\public\base.html";i:1501913354;s:83:"C:\myphp_www\PHPTutorial\WWW\ResearchManage\application\admin\view\public\meta.html";i:1541999460;s:85:"C:\myphp_www\PHPTutorial\WWW\ResearchManage\application\admin\view\public\header.html";i:1539226549;s:83:"C:\myphp_www\PHPTutorial\WWW\ResearchManage\application\admin\view\public\menu.html";i:1541989646;s:85:"C:\myphp_www\PHPTutorial\WWW\ResearchManage\application\admin\view\public\footer.html";i:1540896626;}*/ ?>
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



<title><?php echo (isset($title) && ($title !== '')?$title:'标题'); ?></title>
<meta name="keywords" content="<?php echo (isset($keywords) && ($keywords !== '')?$keywords:'关键字'); ?>">
<meta name="description" content="<?php echo (isset($desc) && ($desc !== '')?$desc:'描述'); ?>">

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
                <ul>
                    <li><a href="<?php echo url('dynamic/dynamicList'); ?>" title="成员动态">成员动态</a></li>
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
                    <li><a href="<?php echo url('resource/resourceCate'); ?>" title="分类列表">分类列表</a></li>
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
            <dt><i class="Hui-iconfont">&#xe6f1;</i> 链接管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>				
                    <li><a href="<?php echo url('links/linksList'); ?>" title="链接列表">链接列表</a></li>
                </ul>
            </dd>
        </dl>
		
        <dl id="menu-admin">
            <dt><i class="Hui-iconfont">&#xe6f1;</i> 学科管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>				
                    <li><a href="<?php echo url('subject/subjectList'); ?>" title="学科列表">学科列表</a></li>
                </ul>
            </dd>
        </dl>
		
        <dl id="menu-admin">
            <dt><i class="Hui-iconfont">&#xe62d;</i> 用户管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a href="<?php echo url('user/adminList'); ?>" title="管理员列表">用户列表</a></li>
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
		用户管理
		<span class="c-gray en">&gt;</span>
		用户列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a> </nav>
	<div class="Hui-article">
		<article class="cl pd-20">
			<!--如果是admin显示用户数量,其它用户没必要显示-->
			<?php if(\think\Session::get('user_info.name') == 'admin'): ?>
			<div class="cl pd-5 bg-1 bk-gray mt-20">
				<span class="l">
					<a href="javascript:;" onclick="unDelete()" class="btn btn-danger radius">
						<i class="Hui-iconfont">&#xe6e2;</i> 批量恢复</a>
					<a href="javascript:;" onclick="admin_add('添加管理员','<?php echo url("user/adminAdd"); ?>','800','500')" class="btn btn-primary radius">
					<i class="Hui-iconfont">&#xe600;</i> 添加用户</a>
				</span>
				<span class="r">共有数据：<strong><?php echo $count; ?></strong> 条</span>
			</div>
			<?php endif; ?>
			<div class="mt-10">
				<table class="table table-border table-bordered table-bg table-sort">
					<thead>
						<tr>
							<th scope="col" colspan="9">信息列表</th>
						</tr>
						<tr class="text-c">
							<th width="40">ID</th>
							<th width="100">用户名</th>
							<th width="150">邮箱</th>
							<th width="100">角色</th>
							<th width="50">登陆次数</th>
							<th width="130">上次登陆时间</th>
							<th width="100">是否已启用</th>
							<th width="100">操作</th>
						</tr>
					</thead>
					<tbody>

					<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<tr class="text-c">
							<td><?php echo $vo['id']; ?></td>
							<td><?php echo $vo['name']; ?></td>
							<td><?php echo $vo['email']; ?></td>
							<td><?php echo $vo['role']; ?></td>
							<td><?php echo $vo['login_count']; ?></td>
							<td><?php echo $vo['login_time']; ?></td>
							<td class="td-status">  
								<?php if($vo['status'] == '已启用'): ?>
								<span class="label label-success radius"><?php echo $vo['status']; ?></span>
								<?php else: ?>
								<span class="label radius"><?php echo $vo['status']; ?></span>
								<?php endif; ?>
							</td>
							<td class="td-manage">
								<!--切换启用与禁用图标-->
								<!--只允许admin有权启用或停用-->
								<?php if(\think\Session::get('user_info.name') == 'admin'): if($vo['status'] == '已启用'): if($vo['name'] == 'admin'): ?>
								<a style="text-decoration:none;pointer-events:none;cursor:default;" onClick="admin_stop(this,<?php echo $vo['id']; ?>)" href="javascript:;" title="停用">
									<i class="Hui-iconfont">&#xe631;</i>
								</a>
								<?php else: ?>
								<a style="text-decoration:none" onClick="admin_stop(this,<?php echo $vo['id']; ?>)" href="javascript:;" title="停用">
									<i class="Hui-iconfont">&#xe631;</i>
								</a>
								<?php endif; else: ?>
								<a style="text-decoration:none" onClick="admin_start(this,<?php echo $vo['id']; ?>)" href="javascript:;" title="启用">
									<i class="Hui-iconfont">&#xe615;</i>
								</a>									
								<?php endif; endif; ?>


								<a title="编辑" href="javascript:;" onclick="admin_edit('管理员编辑','<?php echo url("user/adminEdit",["id"=>$vo["id"]]); ?>','1','800','500')" class="ml-5" style="text-decoration:none">
									<i class="Hui-iconfont">&#xe6df;</i>
								</a>

								<!--只允许admin有删除权限-->
								<?php if(\think\Session::get('user_info.name') == 'admin'): if($vo['name'] == 'admin'): ?>
								<a title="删除" href="javascript:;" onclick="admin_del(this,<?php echo $vo['id']; ?>)" class="ml-5" style="text-decoration:none;pointer-events:none;cursor:default;">
									<i class="Hui-iconfont">&#xe6e2;</i>
								</a>
								<?php else: ?>
								<a title="删除" href="javascript:;" onclick="admin_del(this,<?php echo $vo['id']; ?>)" class="ml-5" style="text-decoration:none">
									<i class="Hui-iconfont">&#xe6e2;</i>
								</a>
								<?php endif; endif; ?>


							</td>
						</tr>
					<?php endforeach; endif; else: echo "" ;endif; ?>

					</tbody>
				</table>
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


<!--请在下方写此页面业务相关的脚本--> 
<script type="text/javascript" src="/static/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="/static/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/static/lib/laypage/1.2/laypage.js"></script> 
<script type="text/javascript">
/*
	参数解释：
	title	标题
	url		请求的url
	id		需要操作的数据id
	w		弹出层宽度（缺省调默认值）
	h		弹出层高度（缺省调默认值）
*/
$('.table-sort').dataTable({
	"aaSorting": [[ 1, "desc" ]],//默认第几个排序
	"bStateSave": true,//状态保存
	"searching": false,//是否显示查询
    "lengthChange": true,//是否使用下位列表选择分页大小
	"aoColumnDefs": [
		//{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		{"orderable":false,"aTargets":[2, 7]}// 不参与排序的列
	]
});
/*管理员-增加*/
function admin_add(title,url,w,h){
	$.post(url);
	layer_show(title,url,w,h);
}


/*管理员-删除*/
function admin_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
		$.get("<?php echo url('user/deleteUser'); ?>",{id:id})
		
		$(obj).parents("tr").remove();
		layer.msg('已删除!',{icon:1,time:1000});
	});
}
/*管理员-编辑*/
function admin_edit(title,url,id,w,h){
    $.get(url,{id:id}); //执行控制器中的编辑操作
	layer_show(title,url,w,h);
}
/*管理员-停用*/
function admin_stop(obj,id){

	layer.confirm('确认要停用吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
		$.get("<?php echo url('user/setStatus'); ?>",{id:id});
		
		$(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_start(this,'+id+')" href="javascript:;" title="启用" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">已禁用</span>');
		$(obj).remove();
		layer.msg('已停用!',{icon: 5,time:1000});
	});
}

/*管理员-启用*/
function admin_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
        $.get("<?php echo url('user/setStatus'); ?>",{id:id});
		
		$(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_stop(this,'+id+')" href="javascript:;" title="停用" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
		$(obj).remove();
		layer.msg('已启用!', {icon: 6,time:1000});
	});
}

//批量恢复(原模板中没有,自己动手,丰衣足食)
function unDelete() {

    layer.confirm('确认要恢复吗？', function () {
        $.get("<?php echo url('user/unDelete'); ?>");

        layer.msg('已恢复!', {icon: 1, time: 1000}); //消息弹层1秒后消失
        window.location.reload(); //重新加载页面,显示所有数据
    });
}


</script> 
<!--/请在上方写此页面业务相关的脚本-->

</body>
</html>