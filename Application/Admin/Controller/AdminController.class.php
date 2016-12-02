<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends Controller {
	public function Npc()
	{
		$A = M('Admin');
		$rs = $A->select();
		
		$this->assign('vole',$rs);
		$this->display();
	}
	public function addNpc()
	{
		$A = D('Admin');
		if($A->create())
		{
			$result = $A->add();
			if($result)
			{
				$this->success("添加成功",U("Admin/Npc"));
			}
			else
			{
				$this->error("添加失败",U("Admin/addNpc"));
			}
		}
		else 
		{
			$this->display();
		}
	}
	public function delNpc()
	{
		$A = M('Admin');
		$id = $_GET['id'];
		$result = $A->delete($id);
		if($result)
		{
			$this->success("删除成功",U("Admin/Npc"));
		}
		else
		{
			$this->error("删除失败",U("Admin/Npc"));
		}
	}
	public function editNpc()
	{
		$A = D('Admin');
		if($_POST['sub'])
		{
			$a=$A->create();
  		//print_r($a);
	  	$hid=$_POST['ad_id'];
			$result=$A->where('ad_id='.$hid)->save();
  		//echo $Stu->getlastsql();
  		if($result)
	    {
	    	$this->success('成功',U('Admin/Npc'));
	    }
	    else
	    {
	    	$this->error('失败',U('Admin/editNpc'));
	    }
		}
		else 
		{
			$id = $_GET['id'];
			$rs = $A->find($id);
			$this->assign('vole',$rs);
			$this->display();
		}
	}
}