<?php
namespace Home\Controller;
use Think\Controller;
/**
 * 
 * Enter description here ...
 * @author 茂飞
 * @time	2015-11-24
 */
class PublicController extends Controller
{
	 public function Upload($path)
	{
		import('ORG.Net.UploadFile');
		$upload			=	new UploadFile();	//实例化上传类
		//移动文件
		$upload->maxSize	=	3145728;	//设置附件上传大小
		$upload->allowExts	=	array('jpg','gif','png','jpeg');	//设置上传类型
		$upload->savePath	=	'./Public/Uploads/'.$path."/";	//设置上传目录
		
		if(!$upload->upload())
		{
			//$this->error($upload->getErrorMsg());
		}
		$info		=	$upload->getUploadFileInfo();
	    return $info[0]['savename'];
	}
	/**
	 * 验证码
	 * Enter description here ...
	 */
	public function verify(){
		import('ORG.Util.Image');
		Image::buildImageVerify();
	}
	
	/**
	 * 退出登录
	 * Enter description here ...
	 */
	public function un()
	{
		//清空session
		session(null);
		$this->success('注销成功','__APP__/Index/login');
	}
	
	/**
	 * 判断是否登录了
	 */
	public function issession()
	{
		if(!session('?id'))
		{
			$this->error('未登录，请登录！！！','__APP__/Index/login');
		}
	}
	
	/**
	 * 上传图片（学生）
	 * Enter 	description here ...
	 * @return	移动后的文件名
	 */
	public function Up()
	{
		import('ORG.Net.UploadFile');
		$upload	=	new \Think\Upload();	//实例化上传类
		
		//生成缩略图
		$upload->thumb	=	true;		//开启缩略图
		$upload->thumbPrefix	=	's_';	//设置缩略图前缀
		$upload->thumbMaxWidth	=	'105';		//设置缩略图最大宽度
		$upload->thumbMaxHeight = '100';		//设置缩略图最大高度
		$upload->thumbPath	=	'./Public/Uploads/StuHead/slt/';	//设置缩略图路径
		
		//移动文件
		$upload->maxSize		=	3145728;	//设置附件上传大小
		$upload->allowExts		=	array('jpg','gif','png','jpeg');	//设置上传类型
		$upload->savePath		=	'./Public/Uploads/StuHead/';	//设置上传目录
		
		if(!$upload->upload())
		{
			$this->error($upload->getErrorMsg());
		}
		$info		=	$upload->getUploadFileInfo();
	    return $info[0]['savename'];
	}

	/**
	 * 二级联动(年级->班级)
	 * Enter description here ...
	 */
	public function getClass()
	{
		$map['c_gid']	=	$_GET['c_gid'];
		$Class		=	M("Class");
		$count		=	$Class->where($map)->count();
		if($count>0)
		{
			$vole_c		=	$Class->where($map)->select();
			$arr.="<select name=\"c_id\" id=\"cl\"><option value=\"\">----请选择----</option>";
			foreach ($vole_c as $value)
			{
				$arr.="<option value=".$value['c_id'].">----".$value['c_name']."----</option>";
			}
			$arr.="</select>";
			echo $arr;
		}
	}

	/**
	 * 二级联动（班级->学生）
	 * Enter description here ...
	 */
	public function getStu()
	{
		$map['c_id']	=	$_GET['Cla'];
		$Stu			=	M("Stu");
		$count		=	$Stu->where($map)->count();
		$arr='<select name="by_id" id="stu" class="dfinput"><option value="">----请选择----</option>';
		if($count>0)
		{
			$vole_c	=	$Stu->where($map)->select();
			foreach ($vole_c as $value)
			{
				$arr.='<option value="'.$value['s_id'].'">----'.$value['s_name'].'----</option>';
			}
		}
		$arr.='</select>';
		echo $arr;
	}

	/**
     * 公共删除类
     * $table str    表的名字
     * $id    int    字段的ID
     * $url   str    成功后跳转的页面
     */
    public function delete($table,$id,$url)
    {
	        if($table=="Grade")
	        {
	        	if($a = M($table) -> delete($id))
	           	 {
	                 	if(M('Class') -> where("c_gid=".$a) -> delete())
	                	U($url,'','',true);
	            	}
	        }
	        else
	        {
	        	if(M($table) -> delete($id))
	            	{
	                	U($url,'', '', true );
			}
		}
   }

	/**
	 * 分页
	 * Enter description here ...
	 * @param unknown_type $table		表名
	 * @param unknown_type $where	查询条件
	 * @param unknown_type $order		排序条件
	 * @param unknown_type $limit		每页显示条数
	 * @param unknown_type $join1		表连接1
	 * @param unknown_type $join2		表连接2
	 * @param unknown_type $join3		表连接3
	 */
	public function page($table, $where, $order, $limit='10', $join1, $join2, $join3)
	{
		//$Data 	= M ( $table ); 	// 实例化Data数据对象
		$Data 	= D ( $table ); 	// 实例化Data数据对象
		import ( 'ORG.Util.Page' ); // 导入分页类
		$count 	= $Data->where ( $where )->join ( $join1 )->join ( $join2 )->join ( $join3 )->count(); 	// 查询满足要求的总记录数 $map表示查询条件
		$Page 	= new Page ( $count,$limit );	 // 实例化分页类 传入总记录数
		$Page->setConfig ( 'header', '共条数据' );
		$Page->setConfig ( 'first', '<<' );
		$Page->setConfig ( 'last', '>>' );
		$show = $Page->show ();	 // 分页显示输出
		// 进行分页数据查询
		$value = $Data->where ( $where )->join ( $join1 )->join ( $join2 )->join ( $join3 )->limit ( $Page->firstRow . ',' . $Page->listRows )->order ( $order )->select ();
		$map['value']	=	$value;
		$map['page']	=	$show;
		return	$map;
    }
    
    /**
     * 匹配度
     * Enter description here ...
     * @param string $str
     * @param string $byStr
     */
    public function matching($str,$byStr)
    {
	    	$arr		=	explode(",",$str);
	    	$byArr	=	explode(",",$byStr);
	    	foreach ($arr as $value)
	    	{
	    		
	    	}
    }
}