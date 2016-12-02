<?php
namespace Home\Controller;
use Think\Controller;
// 本类由系统自动生成，仅供测试用途
class IndexController extends Controller
{

	//销毁session  安全退出
	public function tc()
	{
		session(null);
		$this->success("退出成功",U("Index/index"),1);
	}
	//验证码
	Public function verify()
	{
        	import('ORG.Util.Image');
		Image::buildImageVerify();
    	}
    public function hezuo()
    {
 		$this-> hezuo = M("Hezuo") -> select();
 		$this->display();
    }
//==================================================================================================
	// 主页数据传输
	public function index()
	{
		//首部banner广告
	       	$this-> info = M("Info") -> where("i_banner=2") -> order("i_time desc") -> limit(0,6) -> select();
	        $this-> info2 = M("Info") -> where("i_state=2") -> order("i_time desc") -> limit(0,7) -> select();
	        $this-> info3 = M("Info") -> where("i_state=3") -> order("i_time desc") -> limit(0,7) -> select();
	        $this-> info4 = M("Info") -> where("i_state=4") -> order("i_time desc") -> limit(0,7) -> select();
	        $this-> info5 = M("Info") -> where("i_state=5") -> order("i_time desc") -> limit(0,7) -> select();
	        $this-> hezuo = M("Hezuo") ->order("hz_time desc")-> limit(0,18) -> select();
	//----------------------------------------------------------------------------------------------
			//推荐企业
			//查询出 满足推荐的 企业编号
			$company=M("Company");
			$rec=M("recruit");
			$jo=$company->join('inner join job_recruit on job_company.c_id=job_recruit.re_cid')->where("re_jian=1  and re_hide=1   and re_state=1")->select();
			//满足的数据（企业编号）循环赋值给数组 数组进行去重复
			 foreach ($jo as $key => $value)
			 {
			 	$tt[]=$value['c_id'];
			 }
			 //数组将数据去重复
			 $tt=array_unique($tt);
			 //将要满足的条件 付给变量
			 $map['c_id']  = array('in',$tt);
			 //查询出满足条件的 数据  满足发布职位了的企业编号的数据 
			 $jian=$company->where($map)->order("c_time desc")->limit("12")->select();
			foreach ($jian as $key => $value)
			{
				//查询出 表链接 后的数据
				$job_arr=$rec->order("re_time desc ")->where("re_cid=".$value["c_id"]." and re_hide=1  and re_state=1")->limit(2)->select();
				foreach ($job_arr as $key1 => $rs)
				{
					//构造数组
					$jian[$key]["job"][$key1]["re_job"]=$rs["re_job"];
					$jian[$key]["job"][$key1]["re_money"]=$rs["re_money"];
					$jian[$key]["job"][$key1]["re_id"]=$rs["re_id"];
				}
				
			}
	  //----------------------------------------------------------------------------------------------
			//查询 企业招聘
			$joblist=$company->join('inner join job_recruit on job_company.c_id=job_recruit.re_cid')->where("re_hide=1 and re_state=1")->select();
			//满足的数据（企业编号）循环赋值给数组 数组进行去重复
			 foreach ($joblist as $key => $value)
			 {
			 	$c_id[]=$value['c_id'];
			 }
			 //数组将数据去重复
			 $c_id=array_unique($c_id);
			 //将要满足的条件 付给变量
			 $map['c_id']  = array('in',$c_id);
			 //查询出满足条件的 数据  满足发布职位了的企业编号的数据 
			 $joblist=$company->where($map)->order("c_time desc")->limit("10")->select();
			foreach ($joblist as $key => $value)
			{
				//查询出 表链接 后的数据
				$job_arr=$rec->order("re_time desc")->where("re_cid=".$value["c_id"]." and re_hide=1")->select();
				foreach ($job_arr as $key1 => $rs)
				{
					//构造数组
					$joblist[$key]["job"][$key1]["re_job"]=$rs["re_job"];
					$joblist[$key]["job"][$key1]["re_id"]=$rs["re_id"];
				}
			}
			$this->assign("joblist",$joblist);
			$this->assign("jian",$jian);
			if(session("s_id"))
			{
				$stu=M("stu");
				$arr=$stu->where("s_id=".session("s_id"))->find();
				$this->assign("session",session("s_id"));
				$this->assign("name",$arr["s_user"]);
			}
			if(session("c_id"))
			{
				$company=M("company");
				$arr=$company->where("c_id=".session("c_id"))->find();
				$this->assign("session",session("c_id"));
				$this->assign("name",$arr["c_user"]);
			}
			$this->display();
	}

//==================================================================================================
 //主页登陆
 	public function login()
 	{
        	if(!empty($_POST["submit"]))
        	{
            		$type=$_POST['hide'];
	//----------------------------------------------------------------------------------------------
	          	if($type==1)
	          	{
		            	//学生登录
		            	 $stu=M("stu");
		            	 $data['s_user']=$_POST['username'];
		            	 $data['s_pwd']=$_POST['userpwd'];
		            	 $data['s_state']=1;
		            	 $num=$stu->where($data)->count();
	            	 	if(1==$num)
	            	 	{
		            	 	$rs=$stu->where($data)->find();
		            	 	$date["s_time"]=date("Y-m-d H:i:s",time());
		            	 	session("s_id",$rs["s_id"]);
		            	 	session("time",$rs["s_time"]);	//获取上次登陆时间
		            	 	$stu->where($data)->save($date);
		            	 	$this->success("登陆成功",U("Index/index"),1);
	            	 	}
	            	 	else
	            	 	{
	            	 		$this->error("登陆失败");
	            	 	}
	           	 }
	            	if($type==2)
	            	{
	                	//企业登陆
	                 	$company=M("company");
	                 	$data['c_user']=$_POST['username'];
	            	 	$data['c_pwd']=$_POST['userpwd'];
	            	 	$data['c_state']=1;
	            	 	$num=$company->where($data)->count();
	            	 	if(1==$num)
	            	 	{
	            	 		$rs=$company->where($data)->find();
	            	 		$date["c_time"]=date("Y-m-d H:i:s",time());
	            	 		session("c_id",$rs["c_id"]);
	            	 		session("time",$rs["c_time"]);	//获取上次登陆时间
	            	 		$company->where($data)->save($date);
	            	 		$this->success("登陆成功",U("Index/index"),1);
	            	 	}
	            	 	else
	            	 	{
	            	 		$this->error("登陆失败");
	            		}
	            	}
    		}
	}
}