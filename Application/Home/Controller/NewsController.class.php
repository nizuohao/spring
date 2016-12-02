<?php
namespace Home\Controller;
use Think\Controller;
// 本类由系统自动生成，仅供测试用途
class NewsController extends Controller
{
     public function info()
     {
      	$this -> info = M("Info") -> find($_GET['id']);
        $state = M("Info") -> field("i_state,i_banner") -> find($_GET['id']);
        if($state['i_banner']==2)
        {
            $this -> state = 1;            
        }
        else
        {
            $this -> state = $state["i_state"];
        }
        $this -> display();
    }
    public function info_select()
    {
        if($_GET['i_state'])
        {
            $where["i_state"] = $_GET["i_state"];
        }
        if($_GET['i_banner'])
        {
            $where["i_banner"] = $_GET["i_banner"];
        }
        $Data 	= D ("Info"); 	// 实例化Data数据对象
		import ( 'ORG.Util.Page' ); 	// 导入分页类
		$count 	= $Data->where ( $where )->count(); 	// 查询满足要求的总记录数 $map表示查询条件
		$Page 	= new \Think\Page ( $count,5 ); 	// 实例化分页类 传入总记录数
		$Page->setConfig ( 'header', '条数据' );
		$Page->setConfig ( 'first', '<<' );
		$Page->setConfig ( 'last', '>>' );
		$show = $Page->show (); 	// 分页显示输出
		// 进行分页数据查询
		$value = $Data->where ( $where )->limit ( $Page->firstRow . ',' . $Page->listRows )->order ("i_time desc")->select ();
        $this -> list1 =$value;
        $this -> page = $show;
	//$this -> state = $_GET['i_state'];
        if($_GET['i_banner']==2)
        {
            $this -> state = 1;            
        }
        else
        {
            $this -> state = $_GET["i_state"];
        }
	//echo $state["i_state"];
        $this -> display("info_select");
    }
}