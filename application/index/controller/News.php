<?php
namespace app\index\controller;

use think\Request;
use think\Session;
use think\Db;

class News extends Base
{
	public function news()
	{
		$news = Db::query('select title, content, picture, updatetime from news where enable = 1 order by updatetime desc');
		$this -> view -> news = $news;
		return $this-> view -> fetch();
	}
}