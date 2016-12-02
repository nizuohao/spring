<?php
namespace Home\Controller;
use Think\Controller;
// 本类由系统自动生成，仅供测试用途
class JobController extends CommonController
{
//==================================================================================================
	//职位列表
	public function job_jian()
	{
		//判断首页是否点击搜索 或 本页点击搜索
		if (!empty($_GET["keywords"]))
		{
			$keywords=$_GET["keywords"];
			$data["re_job|re_money|re_city"]=array("like",'%'.$keywords.'%');
			$data["re_hide"]=1;
			$data["re_state"]=1;
			$data["re_jian"]=1;
		}
		//设置每页条数  设置用户想用的分页条数
		$rec=M("recruit");
		if(!empty($_GET["num"]))
		{
			$num=$_GET["num"];
		}
		else
		{
			$num=7;
		}
		//------------------------------------------------------------------------------------------
		//执行分页
		import('ORG.Util.Page');	// 导入分页类
		$count      = $rec->join("join job_company on job_company.c_id=r_recruit.re_cid")->where($data)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,$num);		// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();	// 分页显示输出
		$arr=$rec->join("join job_company on job_company.c_id=job_recruit.re_cid")->where($data)->order("re_time desc")->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign("arr",$arr);
		$this->assign('page',$show);	// 赋值分页输出
		$this->display();
	}
	//职位列表
	public function job_list()
	{
		//判断首页是否点击搜索 或 本页点击搜索
		if (!empty($_GET["keywords"]))
		{
			$keywords=$_GET["keywords"];
			$data["re_job|re_money|re_city"]=array("like",'%'.$keywords.'%');
			$data["re_hide"]=1;
			$data["re_state"]=1;
		}
		//设置每页条数  设置用户想用的分页条数
		$rec=M("recruit");
		if(!empty($_GET["num"]))
		{
			$num=$_GET["num"];
		}
		else
		{
			$num=7;
		}
		//------------------------------------------------------------------------------------------
		//执行分页
		import('ORG.Util.Page');	// 导入分页类
		$count      = $rec->join("join job_company on job_company.c_id=r_recruit.re_cid")->where($data)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,$num);	// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();	// 分页显示输出
		$arr=$rec->join("join job_company on job_company.c_id=job_recruit.re_cid")->where($data)->order("re_time desc")->limit($Page->firstRow.','.$Page->listRows)->select();
	//	echo $rec->getLastSql();die();
		$this->assign("arr",$arr);
		$this->assign('page',$show);	// 赋值分页输出
		$this->display();
	}
}
?>