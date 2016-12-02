<?php
// 本类由系统自动生成，仅供测试用途
class ComAction extends CommonAction {
	Public function _initialize(){
	   R("Public/issession");
	}
	//企业列表页
	public function comlist(){
		$company=M("company");
		//模糊查询
		if ($_GET["c_name"]!="") {
			$data["c_name"]=array("like","%".$_GET["c_name"]."%");
		}
		if ($_GET["c_city"]!="") {
			$data["c_address"]=array("like","%".$_GET["c_city"]."%");
		}
		if ($_GET["c_telname"]!="") {
			$data["c_telname"]=$_GET["c_telname"];
		}
		if ($_GET["c_size"]!="") {
			$data["c_size"]=$_GET["c_size"];
		}
		
		if ($_GET["c_state"]!="") {
			$data["c_state"]=$_GET["c_state"];
		}
		//城市
		$city=M("city");
		$list=$city->select();
		$city=array();
		foreach($list as $key => $val){
			$city[]=$val["ci_name"];
		}
		$c=array_unique($city);
		import('ORG.Util.Page');// 导入分页类
		$count      = $company->where($data)->count();// 查询满足要求的总记录数
		$Page       = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		$arr = $company->where($data)->order("c_time desc")->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('page',$show);
		$this->assign('arr',$arr);
		$this->assign('val',$_GET);
		$this->assign('city',$c);
		if($_GET["print"]){
		    $key=array(0 => '企业编号',1 => '登录账号', 2 => '登录密码',3 => '企业名称', 4 => '企业地址',5 => '联系电话',
		   	6 => '联系邮箱',7 => '企业网址',8 => '企业规模1、大 2、中 3、小',9 => '联系人',10 => '联系qq', 11 => '企业logo', 12 => '审核状态',
		  	13 => '企业介绍',14=> '登录时间');
			R("Common/getExcel",array($key,$arr));
		}	
		$this->display();
	}
	//企业删除  级联删除
	public function delete(){
		$company=D("Company");
		if ($_GET["c_id"]) {
			$c_id=$_GET["c_id"];
			$rs=$company->relation(true)->delete($c_id);
			if ($rs) {
				$this->success("删除成功",U("Com/comlist"));
			}else{
				$this->error("删除失败");
			}
		}else{
			//批量删除
			$c_id=$_GET["id"];
			$cid=explode(",", $c_id);
			
			foreach ($cid as $key => $value) {
				
				$rs=$company->relation(true)->delete($value);
			}
		
			if ($rs) {
				$this->success("删除成功",U("Com/comlist"));
			}else{
				$this->error("删除失败");
			}
		}
	}
	
	//企业注册审核
	public function state(){
		$company=M("company");
		$c_id=$_GET["c_id"];
		$arr=$company->find($c_id);
		if($_GET["id"]==1){
			$data["c_state"]=1;
			R("Common/send",array($arr["c_email"],$arr["c_time"],1));
		}else{
			$data["c_state"]=2;	
			R("Common/send",array($arr["c_email"],$arr["c_time"],2));
		}
		$rs=$company->where("c_id=".$c_id)->save($data);
		if ($rs) {
			$this->success("审核成功",U("Com/comlist"));
		}else{
			$this->error("审核失败",U("Com/comlist"));
		}
	}
	
