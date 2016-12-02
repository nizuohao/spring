<?php
namespace Admin\Controller;
use Think\Controller;
class StuInfoController extends Controller {
	public function stuInfo(){
		   $d=M('grade');
		   $s=$d->group('g_name')->select();
		   $this->assign('s',$s);
			$data=M('sinfo');
			$count=$data->count();
			$page=new \Think\Page($count,3);
			$show=$page->show();
			$list=$data->limit($page->firstRow.','.$page->listRows)
			->join('job_stu ON job_sinfo.si_sid = job_stu.s_id')
			->select();
			$this->assign('page',$show);
			$this->assign('list',$list);
			//echo __ROOT__."/Public/admin/js/jquery.js";
			$this->display("StuInfo/index");
	}
	public function stuInfoDel(){
		if(@$_GET['id'])
		{
		    $data=M('sinfo');
		    $id=$_GET['id'];
		    $del=$data->delete($id);
		   if($del)
	     	{
		     	 $this->success("删除成功",U('StuInfo/stuInfo'),2);
			}
			else
			{
			   $this->error("删除失败",U('StuInfo/stuInfo'),2);
			}  
		}
		
	}
	public function stuInfoSel(){
		$data=M('sinfo');
		$sel['si_title']=$_POST['si_title'];
		$sel['si_content']=$_POST['si_content'];
		$sel['si_state']=$_POST['si_state'];
		$s=$data->where($sel)->join('job_stu ON job_sinfo.si_sid = job_stu.s_id')->select();
		$this->assign('list',$s);
		$this->display('StuInfo/index');
	}
public function checkYes(){
		$stu = M("sinfo");
		$w['si_id']=$_GET['id'];
		$sa['si_stat'] = 1;
		$result = $stu->where($w)->save($sa);
		echo $result;
       
	}
public function checkNo(){
		$stu = M("sinfo");
		$w['si_id']=$_GET['id'];
		$sa['si_stat'] = 0;
		$result = $stu->where($w)->save($sa);
		echo $result;
       
	}
	public function stuInfoSle(){
		$data=M('sinfo');
		$sle['si_id']=$_GET['id'];
		$p=$data->where($sle)->join('job_stu ON job_sinfo.si_sid = job_stu.s_id')
		->join('job_rinfo ON job_sinfo.si_state = job_rinfo.ri_id')
			->select();
		$this->assign('list',$p);
		$this->display('StuInfo/stuInfoSle');
	}
/**
	 * 审核
	 * Enter description here ...
	 */
	public function state()
	{
		$Stu	=	M("sinfo");
		$map['si_state']	=	$_GET['id'];
		$where['si_id']	=	$_GET['si_id'];
		$vo	=	$Stu->where($where)->save($map);
		$arr=$Stu->where($where)->find();
		if ($vo) {
			if($_GET['id']==1){
				R("Common/send",array($arr["si_email"],$arr["si_time"],1));
			}else{
				R("Common/send",array($arr["si_email"],$arr["si_time"],2));
			}
			$this->success("审核成功");
		} else {
			
			$this->error("审核失败");
		}
	}
}