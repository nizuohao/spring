<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller 
{
    public function index()
    {
    	if($_SESSION['id']=='')
    	{
    		$this->success('请登录',U("Index/login"));
    	}
    	else
    	{
    		$this->display();
    	}
    }
		public function login()
		{
			$data	=	D("Admin");
			if(!empty($_POST['sub']))
			{
				$where['ad_user']	=	$_POST['user'];
				$where['ad_pwd']	=	md5($_POST['pwd']);
	
				if($where['ad_user']=='')
				{
					$this->error('请输入用户名',U("Index/login"));
				}
				$num	=	$data->where($where)->count();
				if (1==$num)
				{
					$rs =	$data->where($where)->find();
					$_SESSION['id']		=	$rs['ad_id'];
					$_SESSION['user']	=	$where['ad_user'];
					$_SESSION['time']	=	$rs['ad_time'];
					
					//修改本次登录时间
					$where_time['ad_time']=	date("Y-m-d H:i:s");
					
					$data->where($where)->save($where_time);
					
					$this->success("登录成功",U("Index/index"));
				}
				else 
    		{
    			$this->error("用户名或密码错误",U("Index/login"));
    		}
			}
			else
			{
/*				$Verify = new \Think\Verify();
				$Verify->fontSize = 30;
				$Verify->length   = 4;
				$Verify->useNoise = true;
				$v = $Verify->entry();
				$this->assign('v',$v);*/
				$this->display();
			}
		}
		public function left(){
    	$this->display();
    }
    public function top(){		
			$this->display();
    }
    public function right()
    {
    	R("Public/issession");
    	$stu		=	M("Stu");
			$com	=	M("Company");
			$recruit	=	M("recruit");
			$info		=	M("sinfo");
  		$value['stu']		=	$stu->where("s_state=0")->count();
			$value['com']		=	$com->where("c_state=0")->count();
			$value['rec']		=	$recruit->where("re_state=0")->count();
			$value['info']	=	$info->where("si_state=0")->count();
			$this->assign("value",$value);
    	$this->display();
    }
		public function loginOut()
		{
			session(null);
			$this->success("退出成功",U("Index/login"));
		}
}