<?php
namespace app\index\controller;

use think\Controller;
use think\Session;
use think\Db;

class Base extends Controller
{
    protected function _initialize()
    {
        parent::_initialize();
        define('USER_ID', Session::has('user_id') ? Session::get('user_id'):null);
    }

    //判断用户是否登陆,放在系统后台入口前面: admin/index
    protected function isLogin()
    {
        if (is_null(USER_ID)) {
            $this -> error('用户未登陆,无权访问',url('admin/user/login'));
        }
    }
	protected function get_property($office, $property_parameter_array){
		$property_parameter_obj_array = array();
		foreach($property_parameter_array as $key => $value){
			$property = $office->Bridge_GetStruct("com.sun.star.beans.PropertyValue");
			$property->Name = $key;
			$property->Value = $value;
			array_push($property_parameter_obj_array, $property);
		}
		return $property_parameter_obj_array;
	}
	protected function word2pdf($doc_url, $output_url){
		$office = new \COM("com.sun.star.ServiceManager") or die ("失败");
		$Desktop = $office->createInstance("com.sun.star.frame.Desktop");
		$property = $this -> get_property($office, array("Hidden"=>true));
		$WriterDoc = $Desktop->loadComponentFromURL($doc_url, "_blank", 0, $property);
		$property = $this -> get_property($office, array("FilterName"=>"writer_pdf_Export"));  //pdf
		//$property = $this -> get_property($office, array("FilterName"=>"HTML (StarWriter)", "Overwrite"=>true));  //html
		$WriterDoc->storeToURL($output_url, $property);
		$WriterDoc->close(true);
	}
}
