<?php
namespace Admin\Controller;
use Think\Controller;
class ResumeController extends Controller {
	public function read()
	{
		$R = M('Resume');
		if($_POST['sub'])
		{
			$strWhere = '';
			if($_POST['re_job'])
			{
				$strWhere.="job_resume.re_job= '".$_POST['re_job']."' and ";
			}
			if($_POST['re_money'])
			{
				$strWhere.="job_resume.re_money= ".$_POST['re_money']." and ";
			}
			if($_POST['re_city'])
			{
				$strWhere.="job_resume.re_city= '".$_POST['re_city']."' and ";
			}
			if($_POST['re_scale'])
			{
				$strWhere.="job_resume.re_scale= '".$_POST['re_scale']."' and ";
			}
			$strWhere = substr($strWhere, 0,-4);
			$count      = $R->where($strWhere)->count();// 查询满足要求的总记录数
			$Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
			$show       = $Page->show();// 分页显示输出
			$rs = $R
			->join('`job_stu` on job_resume.re_sid = job_stu.s_id')
			->limit($Page->firstRow.','.$Page->listRows)
			->where($strWhere)
			->select();
			//echo $Stu->getlastsql();
		}
		else 
		{
			$count      = $R->count();// 查询满足要求的总记录数
			$Page       = new \Think\Page($count,6);// 实例化分页类 传入总记录数和每页显示的记录数(25)
			$show       = $Page->show();// 分页显示输出
			$rs=$R
			->join('`job_stu` on job_resume.re_sid = job_stu.s_id')
			->limit($Page->firstRow.','.$Page->listRows)
			->select();
		}
		//dump($rs);
		$this->assign('data',$rs);
		$this->assign('page',$show);
		$this->display();
	}
	/*public function add()
	{
		$Res		=	M("Resume");
		if($_POST['sub'])
		{
			$map	=	$Res->create();
			$map['re_time']	=	time();
//			$map['re_sid']	=	$_SESSION['id'];
			if($_POST['sub']=='马上发布')
			{
				
				$val	=	$Res->add($map);
				echo $Res->getlastsql();
			}
			elseif ($_POST['sub']=='修改信息')
			{
				$map['re_keyword']	=	implode(",",$_POST["re_keyword"]);
				$val=$Res->where("re_id=".$_GET['id'])->save($map);
			}
			if($val)
			{
				$this->success("操作成功");
			}else {
				$this->error("操作失败");
			}
		}else {
			if($_GET['id'])
			{
				$id				=	$_GET['id'];
				$this->value	=	$Res->find($id);
			}
			$this->display();
		}
	}*/
	public function delete()
	{
		$R = D('Resume');
		$id = $_GET['re_id'];
		$result = $R->delete($id);
		if($result)
		{
			$this->success("删除成功",U("Resume/read"));
		}
		else
		{
			$this->error("删除失败",U("Resume/read"));
		}
	}
}