<?php
namespace app\index\controller;
use think\Db;
use think\Request;

class Member extends Base
{
    public function member()
    {
		$associate_professor = Db::query('select id, name, spell, photoname from member where education = 2 and enable = 1');
		$master = Db::query('select id, name, spell, photoname from member where education = 1 and enable = 1');
		$bachelor = Db::query('select id, name, spell, photoname from member where education = 0 and enable = 1');
		
		$this -> view -> assign('associate_professor', $associate_professor);
		$this -> view -> assign('master', $master);
		$this -> view -> assign('bachelor', $bachelor);
        return $this -> view -> fetch();  //渲染首页模板
    }
	
    public function personal(Request $request)
    {
		$id = $request -> param('id');
		$member_list = Db::query('select name, spell, sex, grade, hobbies, intro, achievement, contact, direction, photoname
									from member
								   where id = '.$id.' 
								     and enable = 1');
		$this -> view -> member_list = $member_list[0];
        return $this -> view -> fetch();  //渲染首页模板
    }
}
