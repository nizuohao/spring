<?php
namespace Home\Controller;
use Think\Controller;
class ApplyController extends Controller
{
	public function info()
	{
		R("Common/company");
		if($_GET["re_id"])
		{
			$where['re_id']	=	$_GET["re_id"];
			$Res			=	M("Resume");
			$Show		=	M("show");
			$Course		=	M("Course");
			$Stu			=	M("Stu");
			$vole_res		=	$Res->find($where['re_id']);

			$this->stuarr		=	$Stu->find($vole_res["re_sid"]);
			$this->vole_show	=	$Show->where($where)->select();
			$this->vole_cou	=	$Course->where($where)->select();
			$this->assign("vole_res",$vole_res);
			$this->display();
		}
	}
	
	/*
	 * 填写/修改 简历
	 * Enter description here ...
	 */
	public function addResume()
	{
		R("Common/student");
		$Res = M ( "resume" );
		if ($_POST["sub"])
		 {
			$map = $Res->create ();
			
			$key	=	$_POST["keyword"];
			$len	=	count($key);
			//判断最后一个元素是否填写了值，没填则弹出最后一个元素
			if(!$key[$len-1])
			{
				array_pop($key);
			}
			//连接成字符串
			$map['re_keyword']	=	implode(",",$key);
			//填写时间
			$map['re_time']		=	time();
			
			if ($_POST["id"])
			 {
				$val = $Res->where ( "re_id=" . $_POST["id"])->save ( $map );
				if ($val)
				{
					$this->success ( "修改成功", "__MODULE__/work/re_id/".$_POST["id"] );
				}
				else
				{
					$this->error ( "修改失败", "__MODULE__/resume" );
				}
			}
			else
			{
				$map ['re_sid'] = $_SESSION ['s_id'];
				if ($re_id	=	$Res->add ( $map ))
				{
					//session("re_id",$re_id);
					$this->success ( "发布成功", "__MODULE__/work/re_id/$re_id" );
				}
				else
				{
					$this->error ( "发布失败");
				}
			}
		}
		else
		{
			//显示修改信息
			if ($_GET["re_id"])
			{
				
				$where['re_id']		=	$_GET["re_id"];
				$where['re_sid']		=	$_SESSION['s_id'];
				$v				=	$Res->where($where)->find();
				$this->value		=	$v;
				$this->key_word	=	explode(",",$v['re_keyword']);
			//	dump($this->key_word);die();
			}
			$city=M("City")->group("ci_name")->select();
			$this->assign("city",$city);
			$this->display();
		}
	}
	
	/**
	 * 工作经历
	 * Enter description here ...
	 */
	public function work()
	{
		R("Common/student");
		if($_GET["re_id"])
		{
			$where["re_id"]	=	$_GET["re_id"];
			$Cou	=	M("Course");
			$num	=	$Cou->where($where)->count();
			//查询出该简历已有的工作经历
			if($num>0)
			{
				$this->arr	=	$Cou->where($where)->select();
			}
			
			//判断是否为修改
			if($_POST["c_id"])
			{
				$map	=	$Cou->create();
				$map['c_time']	=	time();
				$map['c_sid']		=	$_SESSION["s_id"];
				if($Cou->where("c_id=".$_POST["c_id"])->save($map))
				{
					$this->success("修改成功","__MODULE__/Apply/work/re_id/".$where["re_id"]);
				}
				else
				{
					$this->success("修改失败","__MODULE__/Apply/work/re_id/".$where["re_id"]);
				}
			}
			else
			{
				//保存提交的数据
				if($_POST["submit"])
				{
					$map	=	$Cou->create();
					$map['c_time']	=	time();
					$map['c_sid']		=	$_SESSION["s_id"];
					$map['re_id']		=	$where["re_id"];
					if($Cou->add($map))
					{
						$this->success("保存成功","__MODULE__/Apply/work/re_id/".$where["re_id"]);
					}
					else
					{
						$this->success("保存失败","__MODULE__/Apply/work/re_id/".$where["re_id"]);
					}
				}
				else
				{
					if($_GET["c_id"])
					{
						$this->list	=	$Cou->find($_GET["c_id"]);
					}
					$this->re_id	=	$where["re_id"];
					$this->display();
				}
			}
		}
		else
		{
			$this->error("您还没有填写基本信息，请填写后再操作！","__MODULE__/Apply/addResume");
		}
		
	}
	
