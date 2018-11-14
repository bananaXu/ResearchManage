<?php
namespace app\admin\controller;
use think\Request;
use think\Session;
use think\Db;

class Task extends Base
{
	public function taskList()
	{
		// 判断是否已登录
		$this -> isLogin();
		
		$arrylist = Db::query("select t1.id, t1.title, t1.desc, t1.ctime, t1.state, t1.updater_id, t1.updatetime, t1.enable,
									  t1.principal, t1.estimatedTime,
									  (select t2.name from user as t2 where t1.creator_id = t2.id) as creator,
									  (select t3.filename from download as t3 where t1.resource_id = t3.id) as task
								 from task as t1");
		$this -> view -> assign('arrylist', $arrylist);
        return $this -> view -> fetch('task_list');  //渲染首页模板
	}
	
	// 渲染添加界面
	public function taskAdd()
	{
		// 判断是否已登录
		$this -> isLogin();
		
		return $this->view->fetch('task_add');
	}
	
    //任务状态变更
    public function setStatus(Request $request)
    {
        $task_id = $request -> param('id');
		Db::query('update task set enable = 1-enable where id = '.$task_id);
    }
	
    //资源全部启用
    public function startAll(Request $request)
    {
        $task_id = $request -> param('id');
		Db::query('update task set enable = 1 where id = '.$task_id);
    }
	
    //资源全部停用
    public function stopAll(Request $request)
    {
        $task_id = $request -> param('id');
		Db::query('update task set enable = 0 where id = '.$task_id);
    }	
	
    //任务明细状态变更
    public function setStatusDtl(Request $request)
    {
        $task_id = $request -> param('id');
		Db::query('update task_operation set enable = 1-enable where id = '.$task_id);
    }
	
    //资源明细全部启用
    public function startAllDtl(Request $request)
    {
        $task_id = $request -> param('id');
		Db::query('update task_operation set enable = 1 where id = '.$task_id);
    }
	
    //资源明细全部停用
    public function stopAllDtl(Request $request)
    {
        $task_id = $request -> param('id');
		Db::query('update task_operation set enable = 0 where id = '.$task_id);
    }	
	// 渲染编辑界面
	public function taskEdit(Request $request)
	{
		// 判断是否已登录
		$this -> isLogin();

        $task_id = $request -> param('id');
		$result = Db::query("select t1.id, t1.title, t1.desc, t1.ctime, t1.state, t1.updater_id, t1.updatetime, t1.enable,
							  	    (select t2.name from user as t2 where t1.creator_id = t2.id) as creator,
									(select t3.filename from download as t3 where t1.resource_id = t3.id) as task
							   from task as t1
							  where id = ".$task_id);
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
					'category' => '0',
					'cate_dtl' => '0',
					'source' => '任务进度',
					'uploadtime' => date('Y-m-d', time()),
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
					'updatetime' => date('Y-m-d H:i:s', time())
				]);
		// 更新任务操作明细表
		$data = [
			'title' => $title,
			'desc' => $desc,
			'updater_id' => $user_id,
			'updatetime' => date('Y-m-d H:i:s', time()),
			'task_id' => $task_id,
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
		
		$task_id = $request->param('task_id');
		$detail_list = Db::query("select t1.id, t1.title, t1.desc, t1.state, t1.updatetime, t1.enable, 				
										 t1.principal, t1.estimatedTime,
								 		 (select name from user where t1.updater_id = id) as updater,
								 		 (select filename from download where t1.res_id = id) as resource
								    from task_operation as t1
								   where task_id = ".$task_id);
		$this->view->assign('detail_list', $detail_list);
		return $this->view->fetch('task_detail');
	}
}