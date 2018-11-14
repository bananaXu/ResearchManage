<?php
namespace app\index\controller;
use think\Db;

class Links extends Base
{
    public function Links()
    {
		$subject_list = Db::query('select id, name from subject where enable = 1');
		$links_list = Db::query('select id, journal, rate, period, address from links where enable = 1');
		
		$this -> view -> assign('subject_list', $subject_list);
		$this -> view -> assign('links_list', $links_list);
        return $this -> view -> fetch();  //渲染首页模板
    }
	
	public function ajaxSearchresbysubject()
	{
		// 获取学科id
		$id = $_POST['id'];
		// 选择了全部学科
		if ($id == '%')
			$links_list = Db::query('select id, journal, rate, period, address from links where enable = 1');
		else
		{
			// 看是否存在满足的link
			$find = Db::table('link_subject') -> where('subject_id', '=', $id) -> find();
			if (is_null($find))
				return 'no';
			// 从数据库中获取学科id对应link_id
			$links_list = Db::query('select id, journal, rate, period, address 
									   from links 
									  where enable = 1 
										and id in (select link_id 
													 from link_subject 
													where subject_id = '.$id.')');
		}
		return json_encode($links_list, true);
	}
}
