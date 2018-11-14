<?php
namespace app\admin\controller;
use think\Request;
use think\Session;
use think\Db;

class subject extends Base
{
	public function subjectList()
	{
		// 判断是否已登录
		$this -> isLogin();
		
		$arrylist = Db::query('select id, name, enable from subject');
		$this -> view -> assign('arrylist', $arrylist);
        return $this -> view -> fetch('subject_list');  //渲染首页模板
	}
	
	// 添加学科
	public function addSubject(Request $request)
	{
		// 预返回数据
		$result = 0;
		$msg = '添加失败！';
		$id = 0;

		$subject = $request -> param('subject');
		
		if (empty($subject))
			$msg = '学科不能为空！';
		else
		{
			$find = Db::table('subject') -> where("name", "=", $subject) -> find();
			if (!is_null($find))
				$msg = '学科已存在！';
			else
			{
				$result = Db::table('subject') -> insert(['name' => $subject, 'enable' => 1]);
				if ($result == 1)
				{
					$id = Db::name('subject')->getLastInsID();
					$msg = '添加成功！';
				}
			}
		}
		return ['result' => $result, 'msg' => $msg, 'id' => $id];
	}
	
    //状态变更
    public function setStatus(Request $request)
    {
        $subject_id = $request -> param('id');
		Db::query('update subject set enable = 1-enable where id = '.$subject_id);
    }
	
    //全部启用
    public function startAll(Request $request)
    {
        $subject_id = $request -> param('id');
		Db::query('update subject set enable = 1 where id = '.$subject_id);
    }
	
    //全部停用
    public function stopAll(Request $request)
    {
        $subject_id = $request -> param('id');
		Db::query('update subject set enable = 0 where id = '.$subject_id);
    }
	
	// 编辑学科
	public function editSubject(Request $request)
	{
		// 预返回数据
		$result = 0;
		$msg = '编辑失败！';

		$subject = $request -> param('subject');
		$id = $request -> param('id');
		
		if (empty($subject))
			$msg = '学科不能为空！';
		else
		{
			$find = Db::table('subject') -> where("name", "=", $subject) -> find();
			if (!is_null($find))
				$msg = '学科已存在！';
			else
			{
				$result = Db::table('subject') -> where('id', '=', $id) -> update(['name' => $subject]);
				if ($result == 1)
				{
					$id = Db::name('subject')->getLastInsID();
					$msg = '编辑成功！';
				}
			}
		}
		return ['result' => $result, 'msg' => $msg, 'id' => $id];
	}
	
	// 渲染学科对应的链接界面
	public function subject_links(Request $request)
	{
		$subject_id = $request -> param('subject_id');
		// 获取学科对应所有链接
		$linkslist = Db::query('select id, journal from links where id in (select link_id from link_subject where subject_id = '.$subject_id.')');
		$allLinks =  Db::query('select id, journal from links where enable = 1');
		
		$this -> view -> subject_id = $subject_id;
		$this -> view -> assign('linkslist', $linkslist);
		$this -> view -> assign('allLinks', $allLinks);
		return $this -> view -> fetch('subject_links');
	}
	
	//删除
    public function delLink(Request $request)
    {
        $link_id = $request -> param('link_id');
		$subject_id = $request -> param('subject_id');
		Db::table("link_subject") -> where("link_id", "=", $link_id) -> where("subject_id", "=", $subject_id)->delete();
    }
	
	public function addLink(Request $request)
	{
		$msg = '添加失败';
		$result = 0;
		$id = 0;
		$journal = 0;
		
        $link_id = $request -> param('link_id');
		$subject_id = $request -> param('subject_id');
		$find = Db::table('link_subject')
			-> where("link_id", "=", $link_id)
			-> where("subject_id", "=", $subject_id)
			-> find();
		if (!is_null($find))
			$msg = '链接已存在';
		else
		{
			$ins = Db::table('link_subject') -> insert(['link_id' => $link_id, 'subject_id' => $subject_id]);
			if ($ins)
			{
				$link = Db::query('select id, journal from links where id = '.$link_id);
				$msg = '添加成功！';
				$result = 1;
				$id = $link[0]['id'];
				$journal = $link[0]['journal'];
			}
		}
		return ['msg' => $msg, 'result' => $result, 'id' => $id, 'journal' => $journal];
	}
}