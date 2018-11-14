<?php
namespace app\admin\controller;
use think\Request;
use think\Session;
use think\Db;

class Member extends Base
{
	public function memberList()
	{
		// 判断是否已登录
		$this -> isLogin();
		
		$arrylist = Db::table('member')->select();
		$this -> view -> assign('arrylist', $arrylist);
        return $this -> view -> fetch('member_list');  //渲染首页模板
	}
	
	// 渲染添加界面
	public function memberAdd()
	{
		// 判断是否已登录
		$this -> isLogin();
		return $this->view->fetch('member_add');
	}
	
    // 成员状态变更
    public function setStatus(Request $request)
    {
        $member_id = $request -> param('id');
		Db::query('update member set enable = 1-enable where id = '.$member_id);
    }
	
    //资源全部启用
    public function startAll(Request $request)
    {
        $member_id = $request -> param('id');
		Db::query('update member set enable = 1 where id = '.$member_id);
    }
	
    //资源全部停用
    public function stopAll(Request $request)
    {
        $member_id = $request -> param('id');
		Db::query('update member set enable = 0 where id = '.$member_id);
    }
	
	// 渲染编辑界面
	public function memberEdit(Request $request)
	{
		// 判断是否已登录
		$this -> isLogin();
		
        $member_id = $request -> param('id');
        $result = Db::table('member') -> find($member_id);
        $this->view->assign('title','编辑资源信息');
        $this->view->assign('member_info',$result);
        return $this->view->fetch('member_edit');
	}
	
	public function editMember()
	{
		$filename=$_FILES['myFile']['name'];
		$type=$_FILES['myFile']['type'];
		$tmp_name=$_FILES['myFile']['tmp_name'];
		$size=$_FILES['myFile']['size'];
		$error=$_FILES['myFile']['error'];
		
		// 获取文件名、后缀、作者、上传者
		$id = $_POST['id'];
		$houzhui = substr(strrchr($filename, '.'), 1);
		$result = str_replace(".".$houzhui,"",$filename);
		$name = $_POST['name'];
		$spell = $_POST['spell'];
		$education = $_POST['education'];
		$sex = $_POST['sex'];
		$grade = $_POST['grade'];
		$direction = $_POST['direction'];
		$contact = $_POST['contact'];
		$intro = $_POST['intro'];
		$hobbies = $_POST['hobbies'];
		$achievement = $_POST['achievement'];

		if (empty($direction))
		{
			echo "<script>alert('方向不能为空')</script>";
			return;
		}
		
		if (empty($intro))
		{
			echo "<script>alert('简介不能为空')</script>";
			return;
		}
		$pre_photoname_sel = Db::query('select photoname from member where id = '.$id);
		$pre_photoname = $pre_photoname_sel[0]['photoname'];
		// 检查是否为图片
		$filetype = ['image/jpg', 'image/jpeg', 'image/gif', 'image/bmp', 'image/png'];
		if ($error == 4 || $filename == $pre_photoname)
			$filename = $pre_photoname;
		else if (!in_array($type, $filetype))
		{
			echo "<script>alert('不是图片类型！')</script>";
			return;
		}
		// 查看是否已存在相同的
		$findid = Db::table('member')
			->where('photoname', '=', $filename)
			->find();
		if (!is_null($findid) && $filename != $pre_photoname)
		{
			echo "<script>alert('您上传的图片已存在！')</script>";
			return;
		}
		move_uploaded_file($tmp_name, "img/memImg/".iconv("UTF-8", "gbk", $filename));
		if ($error == 0 || $error == 4) {
			date_default_timezone_set('Asia/Shanghai');
			$data = [
				'name' => $name,
				'spell' => $spell,
				'education' => $education,
				'sex' => $sex,
				'grade' => $grade,
				'direction' => $direction,
				'intro' => $intro,
				'contact' => $contact,
				'hobbies' => $hobbies,
				'achievement' => $achievement,
				'photoname' => $filename,
				'updatetime' => date('Y-m-d', time()),
			];
			Db::table('member')
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
	
	// 上传成员信息
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
		$name = $_POST['name'];
		$spell = $_POST['spell'];
		$education = $_POST['education'];
		$sex = $_POST['sex'];
		$grade = $_POST['grade'];
		$direction = $_POST['direction'];
		$contact = $_POST['contact'];
		$intro = $_POST['intro'];
		$hobbies = $_POST['hobbies'];
		$achievement = $_POST['achievement'];

		if (empty($name))
		{
			echo "<script>alert('姓名不能为空')</script>";
			return;
		}
		
		if (empty($direction))
		{
			echo "<script>alert('方向不能为空')</script>";
			return;
		}
		
		if (empty($intro))
		{
			echo "<script>alert('简介不能为空')</script>";
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
		$findid = Db::table('member')
			->where('photoname', '=', $filename)
			->find();
		if (!is_null($findid))
		{
			echo "<script>alert('您上传的图片已存在！')</script>";
			return;
		}
		move_uploaded_file($tmp_name, "static/img/member/".iconv("UTF-8", "gbk", $filename));
		if ($error==0) {
			date_default_timezone_set('Asia/Shanghai');
			$data = [
				'name' => $name,
				'spell' => $spell,
				'education' => $education,
				'sex' => $sex,
				'grade' => $grade,
				'direction' => $direction,
				'contact' => $contact,
				'intro' => $intro,
				'hobbies' => $hobbies,
				'achievement' => $achievement,
				'photoname' => $filename,
				'updatetime' => date('Y-m-d', time()),
			];
			Db::table('member')
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