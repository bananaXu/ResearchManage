<?php
namespace app\admin\controller;
use think\Request;
use think\Session;
use think\Db;

class Dynamic extends Base
{
	public function dynamicList()
	{
		// 判断是否已登录
		$this -> isLogin();
		
		$arrylist = Db::table('dynamic')->select();
		$this -> view -> assign('arrylist', $arrylist);
        return $this -> view -> fetch('dynamic_list');  //渲染首页模板
	}
	
	// 渲染添加界面
	public function dynamicAdd()
	{
		// 判断是否已登录
		$this -> isLogin();
		
		return $this->view->fetch('dynamic_add');
	}
	
    //状态变更
    public function setStatus(Request $request)
    {
        $dynamic_id = $request -> param('id');
		Db::query('update dynamic set enable = 1-enable where id = '.$dynamic_id);
    }
	
    //全部启用
    public function startAll(Request $request)
    {
        $dynamic_id = $request -> param('id');
		Db::query('update dynamic set enable = 1 where id = '.$dynamic_id);
    }
	
    //全部停用
    public function stopAll(Request $request)
    {
        $dynamic_id = $request -> param('id');
		Db::query('update dynamic set enable = 0 where id = '.$dynamic_id);
    }
	
	// 渲染编辑界面
	public function dynamicEdit(Request $request)
	{
		// 判断是否已登录
		$this -> isLogin();
		
        $dynamic_id = $request -> param('id');
        $result = Db::table('dynamic') -> find($dynamic_id);
        $this->view->assign('title','编辑成员动态信息');
        $this->view->assign('dynamic_info',$result);
        return $this->view->fetch('dynamic_edit');
	}
	
	public function editdynamic()
	{
		$name = $_POST['name'];
		$content = $_POST['content'];
		$id = $_POST['id'];

		if (empty($name))
		{
			echo "<script>alert('姓名不能为空！')</script>";
			return;
		}
		
		if (empty($content))
		{
			echo "<script>alert('内容不能为空！')</script>";
			return;
		}
		date_default_timezone_set('Asia/Shanghai');
		$data = [
			'name' => $name,
			'content' => $content,
			'time' => date('Y-m-d H:i:s', time()),
		];
		Db::table('dynamic')
			->where('id', '=', $id)
			->update($data);
		echo "<script>alert('更新成功！')</script>";
	}
	
	// 上传成员动态
	public function doaction()
	{
		$name = $_POST['name'];
		$content = $_POST['content'];
		
		if (empty($name))
		{
			echo "<script>alert('姓名不能为空！')</script>";
			return;
		}
		
		if (empty($content))
		{
			echo "<script>alert('内容不能为空！')</script>";
			return;
		}
		date_default_timezone_set('Asia/Shanghai');
		$data = [
			'name' => $name,
			'content' => $content,
			'time' => date('Y-m-d H:i:s', time()),
		];
		Db::table('dynamic')
			->insert($data);
		echo "<script>alert('添加成功！')</script>";
	}
}