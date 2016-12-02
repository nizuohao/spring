<?php
namespace Home\Controller;
use Think\Controller;
// 本类由系统自动生成，仅供测试用途
class CommonController extends Controller
{
	public function _initialize()
	{
		$s_id		=	session("s_id");
		$c_id		=	session("c_id");
		if(empty($s_id) && empty($c_id))
		{
			$this->success("请登录",U("Index/index"));
			die();
		}
	}
	public function company()
	{
		//判断是否是 企业登录
		$c_id=session("c_id");
		if(empty($c_id))
		{
			$this->success("你不能查看",U("Index/index"));
			die();
		}
	}
	public function student()
	{
		//判断是否是 学生登录
		$s_id=session("s_id");
		if(empty($s_id))
		{
			$this->success("你不能查看",U("Index/index"));
			die();
		}
	}
	public function getclass()
	{
			$c		=$_POST["cid"];
			$class	=M("class");
			$data	=$class->where("c_gid=".$c)->select();
			$string	= "<option value=''>--请选择--</option>";
			foreach($data as $value)
			{
			    $string.="<option value=".$value['c_id'].">".$value['c_name']."</option>";
			}
			echo $string;
	}
}