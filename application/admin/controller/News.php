<?php
namespace app\admin\controller;
use think\Request;
use think\Session;
use think\Db;

class news extends Base
{
	public function newsList()
	{
		// 判断是否已登录
		$this -> isLogin();
		
		$arrylist = Db::table('news')->select();
		$this -> view -> assign('arrylist', $arrylist);
        return $this -> view -> fetch('news_list');  //渲染首页模板
	}
	
	// 渲染添加界面
	public function newsAdd()
	{
		// 判断是否已登录
		$this -> isLogin();
		
		return $this->view->fetch('news_add');
	}
	
    //新闻状态变更
    public function setStatus(Request $request)
    {
        $news_id = $request -> param('id');
		Db::query('update news set enable = 1-enable where id = '.$news_id);
    }
	
    //资源全部启用
    public function startAll(Request $request)
    {
        $news_id = $request -> param('id');
		Db::query('update news set enable = 1 where id = '.$news_id);
    }
	
    //资源全部停用
    public function stopAll(Request $request)
    {
        $news_id = $request -> param('id');
		Db::query('update news set enable = 0 where id = '.$news_id);
    }
	
	// 渲染编辑界面
	public function newsEdit(Request $request)
	{
		// 判断是否已登录
		$this -> isLogin();
		
        $news_id = $request -> param('id');
        $result = Db::table('news') -> find($news_id);
        $this->view->assign('title','编辑资源信息');
        $this->view->assign('news_info',$result);
        return $this->view->fetch('news_edit');
	}
	
	public function editNews()
	{
		$filename=$_FILES['myFile']['name'];
		$type=$_FILES['myFile']['type'];
		$tmp_name=$_FILES['myFile']['tmp_name'];
		$size=$_FILES['myFile']['size'];
		$error=$_FILES['myFile']['error'];
		
		// 获取文件名、后缀、作者、上传者
		$houzhui = substr(strrchr($filename, '.'), 1);
		$result = str_replace(".".$houzhui,"",$filename);
		$title = $_POST['title'];
		$content = $_POST['content'];
		$id = $_POST['id'];

		if (strlen($title) <= 6)
		{
			echo "<script>alert('标题太短')</script>";
			return;
		}
		
		if (strlen($content) <= 12)
		{
			echo "<script>alert('内容太短')</script>";
			return;
		}
		
		if ($error == 4) // 文件为空
		{
			date_default_timezone_set('Asia/Shanghai');
			$data = [
				'title' => $title,
				'content' => $content,
				'updatetime' => date('Y-m-d', time()),
			];
			Db::table('news')
				->where('id', '=', $id)
				->update($data);
			echo "<script>alert('更新成功！')</script>";
			return;
		}
		
		// 检查是否为图片
		$filetype = ['image/jpg', 'image/jpeg', 'image/gif', 'image/bmp', 'image/png'];
		if (!in_array($type, $filetype))
		{
			echo "<script>alert('不是图片类型！')</script>";
			return;
		}
		// 查看是否已存在相同的
		$findid = Db::table('news')
			->where('picture', '=', $filename)
			->find();
		if (is_null($findid))
		{
			move_uploaded_file($tmp_name, "img/newsImg/".iconv("UTF-8", "gbk", $filename));
		}
		if ($error==0) {
			date_default_timezone_set('Asia/Shanghai');
			$data = [
				'title' => $title,
				'content' => $content,
				'picture' => $filename,
				'updatetime' => date('Y-m-d', time()),
			];
			Db::table('news')
				->where('id', '=', $id)
				->update($data);
			echo "<script>alert('更新成功！')</script>";
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
		}
	}
	
	// 上传新闻
	public function doaction()
	{
		$filename=$_FILES['myFile']['name'];
		$type=$_FILES['myFile']['type'];
		$tmp_name=$_FILES['myFile']['tmp_name'];
		$size=$_FILES['myFile']['size'];
		$error=$_FILES['myFile']['error'];
		
		// 获取文件名、后缀、作者、上传者
		$houzhui = substr(strrchr($filename, '.'), 1);
		$result = str_replace(".".$houzhui,"",$filename);
		$title = $_POST['title'];
		$content = $_POST['content'];
		
		if (strlen($title) <= 6)
		{
			echo "<script>alert('标题太短')</script>";
			return;
		}
		
		if (strlen($content) <= 12)
		{
			echo "<script>alert('内容太短')</script>";
			return;
		}
		
		if ($error == 4) // 文件为空
		{
			date_default_timezone_set('Asia/Shanghai');
			$data = [
				'title' => $title,
				'content' => $content,
				'updatetime' => date('Y-m-d', time()),
			];
			Db::table('news')
				->insert($data);
			echo "<script>alert('添加成功！')</script>";
			return;
		}
		
		// 检查是否为图片
		$filetype = ['image/jpg', 'image/jpeg', 'image/gif', 'image/bmp', 'image/png'];
		if (!in_array($type, $filetype))
		{
			echo "<script>alert('不是图片类型！')</script>";
			return;
		}
		
		// 查看是否已存在相同的
		$findid = Db::table('news')
			->where('picture', '=', $filename)
			->find();
		if (!is_null($findid))
		{
			echo "<script>alert('您上传的图片已存在！')</script>";
			return;
		}

		//将服务器上的临时文件移动到指定位置
		//方法一move_upload_file($tmp_name,$destination)
		//move_uploaded_file($tmp_name, "uploads/".$filename);//文件夹应提前建立好，不然报错
		//方法二copy($src,$des)
		//以上两个函数都是成功返回真，否则返回false
		//copy($tmp_name, "copies/".$filename);
		//注意，不能两个方法都对临时文件进行操作，临时文件似乎操作完就没了，我们试试反过来
		//copy($tmp_name, "upload/".$filename);
		move_uploaded_file($tmp_name, "img/newsImg/".iconv("UTF-8", "gbk", $filename));
		//能够实现，说明move那个函数基本上相当于剪切；copy就是copy，临时文件还在

		//另外，错误信息也是不一样的，遇到错误可以查看或者直接报告给用户
		if ($error==0) {
			date_default_timezone_set('Asia/Shanghai');
			$data = [
				'title' => $title,
				'content' => $content,
				'picture' => $filename,
				'updatetime' => date('Y-m-d', time()),
			];
			Db::table('news')
				->insert($data);
			echo "<script>alert('添加成功！')</script>";
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
		}
	}
}