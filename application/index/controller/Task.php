<?php
namespace app\index\controller;

use think\Request;
use think\Session;
use think\Db;

class Task extends Base
{	
    public function task()
    {
		// 判断是否已登录
		$this -> isLogin();
		
		$arrylist = Db::query("select t1.id, t1.title, t1.desc, t1.ctime, t1.state, t1.updater_id, t1.updatetime,
									  t1.principal, t1.estimatedTime,
								  (select name from user where t1.creator_id = id) as creator,
								  (select CONCAT(filename, '.', filetype) from download where t1.resource_id = id) as resource
							 from task as t1
							where enable = 1");
		$this -> view -> assign('arrylist', $arrylist);
        return $this -> view -> fetch();  //渲染首页模板
    }
	
	// 渲染添加界面
	public function taskAdd()
	{
		// 判断是否已登录
		$this -> isLogin();
		$estimatedTime = date("Y-m-d", time());
		$this->view->estimatedTime = $estimatedTime;
		
        return $this->view->fetch('task_add');
	}
	
	// 任务添加到数据库
	public function addTask()
	{
		// 获取文件相关信息
		$filename=$_FILES['myFile']['name'];
		$type=$_FILES['myFile']['type'];
		$tmp_name=$_FILES['myFile']['tmp_name'];
		$size=$_FILES['myFile']['size'];
		$error=$_FILES['myFile']['error'];
		// 获取表单所有值
		$principal = $_POST['principal'];
		$estimatedTime = $_POST['estimatedTime'];
		$title = $_POST['title'];
		$desc = $_POST['desc'];
		$state = $_POST['state'];
		// 设置时间格式，获取当前登录人的信息
		date_default_timezone_set('Asia/Shanghai');
		$user_id = Session::get('user_id');
		$userRes = Db::query('select name from user where id ='.$user_id);
		$uploader = $userRes[0]['name'];
		// 不能够为空的几个选项
		if (is_null($title)) {
			echo "<script>alert('任务名称不能为空！')</script>";
			return;
		}
		if (is_null($principal)) {
			echo "<script>alert('负责人不能为空！')</script>";
			return;
		}
		if (is_null($estimatedTime)) {
			echo "<script>alert('预计完成时间不能为空！')</script>";
			return;
		}
		// 如果未上传文件，将资源id赋空
		if ($error == 4) {
			$res_id = "";
		}
		// 如果上传了文件，将其添加到指定文件夹并将信息添加到资源表
		else {
			// 获取文件名、后缀、作者、上传者
			$houzhui = substr(strrchr($filename, '.'), 1);
			$result = str_replace(".".$houzhui,"",$filename);
			// 查看是否已存在相同的(文件名+扩展名)
			$findid = Db::table('download')
				->where('filename', '=', $result)
				->where('filetype', '=', $houzhui)
				->find();
			if (!is_null($findid))
			{
				echo "<script>alert('您上传的文件已存在！')</script>";
				return;
			}
			// 将临时文件移动到指定文件夹
			move_uploaded_file($tmp_name, "upload/".iconv("UTF-8", "gbk", $filename));
			if ($error==0 || $error == 4) {
				// 更新资源表
				$data = [
					'filename' => $result,
					'filesize' => $size,
					'filetype' => $houzhui,
					'author' => $uploader,
					'uploader' => $uploader,
					'description' => $desc,
					'source' => '任务进度',
					'uploadtime' => date('Y-m-d', time()),
					'enable' => 0,
				];
				Db::table('download')->insert($data);
				$res_id = Db::name('download')->getLastInsID();
			}
			else {
				switch ($error){
					case 1:
						echo "<script>alert('超过了上传文件的最大值，请上传1G以下文件！')</script>";
						break;
					case 2:
						echo "<script>alert('上传文件过多，请一次上传20个及以下文件！')</script>";
						break;
					case 3:
						echo "<script>alert('文件并未完全上传，请再次尝试！')</script>";
						break;
					case 4:
						echo "<script>alert('未选择上传文件！')</script>";
						break;
					case 5:
						echo "<script>alert('上传文件为0！')</script>";
						break;
				}
				return;
			}
		}
		// 更新任务表
		$data = [
			'title' => $title,
			'desc' => $desc,
			'creator_id' => $user_id,
			'ctime' => date('Y-m-d H:i:s', time()),
			'state' => $state,
			'principal' => $principal,
			'estimatedTime' => $estimatedTime,
			'updater_id' => $user_id,
			'updatetime' => date('Y-m-d H:i:s', time()),
			'resource_id' => $res_id,
			'enable' => '1',
		];
		Db::table('task')->insert($data);
		$task_id = Db::name('task')->getLastInsID();
		// 更新任务操作明细表
		$data = [
			'title' => $title,
			'desc' => $desc,
			'updater_id' => $user_id,
			'updatetime' => date('Y-m-d H:i:s', time()),
			'principal' => $principal,
			'estimatedTime' => $estimatedTime,
			'task_id' => $task_id,
			'enable' => '1',
			'state' => $state,
			'res_id' => $res_id,
		];
		Db::table('task_operation')->insert($data);
		echo "<script>alert('上传成功！')</script>";
	}
	
	public function taskEdit(Request $request)
	{
		// 判断是否已登录
		$this -> isLogin();
		
        $task_id = $request -> param('id');
		$result = Db::query("select t1.id, t1.title, t1.desc, t1.ctime, t1.state, t1.updater_id, t1.updatetime, t1.enable,
									t1.principal, t1.estimatedTime,
							  	    (select name from user where t1.creator_id = id and enable = 1) as creator,
									(select CONCAT(filename, '.', filetype) from download where t1.resource_id = id and enable = 1) as resource
							   from task as t1
							  where enable = 1 
							    and id = ".$task_id);
        $this->view->assign('title','编辑任务信息');
        $this->view->assign('task_info',$result[0]);
        return $this->view->fetch('task_edit');
	}
	
	public function editTask()
	{
		$filename=$_FILES['myFile']['name'];
		$type=$_FILES['myFile']['type'];
		$tmp_name=$_FILES['myFile']['tmp_name'];
		$size=$_FILES['myFile']['size'];
		$error=$_FILES['myFile']['error'];

		date_default_timezone_set('Asia/Shanghai');
		$principal = $_POST['principal'];
		$estimatedTime = $_POST['estimatedTime'];
		$task_id = $_POST['id'];
		$title = $_POST['title'];
		$state = $_POST['state'];
		$desc = $_POST['desc'];
		$user_id = Session::get('user_id');
		
		if ($error == 4) // 没有上传资源
		{
			$res_id = "";
		}
		else
		{
			// 获取文件名、后缀、作者、上传者
			$houzhui = substr(strrchr($filename, '.'), 1);
			$result = str_replace(".".$houzhui,"",$filename);
			
			// 查看是否已存在相同的(文件名+扩展名)
			$findid = Db::table('download')
				->where('filename', '=', $result)
				->where('filetype', '=', $houzhui)
				->find();
			if (!is_null($findid))
			{
				echo "<script>alert('您上传的文件已存在！')</script>";
				return;
			}
			move_uploaded_file($tmp_name, "upload/".iconv("UTF-8", "gbk", $filename));
			//能够实现，说明move那个函数基本上相当于剪切；copy就是copy，临时文件还在
			//另外，错误信息也是不一样的，遇到错误可以查看或者直接报告给用
			if ($error == 0){ // 更新资源表			
				$userRes = Db::query('select name from user where id ='.$user_id);
				$uploader = $userRes[0]['name'];
				$data = [
					'filename' => $result,
					'filesize' => $size,
					'filetype' => $houzhui,
					'author' => $uploader,
					'uploader' => $uploader,
					'description' => $desc,
					'source' => '任务进度',
					'uploadtime' => date('Y-m-d', time()),
					'enable' => 0,
				];
				Db::table('download')->insert($data);
				$res_id = Db::name('download')->getLastInsID();
			}
			else {
				switch ($error){
					case 1:
						echo "<script>alert('超过了上传文件的最大值，请上传1G以下文件！')</script>";
						break;
					case 2:
						echo "<script>alert('上传文件过多，请一次上传20个及以下文件！')</script>";
						break;
					case 3:
						echo "<script>alert('文件并未完全上传，请再次尝试！')</script>";
						break;
					case 4:
						echo "<script>alert('未选择上传文件！')</script>";
						break;
					case 5:
						echo "<script>alert('上传文件为0！')</script>";
						break;
				}
				return;
			}
		}
		// 更新任务表
		Db::table('task')
			->where('id', $task_id)
			->update([
					'title' => $title,
					'state' => $state,
					'desc' => $desc,
					'updater_id' => $user_id,	
					'resource_id' => $res_id,
					'principal' => $principal,
					'estimatedTime' => $estimatedTime,
					'updatetime' => date('Y-m-d H:i:s', time())
				]);
		// 更新任务操作明细表
		$data = [
			'title' => $title,
			'desc' => $desc,
			'updater_id' => $user_id,
			'updatetime' => date('Y-m-d H:i:s', time()),
			'task_id' => $task_id,
			'principal' => $principal,
			'estimatedTime' => $estimatedTime,
			'enable' => '1',
			'state' => $state,
			'res_id' => $res_id,
		];
		Db::table('task_operation')->insert($data);
		echo "<script>alert('更新成功！')</script>";
	}
	
	public function taskDetail(Request $request)
	{
		// 判断是否已登录
		$this -> isLogin();
		
		$task_id = $request->param("task_id");
		$detail_list = Db::query("select t1.id, t1.title, t1.desc, t1.state, t1.updatetime, t1.principal, t1.estimatedTime,
								 		 (select name from user where t1.updater_id = id and enable = 1) as updater,
								 		 (select CONCAT(filename, '.', filetype) from download where t1.res_id = id and enable = 1) as resource
								    from task_operation as t1
								   where enable = 1
								 	 and task_id = ".$task_id."
							    order by updatetime desc");
		$this->view->assign('detail_list', $detail_list);
		return $this->view->fetch('task_detail');
	}

	public function downloadfile()
	{
		$filename = iconv("UTF-8", "gbk", $_GET['filename']);
		if (empty($filename))
		{
			echo "<script>alert('未上传任何资源！')</script>";
			return;
		}
		$filename = 'upload/'.$filename;
		if(file_exists($filename))
		{
			header('content-disposition:attachment;filename='.substr(strrchr($filename, "/"), 1));
			header('content-length:'.filesize($filename));
			readfile($filename);
		}
		else
		{
			echo "<script>alert('您要访问的资源不存在！')</script>";
		}
	}
}
