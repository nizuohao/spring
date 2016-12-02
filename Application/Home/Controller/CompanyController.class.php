<?php
namespace Home\Controller;
use Think\Controller;
// 本类由系统自动生成，仅供测试用途
class CompanyController extends CommonController
{
//--------------------------------------------------------------------------------------------------
	public function logo()
	{
		R("Common/company");
		$company=M("Company");
		$where["c_id"]=session("c_id");
		if(!empty($_POST["submit"]))
		{
		//------------------------------------------------------------------------------------------
			// 实例化上传类
			import('ORG.Net.UploadFile');
			$upload = new UploadFile();
			 $upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
			$upload->savePath =  './Public/Uploads/logo/';// 设置附件上传目录
			if(empty($_POST["hidden"]))
			{
			//-------------------------------------------------------------------------------------
				//上传企业LOGO
					if(!$upload->upload()){// 不选择图片则插入、修改 其他数据
 						$this->error($upload->getErrorMsg());
					}
					else
					{
						$info =  $upload->getUploadFileInfo();
						$data["c_logo"]=$info[0]['savename'];				
						$rs=$company->where($where)->save($data);
						if($rs)
						{
							$this->success("新增成功",U("Company/logo"),1);
							
						}
						else
						{
							$this->error("新增失败");
						}
					}
			}
			else
			{
			//--------------------------------------------------------------------------------------
				//修改ＬＯＧＯ
					if(!$upload->upload())
					{// 不选择图片则插入、修改 其他数据
 						$this->error($upload->getErrorMsg());
					}
					else
					{
						//修改前删除以前的图片
						$info =  $upload->getUploadFileInfo();
						$data["c_logo"]=$info[0]['savename'];
						$logo=$company->where($where)->getfield("c_logo");	
						$path="./Public/Uploads/logo/".$logo;						
						if(file_exists($path))
						{
							@unlink($path);
							clearstatcache();
						}						
						$rs=$company->where($where)->save($data);
						if($rs)
						{
							$this->success("修改成功",U("Company/logo"),1);
						}
						else
						{
							$this->error("修改失败");
						}
					}
			}
		}
		else
		{
			$ph=$company->where($where)->find();
			$this->assign("logo",$ph["c_logo"]);
			$this->display();
		}
	}
//--------------------------------------------------------------------------------------------------
	public function jian()
	{
		$jian=M("jian");
		//判断是否删除
		if(!empty($_GET["id"])){
			$j_id=intval($_GET["j_id"]);
			$rs=$jian->delete($j_id);
			if($rs)
			{
				$this->success("删除成功",U("Company/jian"),1);
			}
			else
			{
				$this->error("删除失败");
			}
		}
		else
		{
		//------------------------------------------------------------------------------------------
			//判断是否有用户投简历
			if($_GET["c_id"])
			{
				$data["j_cid"]=$_GET["c_id"];
				$data["j_reid"]=$_GET["re_id"];			
				$data["j_sid"]=session("s_id");
				$num=$jian->where($data)->count();
				//判断是否投过简历
				if($num<1)
				{
					$data["j_time"]=date("Y_m_d H:i:s",time());
					$rs=$jian->add($data);
					if($rs)
					{
						$this->success("投简成功");
					}
					else
					{
						$this->error("投简失败");
					}
				}
				else
				{
					$this->error("您已投过简历");
				}
			}
			else
			{
				//判断是否同意  是否通过
				if(!empty($_GET["iid"]))
				{
					//通过
					if($_GET["iid"]==1)
					{
						$data["j_pass"]=1;
					}
					else
					{
						//不通过
						$data["j_pass"]=2;
					}
					$j_id=$_GET["j_id"];
					$rs=$jian->where("j_id=".$j_id)->save($data);
					if($rs)
					{
						$this->success("操作成功");
					}
					else
					{
						$this->error("操作失败");
					}
				}
				else
				{
					//以上三个都没有执行 则显示企业受到简历界面
					import('ORG.Util.Page');// 导入分页类
					$da["j_cid"]=session("c_id");
					$count      = 	$jian->join(" join job_stu on job_stu.s_id=job_jian.j_sid")->join(" join job_recruit on re_id=j_reid")->order(" j_time desc")->where($da)->count();// 查询满足要求的总记录数
					$Page       = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
					$show       = $Page->show();// 分页显示输出
					$this->assign('page',$show);// 赋值分页输出
					$list=$jian->join(" join job_stu on job_stu.s_id=job_jian.j_sid")->join(" join job_recruit on re_id=j_reid")->limit($Page->firstRow.",".$Page->listRows)->order("j_time desc")->where($da)->select();				
					$this->assign("list",$list);
					$this->assign("date",date("Y"),time());
					$this->display();
				}
			}
		}
	}
//----------------------------------------------------------------------------------------------
	public function company()
	{
		//显示企业信息
		$company=M("Company");
		$c_id=session('c_id');
		//查询企业基本信息
		if(!empty($_GET["c_id"]))
		{
			//判断本人浏览还是用户浏览
			$arr=$company->where("c_id=".$_GET["c_id"])->find();
		}
		else
		{
			$arr=$company->where("c_id=".$c_id)->find();
		}
		$this->assign("arr",$arr);
		$rec=M("recruit");
		//--------------------------------------------------------------------------------------------
		//查询该企业要招聘的职位
		$list=$rec->where("re_cid=".$arr["c_id"])->limit("4")->select();
		$this->assign("list",$list);
		//--------------------------------------------------------------------------------------------
		//查询所有招聘的职位
		$job=$rec->join(" join job_company on job_company.c_id=job_recruit.re_cid")->limit(4)->select();
		$this->assign("job",$job);
		$this->assign("s_id",session("s_id"));
		$this->display();
	}
//--------------------------------------------------------------------------------------------------
	//查询出该企业所有招聘的职位
	public function com_job()
	{
		import('ORG.Util.Page');	// 导入分页类
		//显示企业信息
		$company=M("company");
		//查询企业基本信息
		if(!empty($_GET["c_id"]))
		{
			$data["c_id"]=$_GET["c_id"];
			$arr=$company->where($data)->find();
		}
		else
		{
			$data["c_id"]=session("c_id");
			$arr=$company->where($data)->find();
		}
		$rec=M("recruit");
		//可能感兴趣职业
		$job=$rec->join(" join job_company on job_company.c_id=job_recruit.re_cid")->limit(4)->select();
		$this->assign("job",$job);
		//数据分页
		$count      = $rec->where($data)->count();	// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,3);	 // 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();	// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$jobs = $rec->join(" join job_company on job_company.c_id=job_recruit.re_cid")->where($data)->order('re_time')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('page',$show);	// 赋值分页输出		
		$this->assign("jobs",$jobs);
		$this->assign("arr",$arr);
		$this->display();
	}
//-----------------------------------------------------------------------------------------------
	//企业注册！！
	public function com_info()
	{
		R("Common/company");
		$company=M("company");
		//------------------------------------------------------------------------------------	
		// 修改
		$da["c_id"]=session("c_id");
		if(!empty($_POST['submit']))
		{
			$data=$company->create();
			$rs=$company->where($da)->save($data);		
			if($rs)
			{
				$this->success("修改成功",U("Company/com_info"),1);
			}
			else
			{
				$this->error("修改失败");
			}
		}
		else
		{
			$arr=$company->where($da)->find();
			$this->assign("arr",$arr);
			$this->display();
		}
	}
//--------------------------------------------------------------------------------------------------
	//企业发布招聘
	public function recruit()
	{
		R("Common/company");
		$rec=M("recruit");
		if(!empty($_POST["submit"]))
		{
			$rec->create();	//自动创建
			$rec->re_cid=session("c_id");
			if(!empty($_POST["re_id"]))
			{
				//有值修改
				$data["re_id"]=$_POST["re_id"];
				$rs=$rec->where($data)->save();
				if($rs)
				{
					$this->success("修改成功");
				}
				else
				{
					$this->error("修改失败");
				}
			}
			else
			{
				//无值添加
				$rec->re_hide=1;
				$rec->re_time=date("Y-m-d H:i:s",time());
				$rs=$rec->add();
				if($rs)
				{
					$this->success("新增成功",U("Company/jobs"),1);
				}
				else
				{
					$this->error("新增失败");
				}
			}
		}
		else
		{
			//判断是否删除
			if($_GET["id"]!="")
			{
				$data["re_id"]=$_GET["re_id"];
				$rs=$rec->where($data)->delete();
				if($rs)
				{
					$this->success("删除成功",U("Company/jobs"),1);
				}
				else
				{
					$this->error("删除失败");
				}
			}
			else
			{
				$city=M("City");
				$clist=$city->group("ci_name")->select();
				$this->assign("city",$clist);
				if($_GET["re_id"]!="")
				{
					$data["re_id"]=$_GET["re_id"];
					$arr=$rec->where($data)->find();
					$this->assign("arr",$arr);
				}
				$this->display();
			}			
		}	
	}
//--------------------------------------------------------------------------------------------------
	//职位管理
	public function jobs()
	{
		R("Common/company");

		$rec=M("recruit");
		$Jian=M("Jian");
		$c_id=session("c_id");
		//判断是否设为隐藏
		if(!empty($_POST["hide"]))
		{
		//------------------------------------------------------------------------------------------
			$re_id=$_POST["re_id"];
			$hide["re_hide"]=0;
			foreach ($re_id as $key => $value)
			{
				$rs=$rec->where("re_id=".$value)->save($hide);
			}
			if($rs)
			{
					$this->success("操作成功",U("Company/jobs"),1);
			}
			else
			{
				$this->error("操作失败");
			}
		}
		else
		{
		//------------------------------------------------------------------------------------------
			//判断是否设为显示
			if(!empty($_POST["show"]))
			{
				$re_id=$_POST["re_id"];
				$hide["re_hide"]=1;
				foreach ($re_id as $key => $value)
				{
					$rs=$rec->where("re_id=".$value)->save($hide);
				}
				if($rs)
				{
					$this->success("操作成功",U("Company/jobs"),1);
				}
				else
				{
					$this->error("操作失败");
				}
			}
			else
			{
			//--------------------------------------------------------------------------------------
				//判断是否删除职位
				if(!empty($_POST["delete"]))
				{
					$re_id=$_POST["re_id"];
					foreach ($re_id as $key => $value)
					{
						$rs=$rec->where("re_id=".$value)->delete();
					}
					if($rs)
					{
						$this->success("操作成功",U("Company/jobs"),1);
					}
					else
					{
						$this->error("操作失败");
					}
				}
				else
				{
					$data["re_cid"]=$c_id;
					//查询所有职位数量
					$num=$rec->where($data)->count();
					////查询职位显示数量
					$num1=$rec->where("re_cid='$c_id' and re_hide=1")->count();
			//--------------------------------------------------------------------------------------
					//判断是否点击了 显示中 或不显示
					if($_GET["re_hide"]!='')
					{
						//如果点击了 隐藏  则把条件设为  隐藏
						$hide=$_GET["re_hide"];
						$data["re_hide"]=$hide;
					}
					
			//--------------------------------------------------------------------------------------	
					//将结果查询出来 映射到模板
					import('ORG.Util.Page');	// 导入分页类
					$count      = $rec->where($data)->count();	// 查询满足要求的总记录数
					$Page       = new Page($count,3);	// 实例化分页类 传入总记录数和每页显示的记录数
					$show       = $Page->show();	// 分页显示输出
					// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
					$arr = $rec->where($data)->order('re_time')->limit($Page->firstRow.','.$Page->listRows)->select();
			//--------------------------------------------------------------------------------------
					//循环查询出  每个职位投简历的数量  在当前职位  显示投简历的数量
					foreach ($arr as $key => $value)
					{
						$count=$Jian->where("j_reid=".$value["re_id"]."  and j_cid=".session("c_id"))->count();
						$tt[]=$count;						
					}
					foreach ($tt as $key => $value)
					{
						$arr[$key]["sum"]=$value;
					}
			//--------------------------------------------------------------------------------------
					//向模板映射值
					$this->assign('page',$show);// 赋值分页输出
					$this->assign("num1",$num1);
					$this->assign("num",$num);
					$this->assign("arr",$arr);
					$this->assign("hide",$hide);
					$this->display();
			}
		}
	}

		
	}
//--------------------------------------------------------------------------------------------------
	//职位详情
	public function jobshow()
	{		
		$rec=M("recruit");
	//----------------------------------------------------------------------------------------------
		//查询企业基本信息
		$data["re_id"]=$_GET["re_id"];
		$arr=$rec->where($data)->join(" join job_company on job_company.c_id=job_recruit.re_cid")->find();
		$this->assign("arr",$arr);
	//----------------------------------------------------------------------------------------------
		//可能感兴趣的职位	
		$job=$rec->join(" join job_company on job_company.c_id=job_recruit.re_cid")->limit(4)->select();
		$this->assign("job",$job);
		$date=date("Y-m-d",time());
		import('ORG.Util.Date');// 导入日期类
		$Date = new \Org\Util\Date(time());
		 // 比较日期差
		 // 判断职位信息是否过期
		$this->assign("date",$Date->dateDiff($arr["re_endtime"]));
		$this->assign("s_id",session("s_id"));
		$this->display();
	}
}