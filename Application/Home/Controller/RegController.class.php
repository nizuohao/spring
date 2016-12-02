<?php
namespace Home\Controller;
use Think\Controller;
// 本类由系统自动生成，仅供测试用途
class RegController extends Controller
{
	public function com_reg()
	{
		if($_POST["submit"])
		{
			$company=M("company");
			$data=$company->create();
			$data["c_time"]=date("Y_m_d H:i:s",time());
			$rs=$company->add($data);		
			if($rs)
			{
				$this->success("注册成功,等待审核",U("Index/index"),1);
			}
			else
			{
				$this->error("注册失败");
			}
		}
		else
		{
			$this->display();
		}
	}
	public function stu_reg()
	{
		if($_POST["submit"])
		{
			$Stu		=	D("Stu");
			$map	=	$Stu->create();
			$map["s_time"]=date("Y-m-d H:i:s",time());
			if($_FILES['s_head']['name']!='')
			{
				$map['s_head']	=	R("Public/Up");
			}
			if($Stu->add($map))
			{
				$this->success("注册成功，等待审核",U("Index/index"),1);
			}
			else
			{
				$this->success("注册失败","__URL__/stu_reg");
			}
		}
		else
		{
			$Grade		=	D("Grade");
			$this->vole_g	=	$Grade->select();
			$City			=	M("City");
			$this->vole_city=	$City->group("ci_name")->select();
			$this->display();
		}
	}
	public function info()
	{
		if($_POST["submit"])
		{
			if($_POST["hide"]==1)
			{
				//学生修改
				$stu=M("stu");
				$data=$stu->create();
				$num=$stu->where($data)->count();
				if($num==1)
				{
					$s_id=$stu->where($data)->getfield("s_id");
					session("s_id",$s_id);
					$this->success("信息输入正确",U("Reg/question"),1);
				}
				else
				{
					$this->error("信息输入错误");
				}
			}
			else
			{
				//企业修改
				$company=M("company");
				$data=$company->create();
				$num=$company->where($data)->count();
				if($num==1)
				{
					$c_id=$company->where($data)->getfield("c_id");
					session("c_id",$c_id);
					$this->success("信息输入正确",U("Reg/question"),1);
				}
				else
				{
					$this->error("信息输入错误");
				}
			}

		}
		else
		{
			$grade=M("grade");
			$list=$grade->select();
			$this->assign("grade",$list);
			$this->display();
		}
	}
	public function question()
	{
		$question=M("question");
		$answer=M("answer");
		if(!empty($_POST["submit"]))
		{
			if(session("s_id"))
			{
				//学生修改
				$data["an_sid"]=session("s_id");
			}
			else
			{
				//修改企业密保页面
				$data["an_cid"]=session("c_id");
			}
				$data["an_content"]=$_POST["an_content"];
				$data["an_qid"]=$_POST["an_qid"];
				//显示学生密保页面
				$num=$answer->where($data)->count();
				if($num==1)
				{
					 session("mi",1);
					$this->success("密保输入正确",U("Vip/update"),1);
				}
				else
				{
					$this->error("密保输入错误");
				}
			
		}
		else
		{
			if(session("s_id"))
			{
				//显示学生密保页面
				$rs=$question->join("join job_answer on an_qid=q_id")->where("an_sid=".session("s_id"))->find();
			}
			else
			{
				//显示企业密保页面
				$rs=$question->join("join job_answer on an_qid=q_id")->where("an_cid=".session("c_id"))->find();
			}
			$this->assign("arr",$rs);
			$this->display();
		}
	}
	public function ajax()
	{
		$id=$_POST["id"];
		if($id==1)
		{
			$stu=M("Stu");
			$s_name=$_POST["user"];
			$num=$stu->where("s_name='".$s_name."'")->count();
			if($num==1)
			{
				echo 1;
			}
		}
		else
		{
			$company=M("company");
			$c_name=$_POST["name"];
			$num=$company->where("c_name='".$c_name."'")->count();
			if($num==1)
			{
				echo 1;
			}
		}
	}

	public function update()
	{
		if(!empty($_POST["submit"]))
		{
			$id=$_POST["id"];
			$type=$_POST["type"];
			$password=$_POST["password"];
			$password2=$_POST["password2"];
			if($password=$password2)
			{
				if($type==1)
				{
					//学生修改
					$stu=M("Stu");
					$data["s_pwd"]=$password;
					$rs=$stu->where("s_id=".$id)->save($data);
				}
				else
				{
					//企业修改
					$company=M("company");
					$data["c_pwd"]=$password;
					$rs=$company->where("c_id=".$id)->save($data);
				}
				if($rs)
				{
					$this->success("修改成功",U("Index/index"));
				}
				else
				{
					$this->error("修改失败");
				}

			}
			else
			{
				$this->error("两次密码输入不正确");
			}
			
		}
		else
		{
			$token = stripslashes(trim($_GET['token']));
			$email = stripslashes(trim($_GET['email']));
			$type = stripslashes(trim($_GET['type']));
			if($type==2)
			{
				$row = M("Company")->where("c_email='$email'")->find();
			}
			else
			{
				$row = M("Stu")->where("s_email='$email'")->find();
			}
			if($row)
			{
				if($type==2)
				{
					$mt = md5($row['c_id'].$row['c_user']);
				}
				else
				{
					$mt = md5($row['s_id'].$row['s_user']);
				}
				if($mt==$token)
				{
					if(time()-$row['passtime']>60*60)
					{
						$this->error('该链接已过期！');
					}
					else
					{
						if($_GET['type']==1)
						{
							$this->assign("id",$row['s_id']);
							$this->assign("name",$row['s_user']);
						}
						else
						{
							$this->assign("id",$row['c_id']);
							$this->assign("name",$row['c_user']);
						}
						$this->assign("type",$type);
						$this->display();
					}
				}
				else
				{
					$msg = '无效的链接<br/>'.$mt.'<br/>'.$token ;
					$this->error($msg);
				}
			}
			else
			{
				$this->error('错误的链接！');
			}
		}
	}
}
?>