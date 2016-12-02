<?php
namespace Home\Controller;
use Think\Controller;
// 本类由系统自动生成，仅供测试用途
class ShuoshuoController extends CommonController
{
    /**
     *个人信息展示页面
     */
	
    public function index()
    {
		R("Common/student");
	        $in1["si_state"]=1;
	        $in1["si_id"]=$_GET['id'];
	        $info = $this -> info = M("Sinfo") -> where($in1) -> join ("job_stu on s_id=si_sid") -> find();
	        $in2["si_state"]=1;
	        $in2["si_sid"]=$info['s_id'];
	        $this -> info1 = M("Sinfo") -> where($in2) -> join ("job_stu on s_id=si_sid") -> select();
	        $in3["ri_siid"]=$_GET['id'];
	        $this -> hui  = M("Rinfo") -> where($in3) -> join("job_stu on s_id=ri_sid") -> select();
	        $this -> count1  = M("Rinfo") -> where($in3) -> join("job_stu on s_id=ri_sid") -> count();
	        $in4["hzc_siid"]=$_GET['id'];
	        $this -> click = M("HzClick") -> where($in4) -> count();
		$info=M("rinfo");
		$id=$_GET["id"];
		//查出 回复发表者  的 学生编号
		$sid=$info->where("ri_tid=0 and ri_siid=$id")->order("ri_time desc")->select();
		$ar=array();
		
		
		foreach ($sid as $k => $v)
		{
			//查询出 无父级编号的信息
			$arr[]=$info->join("join job_stu on s_id=ri_sid")->order("ri_time desc")->where("ri_sid=".$v["ri_sid"]." and ri_tid=0 ")->find();
			
			foreach ($arr as $key => $value)
			{
				//查询出发布者的学生编号
				$si_sid=$info->join("join job_sinfo on si_id=ri_siid")->where("ri_siid=$id")->getfield("si_sid");
				$stu=M("stu");
				//通过发布者的学生编号 查出 他的姓名   构造数组
				$arr[$key]["ri_name"]=$stu->join("join job_sinfo on s_id=si_sid")->where("si_sid=".$si_sid)->getfield("s_name");
				//查询出回复人的姓名
				
				$arr[$k]['hui']=$info->join("join job_stu on s_id=ri_sid")->order("ri_time desc")->where("ri_tid=".$value["ri_sid"]." and ri_siid=$id ")->select();

				foreach ($ar as $ke => $val)
				{
					//查询出被回复的姓名//构造数组
					$arr[$k]['hui'][$ke]["r_name"]=$info->join("join job_stu on s_id=ri_tid")->where("ri_tid=".$val["ri_tid"])->getfield("s_name");	
				}
			}
		}
		$data["ri_siid"]=$_GET["id"];
		$length=$info->where($data)->count();
        $this->assign("arr",$arr);
		$this->assign("s_id",session("s_id"));
		$this->assign("length",$length);
        $this -> display("conn");
    }
    /**
     *个人信息展示列表
     */
    public function index_list()
    {
        $info = $this -> info = M("Stu") -> find($_GET['s_id']);
        $Data 	= D ("Sinfo"); // 实例化Data数据对象
		import ( 'ORG.Util.Page' ); // 导入分页类
		$count 	= $Data->where ( "si_state = 1 and si_sid = ".$_GET['s_id'] )->count(); // 查询满足要求的总记录数 $map表示查询条件
		$Page 	= new Page ( $count,5 ); // 实例化分页类 传入总记录数
		$Page->setConfig ( 'header', '条数据' );
		$Page->setConfig ( 'first', '<<' );
		$Page->setConfig ( 'last', '>>' );
		$show = $Page->show (); // 分页显示输出
		// 进行分页数据查询
		$value = $Data->where ( "si_state = 1 and si_sid = ".$_GET['s_id'] ) -> join ("job_stu on s_id=si_sid") ->limit ( $Page->firstRow . ',' . $Page->listRows )->order ("si_time desc")->select ();
        $this -> list1 =$value;
        $this -> page = $show;
        $this -> display();
    }
    /**
     *所有信息展示列表
     */
    public function index_select()
    {
        R("Common/student");
		if($_GET["s_id"])
		{
			$da["si_sid"]=$_GET["s_id"];
		}
		$da["si_state"]=1;
        	$Data = D ("Sinfo"); 		// 实例化Data数据对象
		import ( 'ORG.Util.Page' );		 // 导入分页类
		$count 	= $Data->where ($da)->count(); 		// 查询满足要求的总记录数 $map表示查询条件
		$Page 	= new \Think\Page( $count,5 ); 		// 实例化分页类 传入总记录数
		$Page->setConfig ( 'header', '条数据' );
		$Page->setConfig ( 'first', '<<' );
		$Page->setConfig ( 'last', '>>' );
		$show = $Page->show ();	 // 分页显示输出
		// 进行分页数据查询
		$value = $Data->where ( $da ) -> join ("job_stu on s_id=si_sid") ->limit ( $Page->firstRow . ',' . $Page->listRows )->order ("si_time desc")->select ();
		foreach($value as $key => $val)
		{
			$value[$key]["ping"]=M("rinfo")->where("ri_siid=".$val["si_id"])->count();
		}
        $this -> list1 =$value;
        $this -> state = "shuo";
        $this -> page = $show;
        $this -> display("list");
        
    }
    /**
     *喜欢的点击 的标签
     */
    public function zan()
    {
        R("Common/student");
        $where['hzc_siid']=$_POST['si_id'];
        $where['hzc_sid'] =session("s_id");
        $like = M("HzClick");
        $a = $like -> where($where) -> count();
        if($a==1)
        {
            echo "您已经点过赞了哦";
        }
        else
        {
            $where['hzc_time']=time();
            $like -> add($where);
            echo "点赞成功，楼主会感谢您的";
        }
        //echo $_GET['si_id'];
    }
    /**
    * 说说发布的管理系统
    */
    public function shuoshuo()
    {
        R("Common/student");
        $in = M("Sinfo");
        if($_POST["submit"])
        {
            $data = $in -> create();
            $data['si_time'] = time();
            $data['si_sid'] =session("s_id");
            $in -> add($data);
            $this -> success("发布成功，等待管理员审核。","__APP__/Shuoshuo/index_select",2);
        }
        else
        {
            $this->display();
        }
       
    }
    /**
    *  回复的管理系统
    */
    public function huifu()
    {
        R("Common/student");
        $ri = M("Rinfo");
		$num=$ri->where("ri_sid=".session("s_id"))->count();
		if($num==1)
		{
			$this->error("只有一次机会哦");
		}
		else
		{
			$data = $ri -> create();
			$data['ri_time'] = time();
			$data['ri_sid'] = session("s_id");
			$ri -> add($data);
			$this -> success("回复成功");
		}
        
    }
	public function del()
	{
        R("Common/student");
        if(session("s_id")==$_GET["s_id"] || session("s_id")==$_GET["sid"] )
        {
        	$data["ri_id"]=$_GET["ri_id"];
            	$rinfo=M("rinfo");
            	$arr=$rinfo->where($data)->find();
        	$rs=$rinfo->where($data)->delete();
        	if($rs)
        	{
	                if($arr["ri_tid"]=='' || $arr["ri_tid"]==0){
	                    $where["ri_tid"]=$arr["ri_sid"];
	                    $rinfo->where($where)->delete();
	                }
	                else
	                {
	                	
	                }
	        	   $this -> success("删除成功");
	        }
        	else
        	{
        	 $this -> error("删除失败");
        	}
        }
        else
        {
            $this->error("你不能删除");
        }
	}
    public function ajax()
    {
        $rinfo=M("rinfo");
        $data["ri_tid"]=$_POST["ri_tid"];
        $data["ri_siid"]=$_POST["si_id"];
        $data["ri_content"]=$_POST["content"];
        $data["ri_sid"]=session("s_id");
        $data["ri_time"]=time();
        $rs=$rinfo->add($data);
        if($rs)
        {
            echo 1;
        }
        else
        {
            echo 2;
        }
    }
    public function delete()
    {
        R("Common/student");
         if(session("s_id")==$_GET["s_id"])
         {
            $data["si_id"]=$_GET["si_id"];
            $s_id=M("sinfo")->where($data)->getfield("s_id");
            $rs=M("sinfo")->where($data)->delete();
            if($rs)
            {
                M("rinfo")->where("ri_siid=".$_GET["si_id"])->delete();
                $this->success("删除成功",U("Shuoshuo/index_select"));
            }
            else
            {
                $this->error("删除失败");
            }
       }
       else
       {
             $this->error("你不能删除");
        }
    }
}