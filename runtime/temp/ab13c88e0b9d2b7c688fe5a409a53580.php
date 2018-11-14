<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:85:"D:\myphp_www\PHPTutorial\WWW\pt5\public/../application/index\view\download\media.html";i:1540281886;}*/ ?>
<html>
<body>
    <div id="handout_wrap_inner"></div>
</body>
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
<script type="text/javascript">  
$('#handout_wrap_inner').media({
	width: '100%',
	height: '96%',
	autoplay: true,
	src:'/upload/<?php echo $fileName; ?>.<?php echo $fileType; ?>',
		});
</script>
</html>