	/**
	 * 删除工作经历
	 * Enter description here ...
	 */
	public function delwork()
	{
		R("Common/student");
		if($_GET["c_id"])
		{
			$Cou				=	M("Course");
			$where['c_id']			=	$_GET["c_id"];
			$re_id				=	$_GET["re_id"];
			$val					=	$Cou->where($where)->delete();
			if($val)
			{
				$this->success("删除成功","__MODULE__/Apply/work/re_id/".$re_id);
			}	
			else
			{
				$this->success("删除失败","__MODULE__/Apply/work/re_id/".$re_id);
			}
		}
	}
	
	
	/**
	 * 项目链接
	 * Enter description here ...
	 */
	public function show()
	{
		R("Common/student");
		if($_GET["re_id"])
		{
			$where["re_id"]	=	$_GET["re_id"];
			$Show		=	M("Show");
			$num		=	$Show->where($where)->count();
			//查询出该简历已有的项目链接
			if($num>0)
			{
				$this->arr	=	$Show->where($where)->select();
			}
			
			//判断是否为修改
			if($_POST["sh_id"])
			{
				$map			=	$Show->create();
				$map['sh_time']		=	time();
				$map['sh_sid']		=	$_SESSION["s_id"];
				if($Show->where("sh_id=".$_POST["sh_id"])->save($map))
				{
					$this->success("修改成功","__MODULE__/Apply/show/re_id/".$where["re_id"]);
				}
				else
				{
					$this->success("修改失败","__MODULE__/Apply/show/re_id/".$where["re_id"]);
				}
			}
			else
			{
				//保存提交的数据
				if($_POST["submit"])
				{
					$map			=	$Show->create();
					$map['sh_time']		=	time();
					$map['sh_sid']		=	$_SESSION["s_id"];
					$map['re_id']		=	$where["re_id"];
					if($Show->add($map))
					{
						$this->success("保存成功","__MODULE__/Apply/show/re_id/".$where["re_id"]);
					}
					else
					{
						$this->success("保存失败","__MODULE__/Apply/show/re_id/".$where["re_id"]);
					}
				}
				else
				{
					if($_GET["sh_id"])
					{
						$this->list	=	$Show->find($_GET["sh_id"]);
					}
					$this->re_id	=	$where["re_id"];
					$this->display();
				}
			}
		}
		else
		{
			$this->error("您还没有填写基本信息，请填写后再操作！","__MODULE__/Apply/addResume");
		}
	}
	
	/**
	 * 删除项目链接
	 * Enter description here ...
	 */
	public function delshow()
	{
		R("Common/student");
		if($_GET["sh_id"])
		{
			$Show				=	M("Show");
			$where['sh_id']			=	$_GET["sh_id"];
			$re_id				=	$_GET["re_id"];
			$val					=	$Show->where($where)->delete();
			if($val)
			{
				$this->success("删除成功","__MODULE__/Apply/show/re_id/".$re_id);
			}
			else
			{
				$this->success("删除失败","__MODULE__/Apply/show/re_id/".$re_id);
			}
		}
	}

	/**
	 * 管理简历
	 * Enter description here ...
	 */
	public function resume()
	{
		R("Common/student");
		$Res			= M ( "Resume" );
		$map ['re_sid'] 	= $_SESSION ['s_id'];
		$this->value 	= $Res->where ( $map )->select ();
		$this->display();
	}
	
	/**
	 * 查看简历详情
	 * Enter description here ...
	 */
	public function readResume()
	{
		R("Common/student");
		if($_GET["re_id"])
		{
			$where['re_id']		=	$_GET["re_id"];
			$Res				=	M("Resume");
			$Show			=	M("show");
			$Course			=	M("Course");
			$Stu				=	M("Stu");
			$this->vole_res		=	$Res->find($where['re_id']);
			$this->vole_stu		=	$Stu->find($_SESSION['s_id']);
			$this->vole_show	=	$Show->where($where)->select();
			$this->vole_cou	=	$Course->where($where)->select();
			$this->display();
		}
	}
	
	/**
	 * 删除简历
	 * Enter description here ...
	 */
	public function delResume()
	{
		R("Common/student");
		if ($_GET["re_id"])
		{
			$where['re_id'] = $_GET["re_id"];
			$Res = M ( "Resume" );
			$val = $Res->where ( $where )->delete ();
			if ($val)
			{
				M("show")->where($where)->delete();
				M("course")->where($where)->delete();
				$this->success ( "删除成功", "__MODULE__/resume" );
			}
			else
			{
				$this->error ( "删除失败", "__MODULE__/resume" );
			}
		}
	}
}