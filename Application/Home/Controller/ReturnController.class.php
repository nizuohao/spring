<?php
namespace Home\Controller;
use Think\Controller;
// 本类由系统自动生成，仅供测试用途
class ReturnController extends CommonController
{
	public function mianshi()
	{
		R("Common/student");
		$mian=M("ms");
		$s_id=session("s_id");
		if ($_POST["submit"])
		{
			$mian->create();
			if($_POST["id"])
			{
				$mian->ms_addtime=time();
				$rs=$mian->where("ms_id=".$_POST["id"])->save();
			}
			else
			{
				$mian->ms_addtime=time();
				$mian->ms_sid=$s_id;
				$rs=$mian->add();
			}
			if($rs)
			{
				$this->success("操作成功",U("Return/mianshi"),1);
			}
			else
			{
				$this->error("操作失败");
			}
		}
		else
		{
			$data["ms_sid"]=$s_id;
			$arr=$mian->where($data)->order("ms_addtime desc")->limit(6)->select();
			$this->assign("arr",$arr);
			$ms_id=intval($_GET["ms_id"]);
			if($ms_id)
			{
				$rs=$mian->find($ms_id);
				$this->assign("list",$rs);
			}
			$city=M("City");
			$clist=$city->select();
			foreach ($clist as $key => $value)
			{
				$cl[]=$value["ci_name"];
			}
			$citylist=array_unique($cl);
			$this->assign("city",$citylist);
			$this->display();
		}
	}
	public function huizhi()
	{
		R("Common/student");
		$hui=M("hz");
		$s_id=session("s_id");
		if ($_POST["submit"])
		{
			$data=$hui->create();
			import('ORG.Net.UploadFile');
			$upload = new \Think\Upload(); 	// 实例化上传类
			$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');		// 设置附件上传类型
			$upload->savePath =  './Public/Uploads/hui/';		// 设置附件上传目录
			if($_POST["id"]!='')
			{
				if($upload->upload())
				{	// 不选择图片则插入、修改 其他数据
					$info =  $upload->getUploadFileInfo();
					$data["hz_photo"]=$info[0]['savename']; 
				}
				//更换图片时先清除缓存图片
				$fetch=$hui->where("hz_id=".$_POST["id"])->find();
				$path="Public/Uploads/hui/".$fetch["hz_photo"];
				if(file_exists($path))
				{
					@unlink($path);
					clearstatcache();
				}
				//修改数据 保存
				$rs=$hui->where("hz_id=".$_POST["id"])->save($data); 	// 写入用户数据到数据库		
			}
			else
			{
				if($upload->upload())
				{	// 不选择图片则插入、修改 其他数据
					$info =  $upload->getUploadFileInfo();
					$hui->hz_photo=$info[0]['savename']; 
				}
				$data['hz_sid']=$s_id;
				$date=date("Y-m-d H:i:s",time());
				$rs=$hui->add($data);
			}
			if($rs)
			{
				$this->success("操作成功",U("Return/mianshi"),1);
			}
			else
			{
				$this->error("操作失败");
			}
		}
		else
		{
			$data["s_id"]=$s_id;
			$name=M("stu")->where($data)->getfield("s_name");
			//带队老师
			$city=M("city");
			$clist=$city->select();
			$this->assign("teacher",$clist);
			$arr=$hui->where("hz_sid=".$s_id)->find();
			$this->assign("name",$name);
			$this->assign("list",$arr);
			$this->display();
		}
	}
	//意见与反馈
//==================================================================================================
	public function advice()
	{
		if(!empty($_POST["submitsave"]))
		{
			$advice=M("advice");
			$data["ad_cont"]=$_POST["ad_cont"];
			$data["ad_cd"]=$_POST["ad_cd"];
			$data["ad_time"]=date("Y-m-d H:i:s",time());
			if($data["ad_cont"])
			{
				if(session("s_id"))
				{
					$data["ad_sid"]=session("s_id");
				}
				if(session("c_id"))
				{
					$data["ad_cid"]=session("c_id");
				}
				$rs=$advice->add($data);
				if($rs)
				{
					$this->success("提交成功");
				}
				else
				{
					$this->error("提交失败");
				}
			}
			else
			{
				$this->error("请填写内容");
			}
		}
		else
		{
			$this->assign("c_id",session("c_id"));
			$this->display();
		}
	}
//==================================================================================================
	public function serve()
	{
		R("Common/student");
        	//判断就业服务是否有值        
        	 $serve=M("ret");
			
		//判断是否点击保存
		if(empty($_POST["submit"]))
		{
		//------------------------------------------------------------------------------------------
			$sid=session("s_id");
			//判断是否有数据
			$data["r_sid"]=$sid;
			$num=$serve->where($data)->count();
			if ($num>0)
			{	//已存在数据  显示出来
				$arr=$serve->where($data)->limit(3)->select();
			}
			$city=M("City");
			$clist=$city->group("ci_name")->select();
			$this->assign("city",$clist);
			//修改时 显示数据
			if($_GET["r_id"])
			{
				$data["r_id"]=$_GET["r_id"];
				$list=$serve->where($data)->find();
				$this->assign("list",$list);
			}
			$this->assign("arr",$arr);
			$this->display();
			}
			else
			{
				import('ORG.Net.UploadFile');
				$upload = new  \Think\Upload();// 实例化上传类
				$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');		// 设置附件上传类型
				$upload->savePath =  './Public/Uploads/ret/';		// 设置附件上传目录
				$serve->create();
		//----------------------------------------------------------------------------------------		
				$serve->r_time=time();
				if(!$upload->upload())
				{
					//没有上传图片便添加、修改其他数据
					//判断是修改还是添加
					if (!empty($_POST["id"]))
					{
							$rs=$serve->where("r_id=".$_POST["id"])->save(); // 写入数据到数据库							
							if($rs)
							{								
								$this->success("修改成功",U("Return/serve"),1);
							}
							else
							{
								$this->error("修改失败");
							}
					}
					else
					{
							$serve->r_sid=session("s_id");
							$rs=$serve->add(); // 写入用户数据到数据库
							if($rs)
							{
								$this->success("新增成功",U("Return/serve"),1);
							}
							else
							{
								$this->error("新增失败");
							}
					}
				}
				else
				{
					// 上传成功 获取上传文件信息				
					$info =  $upload->getUploadFileInfo();
					$serve->r_photo = $info[0]['savename'];	 // 保存上传的照片根据需要自行组装
					if (!empty($_POST["id"]))
					{	//判断是修改还是添加
						//更换图片时先清除缓存图片
						$fetch=$serve->where("r_sid=".$sid)->find();
						$path="public/Uploads/ret/".$fetch["r_photo"];
						if(file_exists($path))
						{
							@unlink($path);
							clearstatcache();
						}
							//修改数据 保存
							$rs=$serve->where("r_id=".$_POST["id"])->save(); // 写入用户数据到数据库
								
							if($rs)
							{
								
								$this->success("修改成功",U("Return/serve"),2);
							}
							else
							{
								$this->error("修改失败");
							}
					}
					else
					{
							$serve->r_sid=session("s_id");
							$rs=$serve->add(); // 写入用户数据到数据库
							if($rs)
							{
								$this->success("新增成功",U("Return/serve"),2);
							}
							else
							{
								$this->error("新增失败");
							}
					}
				}
		}
	}

}
?>