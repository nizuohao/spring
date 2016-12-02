<?php
namespace Admin\Controller;
use Think\Controller;
class ComController extends Controller {
	public function comlist()
	{
		$Stu = M('Company');
		if($_POST['sub'])
		{
			$strWhere = '';
			if($_POST['c_name'])
			{
				$strWhere.="job_company.c_name='".$_POST['c_name']."' and ";
			}
			if($_POST['c_telname'])
			{
				$strWhere.="job_company.c_telname='".$_POST['c_telname']."' and ";
			}
			if($_POST['c_state'])
			{
				$strWhere.="job_company.c_state= ".$_POST['c_state']." and ";
			}
			if($_POST['c_size'])
			{
				$strWhere.="job_company.c_size= ".$_POST['c_size']." and ";
			}
			$strWhere = substr($strWhere, 0,-4);
			$count      = $Stu->where($strWhere)->count();// 查询满足要求的总记录数
			$Page       = new \Think\Page($count,6);// 实例化分页类 传入总记录数和每页显示的记录数(25)
			$show       = $Page->show();// 分页显示输出
			$rs = $Stu
			//->join('`job_city` on job_company.c_address = job_city.ci_name')
			->limit($Page->firstRow.','.$Page->listRows)
			->where($strWhere)
			->select();
			//echo $Stu->getLastSql();
		}
		else 
		{
			$count      = $Stu->count();// 查询满足要求的总记录数
			$Page       = new \Think\Page($count,6);// 实例化分页类 传入总记录数和每页显示的记录数(25)
			$show       = $Page->show();// 分页显示输出
			$rs=$Stu
			->limit($Page->firstRow.','.$Page->listRows)
			->select();
		}
		
		$City = M('City');
		$arr = $City->group('ci_name')->select();
		//echo $City->getLastSql();
		$this->assign('city',$arr);
		$this->assign('data',$rs);
		$this->assign('page',$show);
		$this->display();
	}
	public function recruit()
	{
		$Stu = M('Recruit');
		if($_POST['sub'])
		{
			$strWhere = '';
			if($_POST['c_name'])
			{
				$strWhere.="job_company.c_name='".$_POST['c_name']."' and ";
			}
			if($_POST['re_telname'])
			{
				$strWhere.="job_recruit.re_telname=".$_POST['re_telname']." and ";
			}
			if($_POST['re_city'])
			{
				$strWhere.="job_recruit.re_city=".$_POST['re_city']." and ";
			}
			if($_POST['re_state'])
			{
				$strWhere.="job_recruit.re_state= ".$_POST['re_state']." and ";
			}
			if($_POST['re_jian'])
			{
				$strWhere.="job_recruit.re_jian= ".$_POST['re_jian']." and ";
			}
			if($_POST['re_job'])
			{
				$strWhere.="job_recruit.re_job= ".$_POST['re_job']." and ";
			}
			$strWhere = substr($strWhere, 0,-4);
			$count      = $Stu->where($strWhere)->count();// 查询满足要求的总记录数
			$Page       = new \Think\Page($count,6);// 实例化分页类 传入总记录数和每页显示的记录数(25)
			$show       = $Page->show();// 分页显示输出
			$rs = $Stu
			->join('`job_company` on job_recruit.re_cid = job_company.c_id')
			->where($strWhere)
			->limit($Page->firstRow.','.$Page->listRows)
			->select();
			//echo $Stu->getLastSql();
		}
		else 
		{
			$count      = $Stu->count();// 查询满足要求的总记录数
			$Page       = new \Think\Page($count,6);// 实例化分页类 传入总记录数和每页显示的记录数(25)
			$show       = $Page->show();// 分页显示输出
			//$rs=$Stu->limit($Page->firstRow.','.$Page->listRows)->select();
			$rs=$Stu
			->join('`job_company` on job_recruit.re_cid = job_company.c_id')
			->limit($Page->firstRow.','.$Page->listRows)
			->select();
			//dump($rs);
		}
		$this->assign('data',$rs);
		$this->assign('page',$show);
		$this->display();
	}
	public function del()
	{
		$Stu = M('Company');
		$id = $_GET['c_id'];
		$result = $Stu->delete($id);
		if($result)
		{
			$this->success("删除成功",U("Com/comlist"));
		}
		else
		{
			$this->error("删除失败",U("Com/comlist"));
		}
	}
	public function delete()
	{
		$Stu = M('Recruit');
		$id = $_GET['re_id'];
		$result = $Stu->delete($id);
		if($result)
		{
			$this->success("删除成功",U("Com/recruit"));
		}
		else
		{
			$this->error("删除失败",U("Com/recruit"));
		}
	}
	public function update()
 	{
   	$Stu = M('Company');
   	if(isset($_POST['sub']))
   	{
   		if($Stu->create())
  		{
  			$a=$Stu->create();
	  		$hid=$_POST['c_id'];
    		$result=$Stu->where('c_id='.$hid)->save();
    		//echo $Stu->getLastSql();
  			if($result)
		   	{
		   		$this->success('成功',U('Com/comlist'));
		   	}
		   	else
		   	{
		   		$this->error('失败',U('Com/update'));
		   	}
  		}
   	}
    else 
    {
    	$id=$_GET['c_id'];
			$rs = $Stu->find($id);
			
    	$this->assign("role",$rs);
    	$this->display();
    }
  }
	public function rec_update()
 	{
   	$Stu = M('Recruit');
   	if(isset($_POST['sub']))
   	{
   		if($Stu->create())
  		{
  			$a=$Stu->create();
	  		$hid=$_POST['re_id'];
    		$result=$Stu->where('re_id='.$hid)->save();
    		//echo $Stu->getLastSql();
  			if($result)
		   	{
		   		$this->success('成功',U('Com/recruit'));
		   	}
		   	else
		   	{
		   		$this->error('失败',U('Com/recruit'));
		   	}
  		}
   	}
    else 
    {
    	$id=$_GET['re_id'];
			$rs = $Stu->find($id);
			
    	$this->assign("role",$rs);
    	$this->display();
    }
  }
/**
	 * 审核
	 * Enter description here ...
	 */
	public function state()
	{
		$Stu	=	M("company");
		$map['c_state']	=	$_GET['id'];
		$where['c_id']	=	$_GET['c_id'];
		$vo	=	$Stu->where($where)->save($map);
		$arr=$Stu->where($where)->find();
		if ($vo) {
			if($_GET['id']==1){
				R("Common/send",array($arr["c_email"],$arr["c_time"],1));
			}else{
				R("Common/send",array($arr["c_email"],$arr["c_time"],2));
			}
			$this->success("审核成功");
		} else {
			
			$this->error("审核失败");
		}
	}
}