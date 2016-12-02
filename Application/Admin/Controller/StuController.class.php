<?php
namespace Admin\Controller;
use Think\Controller;
class StuController extends Controller {
	public function read()
	{
		$Stu = D('Stu');
		if($_POST['sub'])
		{
			$strWhere = '';
			if($_POST['s_gid'])
			{
				$strWhere.="job_stu.s_gid= '".$_POST['s_gid']."' and ";
			}
			if($_POST['c_id'])
			{
				$strWhere.="job_class.c_id= ".$_POST['c_id']." and ";
			}
			if($_POST['s_state'])
			{
				$strWhere.="job_stu.s_state= ".$_POST['s_state']." and ";
			}
			if($_POST['s_type'])
			{
				$strWhere.="job_stu.s_type= '".$_POST['s_type']."' and ";
			}
			if($_POST['s_name'])
			{
				$strWhere.="job_stu.s_name= '".$_POST['s_name']."' and ";
			}
			$strWhere = substr($strWhere, 0,-4);
			$count      = $Stu->where($strWhere)->count();// 查询满足要求的总记录数
			$Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
			$show       = $Page->show();// 分页显示输出
			$rs = $Stu
			->join('`job_class` on job_stu.c_id = job_class.c_id')
			->join('`job_grade` on job_stu.s_gid = job_grade.g_id')
			->limit($Page->firstRow.','.$Page->listRows)
			->where($strWhere)
			->select();
			//echo $Stu->getlastsql();
		}
		else 
		{
			$count      = $Stu->count();// 查询满足要求的总记录数
			$Page       = new \Think\Page($count,10);
			$show       = $Page->show();// 分页显示输出
			$rs = $Stu
			->join('`job_grade` on job_stu.s_gid = job_grade.g_id')
			->join('`job_class` on job_stu.c_id = job_class.c_id')
			//->join('`job_city` on job_stu.ci_id = job_city.ci_id')
			->order('s_id asc')
			->limit($Page->firstRow.','.$Page->listRows)
			->select();
			//dump($rs);
		}
		$City = M('City');
		$arr = $City->select();
		
		$c = M("class");
		$grade = $c->group("c_gid")->select();
		//dump($grade);
		$this->assign("grade",$grade);
		$this->assign('vole_city',$arr);
		$this->assign('vole',$rs);
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
	}
	public function add()
	{
		if($_POST['sub'])
		{
			$stu = D('Stu');
			if($stu->create())
			{
				$upload = new \Think\Upload();
				$upload->maxSize   = 1024*1024*20;
				$upload->exts      = array('jpg','gif','png','jpeg');
				$upload->rootPath  = "./Public/";
				$upload->savePath  = './Uploads/StuHead/slt/';
				$info = $upload->upload();
				
				$stu->s_head = $info['s_head']['savepath'].$info['s_head']['savename'];
				$stu->s_state = 0;
				$stu->s_time =date("Y-m-d H:i:s");
				
				$result = $stu->add();
				if($result)
				{
					$this->success("添加成功",U("Stu/read"));
				}
				else
				{
					$this->error("添加失败",U("Stu/add"));
				}
			}
		}
			/*
			*/
			//echo $stu->getLastSql();
		else 
		{
			$c = M("class");
			$grade = $c->group("c_gid")->select();
			//dump($grade);
			$City = M('City');
			$arr = $City->group("ci_name")->select();
			
			$this->assign("grade",$grade);
			$this->assign('vole_city',$arr);
			$this->display();
		}
	}
	public function del()
	{
		$stu = D('Stu');
		$id = $_GET['id'];
		$result = $stu->delete($id);
		if($result)
		{
			$this->success("删除成功",U("Stu/read"));
		}
		else
		{
			$this->error("删除失败",U("Stu/read"));
		}
	}
	public function edit()
 	{
   	$Stu=D('Stu');
   	if(isset($_POST['sub']))
   	{
   		if($Stu->create())
  		{
  			$a=$Stu->create();
  			//print_r($a);
	  		$hid=$_POST['id'];
	   		if($_FILES['s_head']['name'])
	   		{ 
	    		$upload = new \Think\Upload(); 
					$upload->maxSize   =     3145728 ; 
					$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');
				 	$upload->rootPath  =      './Public/';
					$upload->savePath  =      './Uploads/StuHead/'; 
					$info=$upload->upload();
		    	if(!$info)
		    	{
		    		  $this->error($upload->getError());
		    	}
		    	else 
		    	{
		    		$info['savepath'].$info['savename'];
		    		$Stu->s_head=$info['s_head']['savepath'].$info['s_head']['savename'];
		    		$Stu->s_state=1;
		    		$result=$Stu->where('s_id='.$hid)->save();
		    		//echo $Stu->getLastSql();
		    	}		
	    	}
	    	else
	    	{
	    		$result=$Stu->where('s_id='.$hid)->save();
	  			//echo $Stu->getlastsql();
	  			if($result)
		    	{
		    		$this->success('成功',U('Stu/read'));
		    	}
		    	else
		    	{
		    		$this->error('失败',U('Stu/read'));
		    	}
	    	}
		   
    	}
	    else
	    {
	    	exit($stu->getError('edit'));
	    	
    	}
    }
    else 
    {
    	$id=$_GET['id'];
    	$rs=$Stu->find($id);
    	//dump($rs);
    	$c = M("class");
			$grade = $c->group("c_gid")->select();
			//dump($grade);
			
			$this->assign("grade",$grade);
    	$this->assign("vole",$rs);
    	$City=M('City');
    	$c=$City->group('ci_name')->select();
    	$this->assign('vole_city',$c);
    	$this->display();
    }
   }
	public function getClass()
	{
		$grade=$_POST['g'];
		$c = M("Class");
		$w['c_gid'] = $grade;
		$class = $c->where($w)->select();
		//echo $c->getlastsql();
		$str="<select name='c_id' > 
				<option value=''>--请选择--</option>  ";
		foreach ($class as $v)
		{
			$str.="<option value='".$v['c_id']."'> ".$v['c_name']."  </option>   ";
		}
		$str.="</select>";
		echo $str;
	}
/**
	 * 审核
	 * Enter description here ...
	 */
	public function state()
	{
		$Stu	=	M("Stu");
		$map['s_state']	=	$_GET['id'];
		$where['s_id']	=	$_GET['s_id'];
		$vo	=	$Stu->where($where)->save($map);
		$arr=$Stu->where($where)->find();
		if ($vo) {
			if($_GET['id']==1){
				R("Common/send",array($arr["s_email"],$arr["s_time"],1));
			}else{
				R("Common/send",array($arr["s_email"],$arr["s_time"],2));
			}
			$this->success("审核成功");
		} else {
			
			$this->error("审核失败");
		}
	}
}