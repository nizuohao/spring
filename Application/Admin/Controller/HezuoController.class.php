<?php
namespace Admin\Controller;
use Think\Controller;
class HezuoController extends Controller {
	public function index()
	{
		$H = M('Hezuo');
		$rs = $H->select();
		$this->assign('info',$rs);
		$this->display();
	}
public function hezuoDel(){
		if(@$_GET['id'])
		{
		   $data=M('hezuo');
		   $sel=$_GET['id'];
		   $del=$data->delete($sel);
		   if($del)
	     	{
		     	 $this->success("删除成功",U('Hezuo/hezuo'),2);
			}
			else
			{
			   $this->error("删除失败",U('Hezuo/hezuo'),2);
			}  
	     	
		}
	}
	public function hezuoAdd(){
		if(@$_POST['sub'])
		{
		  $data=D('hezuo');
		  $upload=new \Think\Upload();
		  $upload->maxSize=3145728;
		  $upload->exts=array('jpg','gif','png','txt','ppt');
		  $upload->savePath='./Uploads/Hezuo/';
		  $upload->rootPath='./Public/';
	      $info=$upload->upload();
	      if($info)
	      {
	            $data->create();
		      	$data->hz_logo=$info['hz_logo']['savepath'].$info['hz_logo']['savename'];
		      	$data->hz_time=time();
		        $result=$data->add();
		        if($result)
				{
				    $this->success("添加成功",'./Hezuo/hezuo',2);
				}
				else
				{
				   $this->error("添加失败",'./hezuo/hezuoAdd',2);
				}
	      }
		}
		else 
		{
		   $this->display("Hezuo/add");
		}
	}
	public function hezuoUpde()
	{
		if($_POST['sub'])
		{
		    if($_FILES['hz_logo']['name']=='')
		    {
			   //没有改头像
			    $a=D('hezuo');
			    $id=$_POST['hid'];
			    
			    $a->create();
			    $result=$a->save($id);
			    if($result)
					{
					    $this->success("修改成功",U('Hezuo/hezuo'));
					}
					else
					{
					   $this->error("修改失败",U('Hezuo/hezuoUpde'));
					}
		    }
		    else 
		    {
				  $data=D('hezuo');
				  $id=$_POST['hid'];
				  $s=$data->find($id);
				  @unlink("./Public".$s['hz_logo']);
				  $upload=new \Think\Upload();
				  $upload->maxSize=3145728;
				  $upload->exts=array('jpg','gif','png','txt','ppt');
				  $upload->savePath='./Uploads/Hezuo/';
				  $upload->rootPath='./Public/';
			    $info=$upload->upload();
			    if($info)
			    {
		      	$data->create();
		      	$data->hz_logo=$info['hz_logo']['savepath'].$info['hz_logo']['savename'];
		        $result=$data->save($id);
		        if($result)
						{
						    $this->success("修改成功",U('Hezuo/hezuo'));
						}
				    else
				    {
				        $this->error("修改失败",U('Hezuo/hezuoUpde'));
				    }
		      }
		     }
		   }
		  else 
		  {
			$data=M('hezuo');
			$as = $_GET['hz_id'];
			$sel=$data->find($as);
			//$this->assign('id',$_GET['hz_id']);
			$this->assign('list',$sel);
			$this->display('Hezuo/upde');
		 }
	}
	public function hezuoSel()
	{
		$data=M('hezuo');
		$sle['hz_name']=$_POST['hz_name'];
		$sle['hz_content']=$_POST['hz_content'];
    $sle['hz_url']=$_POST['hz_url'];
    $list=$data->where($sle)->select();
    $this->assign('list',$list);
    $this->display("Hezuo/index");
	}
}