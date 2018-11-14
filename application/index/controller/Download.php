<?php
namespace app\index\controller;

use think\Request;
use think\Session;
use think\Db;

class Download extends Base
{
	// 资源共享界面
    public function download()
    {
		// 判断是否已登录
		$this -> isLogin();
		
		// 首次登陆没有查询条件，预设条件
		$logmin = '1900-01-01';
		$logmax = date("Y-m-d", time());
		$selected = '%';
		$keywords = '';
		
		// 需要取的字段
		$arrylist = Db::query('select id, filename, filetype, author, source, category, cate_dtl, 
										  description, uploadtime, "" as labels
								 from download
								where enable = 1');
		foreach ($arrylist as $v => $k)
		{
			$label_id = Db::query('select label_id from res_label where res_id = '.$arrylist[$v]['id']);
			if (!empty($label_id)) {
				foreach ($label_id as $m => $n)
				{
					$labels = Db::query('select id, name from label where id = '.$label_id[$m]['label_id']);
					$arrylist[$v]['labels'] .= "<span class=\"label label-default\">".$labels[0]['name']."</span> ";
				}
			}
		}
		
		// 获取分类信息，将分类信息拼成html传到前台
		$cate = Db::query('select id, category from res_cat where enable = 1'); // 所有大分类
		$html = "<ul id=\"myTab\" class=\"nav nav-tabs\">";
		// 循环大分类，拼成头部
		foreach ($cate as $c => $v)
		{
			if ($c == 0)
				$html .= "<li class=\"active\"><a href=\"#cate".$c."\" data-toggle=\"tab\">";
			else
				$html .= "<li><a href=\"#cate".$c."\" data-toggle=\"tab\">";
			$html .= $v['category'];
			$html .= "</a></li>";
		}
		$html .= "</ul>";
		// 循环大分类，并获取其对应子类，将子类拼成其头部对应内容
		$html .= "<div id=\"group\" class=\"hid\" style=\"display: block;\"><div id=\"myTabContent\" class=\"tab-content\">";
		foreach ($cate as $c => $v)
		{
			if ($c == 0)
				$html .= "<div class=\"tab-pane fade in active\" id=\"cate".$c."\">";
			else
				$html .= "<div class=\"tab-pane fade\" id=\"cate".$c."\">";
			// 获取子类
			$cate_dtl = Db::query('select id, cat_dtl from res_cat_dtl where enable = 1 and cat_id = '.$v['id']);
			$html .= "<ul>";
			foreach ($cate_dtl as $va)
			{
				$num = Db::query('select count(*) as num from download where enable = 1 and cate_dtl = '.$va['id']);
				$html .= "<li><a type=\"0\" id=\"".$va['id']."\" href=\"javascript:;\" class=\"btnUnclick\" onclick=\"clickDtl(this, ".$va['id'].", '".$va['cat_dtl']."')\">".$va['cat_dtl']."</a>(".$num[0]['num'].")</li>";
			}
			$html .= "</ul>";
			$html .= "</div>";
		}
		$html .= "</div></div>";
		
		// 将默认信息设置到页面
		$this -> view -> logmin = $logmin;
		$this -> view -> logmax = $logmax;
		$this -> view -> keywords = $keywords;
		$this -> view -> selected = $selected;
		$this -> view -> assign('arrylist', $arrylist);
		$this -> view -> cate = $html;

        return $this -> view -> fetch('download');  //渲染首页模板
    }
	
	public function ajaxSearchresbyCates()
	{
		// 判断是否已登录
		$this -> isLogin();
		
		// 获取form表单数据
		$keywords = $_POST['keywords'];
		$logmin = $_POST['logmin'];
		$logmax = $_POST['logmax'];
		$cates = [];
		$hasCate = false;
		
		// 查看是否选择了标签
		if (isset($_POST['cates']))
		{
			$cates = $_POST['cates'];
			$hasCate = true;
		}
		$selected = $_POST['selected'];
		$isFirst = true;
		
		// 关键字选择
		switch ($selected)
		{
		case '1':
			$select = 'filename';
			break;
		case '2':
			$select = 'source';
			break;
		case '3':
			$select = 'author';
			break;
		case '4':
			$select = 'uploader';
			break;
		default:
			$select = '%';
		}
		
		// 需要取的字段
		$sel = 'select id, filename, filetype, author, source, category, cate_dtl, description, uploadtime, "" as labels';
		// 必要条件
		$selCond = ' from download d
				  where uploadtime >= \''.$logmin.'\'
				    and uploadtime <= \''.$logmax.'\'
				    and enable = 1';
		// 如果选择全部需要加上的条件
		$selAll = ' and (filename like \'%'.$keywords.'%\'
					 or source like \'%'.$keywords.'%\'
					 or author like \'%'.$keywords.'%\'
					 or uploader like \'%'.$keywords.'%\')';
		// 选择了一项条件的搜索
		$selOne = ' and '.$select.' like \'%'.$keywords.'%\'';
		// 选择的标签条件
		$cates_id = implode(",", $cates);
		if ($hasCate)
			$selCate = ' and cate_dtl in ('.$cates_id.')';
		
		if ($hasCate)
		{
			if ($cates_id == '')
				$arrylist = '';
			else if ($select == '%')
				$arrylist = Db::query($sel.$selCond.$selAll.$selCate);
			else
				$arrylist = Db::query($sel.$selCond.$selOne.$selCate);
		}
		else
		{
			if ($select == '%')
				$arrylist = Db::query($sel.$selCond.$selAll);
			else
				$arrylist = Db::query($sel.$selCond.$selOne);
		}
		if (!empty($arrylist))
		{
			foreach ($arrylist as $v => $k)
			{
				$label_id = Db::query('select label_id from res_label where res_id = '.$arrylist[$v]['id']);
				if (!empty($label_id)) {
					foreach ($label_id as $m => $n)
					{
						$labels = Db::query('select id, name from label where id = '.$label_id[$m]['label_id']);
						$arrylist[$v]['labels'] .= "<span class=\"label label-default\">".$labels[0]['name']."</span> ";
					}
				}
			}
		}
		return json_encode($arrylist,true);
	}
	// 上传资源
	public function doaction()
	{
		$filename=$_FILES['myFile']['name'];
		$type=$_FILES['myFile']['type'];
		$tmp_name=$_FILES['myFile']['tmp_name'];
		$size=$_FILES['myFile']['size'];
		$error=$_FILES['myFile']['error'];

		// 获取文件名、后缀、作者、上传者...
		$houzhui = substr(strrchr($filename, '.'), 1);
		$result = str_replace(".".$houzhui,"",$filename); 
		$author = str_replace(PHP_EOL, '', $_POST['author']);// str_replace 去掉回车换行，很蛋疼的东西
		$source = str_replace(PHP_EOL, '', $_POST['source']);
		$description = str_replace(PHP_EOL, '', $_POST['description']);
		$lbl_num = $_POST['lbl_num'];
		$category = $_POST['category'];
		$cat_dtl = $_POST['cat_dtl'];
		
		// 查看是否已存在相同的(文件名+扩展名)
		
		if (is_null($author))
		{
			echo "<script>alert('作者不能为空')</script>";
			return;
		}
		
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
		if ($error==0) {
			date_default_timezone_set('Asia/Shanghai');
			$user_id = Session::get('user_id');
			$userRes = Db::query('select name from user where id ='.$user_id);
			$uploader = $userRes[0]['name'];
			
			$data = [
				'filename' => $result,
				'filesize' => $size,
				'filetype' => $houzhui,
				'category' => $category,
				'cate_dtl' => $cat_dtl,
				'author' => $author,
				'uploader' => $uploader,
				'description' => $description,
				'source' => $source,
				'uploadtime' => date('Y-m-d', time()),
			];
			Db::table('download')
				->insert($data);
			$res_id = Db::name('download')->getLastInsID();
			for ($i = 1; $i <= $lbl_num; $i ++)
			{
				$lbl = $_POST['lbl'.$i]; // 获取每一个label的value
				if ($lbl != '')
				{
					$result = Db::table('label') -> where('name', '=', $lbl) -> find(); // 看这个label是否存在
					if (is_null($result)) // 不存在则插入数据库
					{
						Db::table('label') -> insert(['name' => $lbl]);
						$lbl_id = Db::name('label')->getLastInsID();
					}
					else
						$lbl_id = $result['id'];
					$result = Db::table('res_label') -> insert(['res_id' => $res_id, 'label_id' => $lbl_id]);
				}
			}
			echo "<script>alert('上传成功！')</script>";
		}
		else{
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
	
	// 下载资源(单文件)
	public function downloadfile()
	{
		$filename = iconv("UTF-8", "gbk", $_GET['filename']);
		if(file_exists($filename))
		{
			header('content-disposition:attachment;filename='.substr(strrchr($filename, "/"), 1));
			header('content-length:'.filesize($filename));
			readfile($filename);
		}
		else
		{
			// 资源不存在显示一个表情，一般是不会出现
			echo "<img src='/static/img/notexist-img.png'>";
		}
	}
	
	// 批量下载
	public function downloadfiles()
	{
		$data = $_POST['id']; // 获取传来的id
		
		$zipName = 'upload/tmp.zip';
		$zip = new \ZipArchive;
		$zip->open($zipName, \ZIPARCHIVE::OVERWRITE | \ZIPARCHIVE::CREATE);
		//以下是需要下载的图片数组信息，将需要下载的图片信息转化为类似即可
		
		$hasfile = false;
		foreach ($data as $value){
			$filename = "upload/".$value;
			$filename = iconv("UTF-8", "gbk", $filename);
			if(file_exists($filename))
			{
				dump($value);
				$zip->addFile($filename, substr(strrchr($filename, "/"), 1));
				$hasfile = true;
			}
			// 添加打包的图片，第一个参数是图片内容，第二个参数是压缩包里面的显示的名称, 可包含路径
			// 或是想打包整个目录 用 $zip->add_path($image_path);
		}
		return;
		if ($hasfile == false)
			$zip->addFile('upload/favicon.ico', 'favicon.ico');
		$zip->close();
	}
	
	// 添加资源界面
	public function fileAdd()
    {
		// 判断是否已登录
		$this -> isLogin();
		
		// 获取分类信息
		$cateList = Db::query('select id, category from res_cat where enable = 1 order by id desc');
		
		$this -> view -> assign('cateList', $cateList);
        return $this->view->fetch('file-add');
    }

	// 预览媒体资源界面
	public function media(Request $request)
    {
		// 判断是否已登录
		$this -> isLogin();
		
		$fileName = $request->param('fileName');
		$fileType = $request->param('fileType');
		
		$filename = "upload/".$fileName.'.'.$fileType;
		$filename = iconv("UTF-8", "gbk", $filename);
		if(!file_exists($filename))
		{
			echo "资源不存在！";
			return;
		}
		
		$this->view->fileName = $fileName;
		
		$fileName = iconv('UTF-8','GBK',$fileName);
		$media = ["aif", "aiff", "aac", "au", "bmp", "gsm", "mov", "mid", "midi", "mpg", "mpeg", "mp4", "m4a", "psd", "qt", "qtif", "qif", "qti", "snd", "tif", "tiff", "wav", "3g2", "3pg", "flv", "mp3", "swf", "asx", "asf", "avi", "wma", "wmv", "ra", "ram", "rm", "rpm", "rv", "smi", "smil", "xaml", "html", "pdf"];
		// 不是媒体文件且不存在pdf文件，转换出一个对应pdf文件提供预览
		if (!in_array($fileType, $media) && !file_exists("upload/".$fileName.".pdf")) 
		{
			$file=str_replace("\\","/", ROOT_PATH);
			$doc_file =  "file:///".$file."public/upload/".$fileName.".".$fileType;
			$output_file = "file:///".$file."public/upload/".$fileName.".pdf";
			$this -> word2pdf($doc_file, $output_file);
		}
		if (!in_array($fileType, $media))
			$fileType = 'pdf';
		$this->view->fileType = $fileType;
        return $this->view->fetch('media');
    }
	
	// 获取分类信息表
	public function getCateDtl(Request $request)
	{
		$id = $request -> param('id');
		$cat_dtl = Db::query('select id, cat_dtl from res_cat_dtl where enable = 1 and cat_id = '.$id.' order by id desc');
		return json_encode($cat_dtl, true);
	}
	
	// 添加分类信息
	
	public function addCate(Request $request)
	{
		// 初始返回信息为失败
		$result = 0;
		$id = 0;
		$dtl_id = 0;
		$msg = '添加失败！';
		// 获取前台post参数
		$cate = $request -> param('cate');
		// 查看分类是否已存在
		$find = Db::table('res_cat')
			->where('category', '=', $cate)
			->find();
		if (!is_null($find))
			$msg = '您要添加的分类已存在！';
		else
		{	// 将分类信息添加到分类表
			$result = Db::table('res_cat') -> insert(['category' => $cate, 'enable' => 1]);
			if ($result == true)
			{	// 分类信息添加成功的情况下，为其添加一个子分类‘其他’
				$id = Db::name('res_cat')->getLastInsID();
				$result = Db::table('res_cat_dtl') -> insert(['cat_id' => $id, 'cat_dtl' => '其他', 'enable' => 1]);
				$dtl_id = Db::name('res_cat_dtl')->getLastInsID();
				if ($result == true)
					$msg = '添加成功！';
				else
					$msg = '添加到子分类表失败！';
			}
			else
				$msg = '添加到分类表失败！';
		}
		return ['result' => $result, 'id'=> $id, 'dtl_id' => $dtl_id, 'msg' => $msg];
	}
	
	// 添加子分类
	public function addCateDtl(Request $request)
	{
		// 初始化返回信息
		$msg = '添加失败！';
		$id = 0;
		$result = 0;
		// 获取前台post参数
		$cateDtl = $request -> param('cateDtl');
		$cat_id = $request -> param('cat_id');
		// 查看是否已存在子分类
		$find = Db::table('res_cat_dtl')
			->where('cat_id', '=', $cat_id)
			->where('cat_dtl', '=', $cateDtl)
			->find();
		if (!is_null($find))
			$msg = '您要添加的子分类已存在！';
		else
		{
			$result = Db::table('res_cat_dtl') -> insert(['cat_id' => $cat_id, 'cat_dtl' => $cateDtl, 'enable' => 1]);
			if ($result == true)
			{
				$id = Db::name('res_cat_dtl')->getLastInsID();
				$msg = '添加成功！';
			}
			else
				$msg = '添加到子分类表失败！';
		}
		return ['result' => $result, 'id'=> $id, 'msg' => $msg];
	}
}
