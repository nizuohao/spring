<?php
namespace Admin\Controller;
use Think\Controller;
class ServeController extends Controller {
	public function serve()
	{
		$Stu = M('Ret');
		if($_POST['sub'])
		{
			$strWhere = '';
			if($_POST['s_name'])
			{
				$strWhere.="job_stu.s_name='".$_POST['s_name']."' and ";
			}
			if($_POST['r_company'])
			{
				$strWhere.="job_ret.r_company='".$_POST['r_company']."' and ";
			}
			if($_POST['r_in'])
			{
				$strWhere.="job_ret.r_work='".$_POST['r_in']."' and ";
			}
			/*if($_POST['r_year'])
			{
				$strWhere.="job_ret.r_year= ".$_POST['r_year']." and ";
			}*/
			if($_POST['r_help'])
			{
				$strWhere.="job_ret.r_help= ".$_POST['r_help']." and ";
			}
			$strWhere = substr($strWhere, 0,-4);
			$count      = $Stu->where($strWhere)->count();// 查询满足要求的总记录数
			$Page       = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
			$show       = $Page->show();// 分页显示输出
			$rs = $Stu
			->join('`job_stu` on job_ret.r_sid = job_stu.s_id')
			->limit($Page->firstRow.','.$Page->listRows)
			->where($strWhere)
			->select();
			//echo $Stu->getLastSql();
		}
		else 
		{
			$count      = $Stu->count();// 查询满足要求的总记录数
			$Page       = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
			$show       = $Page->show();// 分页显示输出
			$rs=$Stu
			->join('`job_stu` on job_ret.r_sid = job_stu.s_id')
			->limit($Page->firstRow.','.$Page->listRows)
			->select();
		}
		$this->assign('data',$rs);
		$this->assign('page',$show);
		$this->display();
	}
	public function hz()
	{
		$Stu = M('Hz');
		if($_POST['sub'])
		{
			$strWhere = '';
			if($_POST['hz_name'])
			{
				$strWhere.="job_stu.s_name='".$_POST['hz_name']."' and ";
			}
			if($_POST['hz_tel'])
			{
				$strWhere.="job_hz.hz_tel=".$_POST['hz_tel']." and ";
			}
			/*if($_POST['grade'])
			{
				$strWhere.="job_hz.grade=".$_POST['grade']." and ";
			}
			if($_POST['class'])
			{
				$strWhere.="job_hz.class= ".$_POST['class']." and ";
			}*/
			if($_POST['hz_job'])
			{
				$strWhere.="job_hz.hz_job= ".$_POST['hz_job']." and ";
			}
			if($_POST['hz_teacher'])
			{
				$strWhere.="job_hz.hz_teacher= '".$_POST['hz_teacher']."' and ";
			}
			$strWhere = substr($strWhere, 0,-4);
			$count      = $Stu->where($strWhere)->count();// 查询满足要求的总记录数
			$Page       = new \Think\Page($count,6);// 实例化分页类 传入总记录数和每页显示的记录数(25)
			$show       = $Page->show();// 分页显示输出
			$rs = $Stu
			->join('`job_stu` on job_hz.hz_sid = job_stu.s_id')
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
			->join('`job_stu` on job_hz.hz_sid = job_stu.s_id')
			->limit($Page->firstRow.','.$Page->listRows)
			->select();
			//dump($rs);
		}
		$City = M('City');
		$arr = $City->group('ci_tea')->select();
		//echo $City->getLastSql();
		$this->assign('list',$arr);
		$this->assign('data',$rs);
		$this->assign('page',$show);
		$this->display();
	}
	public function advice()
	{
    $advice=M('advice'); 
  	$count=$advice->count();
		$Page       = new \Think\Page($count,2);
		$show       = $Page->show();
		$list=$advice->join('job_stu ON job_advice.ad_sid = job_stu.s_id')
		->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign("page",$show);
		$this->assign("list",$list);
    $this->display("Serve/advice");
  }
  public function adviceDel()
  {
    if(@$_GET['ad_id'])
    {
     	$del=M('advice');
	   	$id=$_GET['ad_id'];
	   	$data=$del->delete($id);
	   	if($data)
	   	{
		   	 $this->success("删除成功",U('Advice/advice'),2);
			}
			else
			{
			   $this->error("删除失败",U('Advice/advice'),2);
			}   	
    }
	  else
	  {
				//批量删除
			$ri_id=$_GET["id"];
			$ri_id=explode(",", $ri_id);
			foreach ($ri_id as $key => $value)
			{
				$rs=$info->delete($value);
			}
			if ($rs) 
			{
				$this->success("删除成功");
			}
			else
			{
				$this->error("删除失败");
			}
		}
  }
  public function adviceSel()
  {	
    $data=M('advice');
    $sle['ad_cd']=$_POST['ad_cd'];
    $sle['ad_cid']=$_POST['type'];
    $sel=$data->where($sle)->select();
    $this->assign('list',$sel);
    $this->display();
  }
	public function ret_add()
	{
		$ret=M("ret");
		$stu=M("stu");
		if(!empty($_POST["submit"]))
		{
			$ret->create();
			// 实例化上传类
			import('ORG.Net.UploadFile');
			$upload = new \Think\Upload();
			$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
			$upload->savePath =  './Public/Uploads/ret/';// 设置附件上传目录
			if(!$upload->upload())
			{// 不选择图片则插入、修改 其他数据
				
			}
			else
			{
				$info =  $upload->getUploadFileInfo();
				$data["r_photo"]=$info[0]['savename'];				
			}
			$ret->r_time=date("Y_m_d H:i:s",time());
			$rs=$ret->add();	
			if($rs)
			{
				$this->success("新增成功",U("Serve/serve"),1);
			}
			else
			{
				$this->error("新增失败");
			}
		}
		else
		{
			$grade=M("grade");
			$list=$grade->select();
			$this->assign("list",$list);
			$this->display();
		}
	}
	public function ret_delete()
	{
		$D=M('Ret');
	 	$id=$_GET['r_id'];
	 	$data=$D->delete($id);
	 	if($data)
	 	{
		 	 $this->success("删除成功",U('Serve/serve'));
		}
		else
		{
		   $this->error("删除失败",U('Serve/serve'));
		}  
	}
	public function ret_update()
	{
		$Stu = M('Ret');
   	if(isset($_POST['sub']))
   	{
   		if($Stu->create())
  		{
  			$a=$Stu->create();
	  		$hid=$_POST['r_id'];
    		$result=$Stu->where('r_id='.$hid)->save();
    		//echo $Stu->getLastSql();
  			if($result)
		   	{
		   		$this->success('成功',U('Serve/serve'));
		   	}
		   	else
		   	{
		   		$this->error('失败',U('Serve/serve'));
		   	}
  		}
   	}
    else 
    {
    	$id=$_GET['r_id'];
			$rs = $Stu
			->join('`job_stu` on job_ret.r_sid = job_stu.s_id')
			->find($id);
			
    	$this->assign("role",$rs);
    	$this->display();
    }
	}
	public function delete()
	{
		$D=M('Hz');
	 	$id=$_GET['hz_id'];
	 	$data=$D->delete($id);
	 	if($data)
	 	{
		 	 $this->success("删除成功",U('Serve/hz'));
		}
		else
		{
		   $this->error("删除失败",U('Serve/hz'));
		}  
	}
	public function select()
	{
		$data = M('hz');
		$id = $_GET['hz_id'];
		$hz = $data
		->join('`job_ms` on job_hz.hz_sid = job_ms.ms_sid')
		->find($id);
		$arr = $data
		->join('`job_ms` on job_hz.hz_sid = job_ms.ms_sid')
		->select($id);
		$pass = $data
		->join('`job_ms` on job_hz.hz_sid = job_ms.ms_sid')
		->select($id);
		dump($arr);
		$this->assign('hz',$hz);
		$this->assign('arr',$arr);
		$this->display();
	}
}