<?php
namespace app\admin\controller;
use think\Request;
use think\Session;
use think\Db;

class Links extends Base
{
	public function linksList()
	{
		// 判断是否已登录
		$this -> isLogin();
		
		$arrylist = Db::table('links')->select();
		$this -> view -> assign('arrylist', $arrylist);
        return $this -> view -> fetch('links_list');  //渲染首页模板
	}
	
	// 渲染添加界面
	public function linksAdd()
	{
		// 判断是否已登录
		$this -> isLogin();
		
		return $this->view->fetch('links_add');
	}
	
    //状态变更
    public function setStatus(Request $request)
    {
        $links_id = $request -> param('id');
		Db::query('update links set enable = 1-enable where id = '.$links_id);
    }
	
    //全部启用
    public function startAll(Request $request)
    {
        $links_id = $request -> param('id');
		Db::query('update links set enable = 1 where id = '.$links_id);
    }
	
    //全部停用
    public function stopAll(Request $request)
    {
        $links_id = $request -> param('id');
		Db::query('update links set enable = 0 where id = '.$links_id);
    }
	
	// 渲染编辑界面
	public function linksEdit(Request $request)
	{
		// 判断是否已登录
		$this -> isLogin();
		
        $links_id = $request -> param('id');
        $result = Db::table('links') -> find($links_id);
        $this->view->assign('title','编辑链接信息');
        $this->view->assign('links_info',$result);
        return $this->view->fetch('links_edit');
	}
	
	public function editLinks()
	{
		$journal = $_POST['journal'];
		$rate = $_POST['rate'];
		$period = $_POST['period'];
		$address = $_POST['address'];
		$id = $_POST['id'];

		if (empty($journal))
		{
			echo "<script>alert('期刊不能为空！')</script>";
			return;
		}
		
		if (empty($rate))
		{
			echo "<script>alert('评级不能为空！')</script>";
			return;
		}		
		
		if (empty($period))
		{
			echo "<script>alert('周期不能为空！')</script>";
			return;
		}		
		
		if (empty($address))
		{
			echo "<script>alert('地址不能为空！')</script>";
			return;
		}
		
		$data = [
			'journal' => $journal,
			'rate' => $rate,
			'period' => $period,
			'address' => $address,
		];
		Db::table('links')
			->where('id', '=', $id)
			->update($data);
		echo "<script>alert('更新成功！')</script>";
	}
	
	// 上传链接
	public function doaction()
	{
		$journal = $_POST['journal'];
		$rate = $_POST['rate'];
		$period = $_POST['period'];
		$address = $_POST['address'];
		
		if (empty($journal))
		{
			echo "<script>alert('期刊不能为空！')</script>";
			return;
		}
		
		if (empty($rate))
		{
			echo "<script>alert('评级不能为空！')</script>";
			return;
		}		
		
		if (empty($period))
		{
			echo "<script>alert('周期不能为空！')</script>";
			return;
		}		
		
		if (empty($address))
		{
			echo "<script>alert('地址不能为空！')</script>";
			return;
		}

		$data = [
			'journal' => $journal,
			'rate' => $rate,
			'period' => $period,
			'address' => $address,
			'enable' => 1,
		];
		Db::table('links') -> insert($data);
		echo "<script>alert('添加成功！')</script>";
	}
}