	//企业信息修改
	public function  update(){
		$company=M("company");
		if(empty($_POST["submit"])){
			$c_id=$_GET["c_id"];
			$rs=$company->where("c_id=".$c_id)->find();
			$this->assign("role",$rs);
			$this->display();
		}else{
			$c_id=$_POST["c_id"];
			$data=$company->create();
			$rs=$company->where("c_id=".$c_id)->save($data);
		
			if ($rs) {
				$this->success("修改成功",U("Com/comlist"));
			}else{
				$this->error("修改失败");
		}
		}
	}
	//企业招聘信息页面
	public function recruit(){
		$recruit=M("recruit");
		
		if ($_GET["c_name"]!="") {
			$data["job_company.c_name"]=array("like","%".$_GET["c_name"]."%");
		}
		if ($_GET["re_telname"]!="") {
			$data["re_telname"]=$_GET["re_telname"];
		}
		
		if ($_GET["re_city"]!="") {
			$data["re_city"]=$_GET["re_city"];
		}
		if ($_GET["re_state"]!="") {
			$data["re_state"]=$_GET["re_state"];
		}
		if ($_GET["re_jian"]!="") {
			$data["re_jian"]=$_GET["re_jian"];
		}
		if ($_GET["re_job"]!="") {
			$data["re_job"]=$_GET["re_job"];
		}
		//职位
		$re=$recruit->where("re_state=1")->select();
		$rec=array();
		foreach($re as $key => $val){
			$rec[]=$val["re_job"];
		}
		$job=array_unique($rec);
		
		//城市
		$city=M("city");
		$list=$city->select();
		$city=array();
		foreach($list as $key => $val){
			$city[]=$val["ci_name"];
		}
		$c=array_unique($city);
		import('ORG.Util.Page');// 导入分页类
		$count      = $recruit->where($data)->join(" join job_company on job_company.c_id=job_recruit.re_cid")->count();// 查询满足要求的总记录数
		$Page       = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$arr = $recruit->where($data)->join(" join job_company on job_company.c_id=job_recruit.re_cid")->order("re_time desc")->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('page',$show);// 赋值分页输出*/
		$this->assign("arr",$arr);
		$this->assign('val',$_GET);
		$this->assign('city',$c);
		$this->assign('job',$job);
		if($_GET["print"]){
			//要打印的数组 $arr
			////要打印的数组
			$rlist=$recruit->select();
			foreach ($rlist as $key => $value) {	
				$company=M("company");
				$cinfo=$company->where("c_id=".$value["re_cid"])->find();
					$rlist[$key]["re_cid"]=$sinfo["c_name"];	
			}
		    $key=array(0 => '编号',1 => '企业名称', 2 => '关键字',3 => '招聘职位', 4 => '招聘人数',5 => '截至日期',
		   	6 => '工作地区',7 => '工资范围',8 => '职位描述',9 => '联系人',10 => '联系方式', 11 => '审核状态', 12 => '添加时间',
		  	13 => '1、显示 2、隐藏',"推荐","工作经验","悬赏金额");
			R("Common/getExcel",array($key,$rlist));
		}
		$this->display();
	}
	//招聘信息删除
	public function del(){
		$recruit=D("recruit");
		if ($_GET["re_id"]) {
			$re_id=$_GET["re_id"];
			$rs=$recruit->delete($re_id);
			if ($rs) {
				$this->success("删除成功",U("Com/recruit"));
			}else{
				$this->error("删除失败");
			}
		}else{
			//批量删除
			$re_id=$_GET["id"];
			$re_id=explode(",", $re_id);
			
			foreach ($re_id as $key => $value) {
				
				$rs=$recruit->delete($value);
			}
		
			if ($rs) {
				$this->success("删除成功",U("Com/recruit"));
			}else{
				$this->error("删除失败");
			}
		}
	}
	//企业发布招聘审核
	public function rec_state(){
		$recruit=M("recruit");
		$re_id=$_GET["re_id"];
		if($_GET["id"]==1){
			$data["re_state"]=1;
		}else{
			$data["re_state"]=2;
		}
		$rs=$recruit->where("re_id=".$re_id)->save($data);
		
		if ($rs) {
			$this->success("审核成功",U("Com/recruit"));
		}else{
			$this->error("审核失败");
		}
	}
	//企业发布招聘修改
	public function rec_update(){
		$recruit=M("recruit");
	
		if(!empty($_POST["submit"])){
			$data=$recruit->create();
			$rs=$recruit->where("re_id=".$_POST["re_id"])->save($data);
			if ($rs) {
				$this->success("修改成功",U("Com/recruit"));
			}else{
				$this->error("修改失败");
			}
		}else{
			$re_id=$_GET["re_id"];
			$arr=$recruit->find($re_id);
			$this->assign("role",$arr);
			$this->display();
		}
		
	}
	public function re_jian(){
		$recruit=M("recruit");
		if($_GET["rid"]){
			$id=$_GET["rid"];
			$re_id=$_GET["re_id"];
			if($id==0){
				$data["re_jian"]=1;
			}else{
				$data["re_jian"]=0;
			}
		$rs=$recruit->where($re_id)->save($data);
		if ($rs) {
					$this->success("设置成功",U("Com/recruit"));
				}else{
					$this->error("设置失败");
				}
		}else{
			$re_id=$_GET["id"];
			$re_id=explode(",", $re_id);
			foreach ($re_id as $key => $value) {
					$arr=$recruit->find($value);
					if($arr["re_jian"]==0){
						$data["re_jian"]=1;
					}else{
						$data["re_jian"]=0;
					}
				$rs=$recruit->where("re_id=".$value)->save($data);
			}
			
				if ($rs) {
					$this->success("设置成功",U("Com/recruit"));
				}else{
					$this->error("设置失败");
				}
		}
		
	}
	public function down($a,$b){
			import('ORG.Util.Excel');// 导入分页类
			$excel = new Excel();
			$excel->addHeader($a);
	 		$excel->addBody($b);
	 		$excel->downLoad();
		

	}

}
?>