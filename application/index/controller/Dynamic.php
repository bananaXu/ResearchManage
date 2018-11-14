<?php
namespace app\index\controller;

use think\Request;
use think\Session;
use think\Db;

class Dynamic extends Base
{
	public function dynamic()
	{
		$dynamic = Db::query('select name, content, time from dynamic where enable = 1 order by time desc');
		$this -> view -> dynamic = $dynamic;
		return $this-> view -> fetch();
	}
}