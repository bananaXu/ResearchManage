<?php
namespace app\index\controller;
use think\Db;

class Index extends Base
{
    public function index()
    {
		$news_list = Db::query('select title, content, updatetime from news where enable = 1 order by updatetime desc LIMIT 4');
		$dynamic_list = Db::query('select name, content, time from dynamic where enable = 1 order by time desc LIMIT 5');
		
		$news_content_list = Db::query('select content from news where enable = 1 order by updatetime desc LIMIT 100');
		$this -> view -> assign('news_list', $news_list);
		$this -> view -> assign('news_content_list', $news_content_list);
		$this -> view -> assign('dynamic_list', $dynamic_list);
        return $this -> view -> fetch();  //渲染首页模板
    }
}
