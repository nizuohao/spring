<?php
namespace Home\Controller;
use Think\Controller;
class StudentController extends Controller
{
	public function stu_list()
	{
		$resume=M("resume");
		if($_GET["num"])
		{
			$num=$_GET["num"];
		}
		else
		{
			$num=10;	
		}
		if (!empty($_GET["keywords"]))
		{
			$data["job_resume.re_job"]=array("like","%".$_GET["keywords"]."%");
			$data["job_resume.re_city"]=array("like","%".$_GET["keywords"]."%");
			$data["job_resume.re_money"]=array("like","%".$_GET["keywords"]."%");
			$data["_logic"]="or";
		}
		import('ORG.Util.Page');		// 导入分页类
		$count      = 	$resume->join("join job_stu on s_id=re_sid")->where($data)->count();	// 查询满足要求的总记录数
		$Page       = new Page($count,$num);	// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();	// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$this->assign('page',$show);	// 赋值分页输出
		$arr=$resume->join("join job_stu on s_id=re_sid")->limit($Page->firstRow.",".$Page->listRows)->where($data)->order("re_time desc")->select();
		foreach ($arr as $key => $value)
		{
			$da["re_id"]=$value["re_id"];
			$Course=M("Course");
			$coarr=$Course->where($da)->select();
			foreach ($coarr as $key2 => $val)
			{
				$arr[$key]["stu"][$key2]["c_name"]=$val["c_coname"];
				$arr[$key]["stu"][$key2]["c_job"]=$val["c_job"];
			}
		}
		$this->assign("get",$_GET);
		$this->assign("arr",$arr);
		$this->display();
	}	
	//投简列表
	public function resume()
	{
		R("Common/student");
		$jian=M("jian");
		if(!empty($_GET["id"]))
		{
			$j_id=intval($_GET["r_id"]);
			$rs=$resume->delete($j_id);
			if($rs)
			{
				$this->success("删除成功",U("Student/resume"),1);
			}
			else
			{
				$this->error("删除失败");
			}
		}
		else
		{
			import('ORG.Util.Page');	// 导入分页类
			$count      = 	$jian->order(" j_time desc")->where("j_sid=".session("s_id"))->count();	// 查询满足要求的总记录数
			$Page       = new \Think\Page($count,10);	// 实例化分页类 传入总记录数和每页显示的记录数
			$show       = $Page->show();	// 分页显示输出
			// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
			
			$this->assign('page',$show);// 赋值分页输出
			$list=$jian->join(" join job_company on job_company.c_id=job_jian.j_cid")->join(" join job_recruit on re_id = j_reid")->limit($Page->firstRow.",".$Page->listRows)->order(" j_time desc")->where("j_sid=".session("s_id"))->select();
			$this->assign("list",$list);
			$this->display();
		}
	}
	/**
	 * 学生个人中心
	 * Enter description here ...
	 */
	public function centre()
	{
		R("Common/student");
		$data["s_id"]	=session("s_id");
		$Stu			=	D("Stu");
		$vole		=	$Stu->where($data)->find();
		$this->time	=	$vole['s_time'];
		$this->vole	=	$vole;
		$this->display();
	}
	
	/**
	 * 读取个人信息
	 * Enter description here ...
	 */
	public function read()
	{
		R("Common/student");
		$Stu				=	D("Stu");
		$data["s_id"]=session("s_id");
		$this->vole	=	$Stu->where($data)->relation(true)->find();
		$this->display();
	}
	
	/**
	 * 修改信息
	 * Enter description here ...
	 */
	public function edit()
	{
		R("Common/student");
		if($_POST['Submit'])
		{
			$Stu		=	D("Stu");
			$where['s_id']	=	$_POST["id"];
			$map	=	$Stu->create();
			$val		=	$Stu->where($where)->save($map);
			$this->success("保存成功",U("Student/read"));
		}
		else
		{
			$this->display();
		}
	}

	/**
	 * 修改信息
	 * Enter description here ...
	 */
	public function head()
	{
		R("Common/student");
		$Stu	=	D("Stu");
		$where['s_id']	=	session("s_id");
		if($_POST["Submit"])
		{
			if($_FILES['s_head']['name']!='')
			{
				$fetch=$Stu->where($where)->find();
				$path="Public/Uploads/stuHead/".$fetch["s_head"];
				if(file_exists($path)){
					@unlink($path);
					clearstatcache();

					$pa="Public/Uploads/stuHead/slt/s_".$fetch["s_head"];
					if(file_exists($pa)){
						@unlink($pa);
						clearstatcache();
					}
				}
				$map['s_head']	=	R("Public/Up");
			}
			$val	=	$Stu->where($where)->save($map);
			if($val)
			{
				$this->success("修改头像成功！",U("Student/head"));
			}
			else
			{
				$this->success("修改头像失败！",U("Student/head"));
			}
		}
		else
		{
			$this->vole	=	$Stu->find($where['s_id']);
			$this->display();
		}
	}
	

}