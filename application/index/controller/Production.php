<?php
namespace app\index\controller;
use think\Db;

class Production extends Base
{
    public function Production()
    {
        return $this -> view -> fetch();  //渲染首页模板
    }
}
