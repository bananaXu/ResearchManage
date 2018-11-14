<?php
namespace app\admin\controller;
use think\Request;
use think\Session;
use think\Db;
use app\admin\model\Download as DownloadModel;

class Resource extends Base
{
	public function resourceList()
	{
		// 判断是否已登录
		$this -> isLogin();
		
		$keywords = $this->request->param('keywords');
		$logmin = $this->request->param('logmin');
		$logmax = $this->request->param('logmax');
		$selected = $this->request->param('selected');
		$value = $this->request->param('provSelect');
		
		// 如果是首次登陆没有查询条件时，预设条件
		if (is_null($logmin))
			$logmin = '1900-01-01';
		if (is_null($logmax))
			$logmax = date("Y-m-d", time());
		if (is_null($selected))
			$selected = '%';
		if (is_null($value))
			$value = '%';
		$pageParam['query']['keywords'] = $keywords;
		
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
		if ($select == '%')
		{
			$arrylist = Db::query('select t1.id, t1.filename, t1.category, t1.cate_dtl, t1.source, t1.description,
										  t1.filetype, t1.author, t1.uploader, t1.uploadtime, t1.enable,
										  (select category from res_cat where id = t1.category) as cate,
										  (select cat_dtl from res_cat_dtl where id = t1.cate_dtl) as cat_dtl
									 from download as t1 
									where filename like \'%'.$keywords.'%\'
									   or source like \'%'.$keywords.'%\'
									   or author like \'%'.$keywords.'%\'
									   or uploader like \'%'.$keywords.'%\'
									  and category like \''.$value.'\'
									  and uploadtime >= '.$logmin.'
									  and uploadtime <= '.$logmax);
		}
		else
		{
			$arrylist = Db::query('select t1.id, t1.filename, t1.category, t1.cate_dtl, t1.source, t1.description,
										  t1.filetype, t1.author, t1.uploader, t1.uploadtime, t1.enable,
										  (select category from res_cat where id = t1.category) as cate,
										  (select cat_dtl from res_cat_dtl where id = t1.cate_dtl) as cat_dtl
									 from download as t1 
									where '.$select.'like \'%'.$keywords.'%\'
									  and category like \''.$value.'\'
									  and uploadtime >= '.$logmin.'
									  and uploadtime <= '.$logmax);
		}
		
		$this -> view -> logmin = $logmin;
		$this -> view -> logmax = $logmax;
		$this -> view -> keywords = $keywords;
		$this -> view -> assign('arrylist', $arrylist);
        return $this -> view -> fetch('resource_list');  //渲染首页模板
	}
	
    //资源状态变更
    public function setStatus(Request $request)
    {
        $resource_id = $request -> param('id');
		Db::query('update download set enable = 1-enable where id = '.$resource_id);
    }
	
	// 分类状态更新
    public function setCateStatus(Request $request)
    {
        $cate_id = $request -> param('id');
		Db::query('update res_cat set enable = 1-enable where id = '.$cate_id);
    }
	
	// 子分类状态更新
    public function setCateDtlStatus(Request $request)
    {
        $id = $request -> param('id');
		Db::query('update res_cat_dtl set enable = 1-enable where id = '.$id);
    }
	
    //资源全部启用
    public function startAll(Request $request)
    {
        $resource_id = $request -> param('id');
		Db::query('update download set enable = 1 where id = '.$resource_id);
    }
	
    //资源全部停用
    public function stopAll(Request $request)
    {
        $resource_id = $request -> param('id');
		Db::query('update download set enable = 0 where id = '.$resource_id);
    }

    //分类全部启用
    public function startAllCate(Request $request)
    {
        $cate_id = $request -> param('id');
		Db::query('update res_cat set enable = 1 where id = '.$cate_id);
    }
	
    //分类全部停用
    public function stopAllCate(Request $request)
    {
        $cate_id = $request -> param('id');
		Db::query('update res_cat set enable = 0 where id = '.$cate_id);
    }
	
    //子分类全部启用
    public function startAllCateDtl(Request $request)
    {
        $id = $request -> param('id');
		Db::query('update res_cat_dtl set enable = 1 where id = '.$id);
    }
	
    //子分类全部停用
    public function stopAllCateDtl(Request $request)
    {
        $id = $request -> param('id');
		Db::query('update res_cat_dtl set enable = 0 where id = '.$id);
    }
	
	//渲染编辑界面
	public function ResourceEdit(Request $request)
    {
        $resource_id = $request -> param('id');
        $result = DownloadModel::get($resource_id);
		$label_id = Db::query('select label_id from res_label where res_id = '.$resource_id);
		$label_num = 0;
		$label_list = "";
		if (!empty($label_id)) {
			foreach ($label_id as $m => $n)
			{
				$labels = Db::query('select id, name from label where id = '.$label_id[$m]['label_id']);
				$label_num ++;
				$label_list .= '<input  type="text" class="input-text size-MINI" style="width:100px;" placeholder="标签'.$label_num.'" id="lbl'.$label_num.'" name="lbl'.$label_num.'" value="'.$labels[0]['name'].'">';
			}
		}
		
		$cateList = Db::query('select id, category from res_cat where enable = 1 order by id desc');
		$cateDtlList = Db::query('select id, cat_dtl from res_cat_dtl where enable = 1 and cat_id = '.$result["category"].' order by id desc');

		$this->view->assign('cateList', $cateList);
		$this->view->assign('cateDtlList', $cateDtlList);
		$this->view->assign('label_list', $label_list);
		$this->view->num = count($label_id);
        $this->view->assign('title','编辑资源信息');
        $this->view->assign('resource_info',$result->getData());
        return $this->view->fetch('resource_edit');
    }
	
	//更新数据操作
    public function editResource(Request $request)
    {
		$author = str_replace(PHP_EOL, '', $request->param('author'));// str_replace 去掉回车换行，很蛋疼的东西
		$source = str_replace(PHP_EOL, '', $request->param('source'));
		$description = str_replace(PHP_EOL, '', $request->param('description'));
		$lbl_num = $request->param('lbl_num');
		$res_id = $request->param('id');
		$category = $request->param('category');
		$cate_dtl = $request->param('cat_dtl');
		
		if (empty($author))
		{
			echo "<script>alert('作者不能为空')</script>";
			return;
		}
		
		$data = [
			'author' => $author,
			'description' => $description,
			'category' => $category,
			'cate_dtl' => $cate_dtl,
			'source' => $source,
		];
		Db::table('download')->where('id', '=', $res_id)->update($data);
		Db::table('res_label')->where('res_id', '=', $res_id)->delete();
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
		return ['message' => '更新成功！'];
    }
	
	// 资源分类界面初始化
	public function resourceCate()
	{
		// 判断是否已登录
		$this -> isLogin();
		
		$cateList = Db::query('select id, category, enable from res_cat order by id desc');
		$this->view->assign('cateList', $cateList);
		return $this -> view -> fetch('resource_cate');
	}
	
	// 获取分类信息表
	public function getCateDtl(Request $request)
	{
		$id = $request -> param('id');
		$cat_dtl = Db::query('select id, cat_dtl from res_cat_dtl where enable = 1 and cat_id = '.$id.' order by id desc');
		return json_encode($cat_dtl, true);
	}
	
	// 资源明细界面初始化
	public function resCateDtl(Request $request)
	{
		// 判断是否已登录
		$this -> isLogin();
		
		$cate_id = $request->param('cate_id');
		$cate_dtl = Db::query("select id, cat_dtl, enable
								    from res_cat_dtl
								   where cat_id = ".$cate_id);
		$this->view->assign('cate_dtl', $cate_dtl);
		return $this->view->fetch('cate_detail');
	}
}