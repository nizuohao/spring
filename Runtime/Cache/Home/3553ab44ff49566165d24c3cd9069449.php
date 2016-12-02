<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>密码保护</title>
<meta http-equiv="X-UA-Compatible" content="IE=7">
<link href="/Spring/Public/home/templates/default/css/style.css" rel="stylesheet" type="text/css">
<link href="/Spring/Public/home/templates/default/css/user.css" rel="stylesheet" type="text/css" />
<script src="/Spring/Public/home/templates/default/js/jquery.js" type='text/javascript' language="javascript"></script>

<script src="/Spring/Public/home/templates/default/js/jquery.idTabs.min.js" type='text/javascript' language="javascript"></script>
<script src="/Spring/Public/home/templates/default/js/jquery.validate.min.js" type='text/javascript' language="javascript"></script>
<script type="text/javascript">
$(document).ready(function()
{
	$("#answer2").hide();
	$("#hide").click(function(){
		$val=$("#val").val();
		if($val==1){
		$("#answer1").hide();
		$("#answer2").show();
		$(this).val("隐藏");
		$("#val").val("2");
	}else{
		$("#answer1").show();
		$("#answer2").hide();
		$(this).val("显示");
		$("#val").val("1");
	}

	});
	$("#tabshow li:nth-child(2)>a").addClass("selected");
	//范例展开
	$("#model1").click(function(){	$("#ex1").toggle()});
	$("#model2").click(function(){	$("#ex2").toggle()});
	//提交表单】
	$("#submitsave").click(function(){
	$('#Form1').submit();
	})
});


</script>
</head>
<body>
<link href="/Spring/Public/home/templates/default/css/global.css" rel="stylesheet" type="text/css">

<header>
  <div id="top">
      <h1 class="logo"><a href="http://www.sdspring.cn"><img src="/Spring/Public/home/data/images/logo.png" width="193" height="45" /></a></h1>
        <nav class="list">
            <a href="/Spring/index.php/Home" class="selected">首页</a>
            <a href="/Spring/index.php/Home/News/info_select">就业快讯</a>
            <a href="/Spring/index.php/Home/Return/huizhi">入职信息</a>
            <a href="/Spring/index.php/Home/Return/serve">就业跟踪</a>
            <a href="/Spring/index.php/Home/Shuoshuo/index_select">我要说说</a>
        </nav>
        <form action="#" method="post" id="search">
          <input type="search" class="sear" placeholder="搜索…" />
            <input type="submit" class="sub" value="" />
        </form>
    </div><!--/top-->
</header>


<div class="page_location link_bk">
当前位置：<a href="/Spring/index.php">首页</a>&nbsp;>>&nbsp;<?php if($c_id == ''): ?><a href="/Spring/index.php/Home/Student/centre">会员中心</a><?php else: ?><a href="/Spring/index.php/Home/Vip/comvip">会员中心</a><?php endif; ?>&nbsp;>>&nbsp;密码保护&nbsp;
</div>
<table width="985" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top:8px;" >
  <tr>
    <td width="173" valign="top" class="link_bk">
	<script src="/Spring/Public/home/templates/default/js/jquery.dialog.js" type='text/javascript' ></script>
<script type="text/javascript">
$(document).ready(function()
{
//
$(".left_menu_bg").click(function(){
		var tb=$(this).next();
		var tb_display=tb.css("display");
		if (tb_display=="block")
		{
		tb.css("display","none");
		$(this).find("img").attr("src","/Spring/Public/home/templates/default/images/06.gif");
		}
		else
		{
		tb.css("display","block");
		$(this).find("img").attr("src","/Spring/Public/home/templates/default/images/07.gif");
		}
	});
	
	$("input[type='text'],input[type='password']").focus(function(){
	$(this).css("border-color","#0066CC #9DCEFF #9DCEFF #0066CC");
	});
	$("input[type='text'],input[type='password']").blur(function(){
	$(this).css("border-color","");
	});

});
</script>
<?php if(session('c_id') == ''): ?><div class="left_menu_home"><a href="/Spring/index.php/Home/Student/centre" style="color:#990000">中心首页</a>
<a href="/Spring/index.php/Home/Student/read" style="color:#990000"  id="preview">个人信息</a>
</div>
<div id="previewbox" style="display:none">
<table width="100%" border="0" cellspacing="0" cellpadding="5">
<tr>
    <td bgcolor="#F3F7FC"><strong>简历名称</strong></td>
    <td width="130" align="center" bgcolor="#F3F7FC"><strong>刷新时间</strong></td>
    <td width="50" bgcolor="#F3F7FC"><strong>点击</strong></td>
  </tr>

 
  </table>
</div>

<div class="left_menu_box">
	<div class="left_menu_bg">
		<div class="left_menu_tit">简历管理</div>
		<div class="left_menu_img"><img src="/Spring/Public/home/templates/default/images/07.gif"  border="0" /></div>
		
	</div>
	<div class="left_menu_btop">
	<ul>
			<li><a href="/Spring/index.php/Home/Apply/addResume">创建新简历</a></li>
			<li><a href="/Spring/index.php/Home/Apply/resume">简历管理</a></li>
			
			
			<div class="clear"></div>
	  </ul>
	</div>
</div>
<div class="left_menu_box">
	<div class="left_menu_bg">
		<div class="left_menu_tit">就业服务<div class="hot"></div></div>
		<div class="left_menu_img"><img src="/Spring/Public/home/templates/default/images/07.gif"  border="0" /></div>
		<div class="clear"></div>
	</div>
	<div class="left_menu_btop">
	<ul>
			<li><a href="/Spring/index.php/Home/Return/serve">工作反馈</a></li>
			<li><a href="/Spring/index.php/Home/Return/huizhi">就业回执</a></li>
			<li><a href="/Spring/index.php/Home/Return/mianshi">面试历程</a></li>
			
			<div class="clear"></div>
	  </ul>
	</div>
</div>
<div class="left_menu_box">
	<div class="left_menu_bg">
		<div class="left_menu_tit">我要说说<div class="hot"></div></div>
		<div class="left_menu_img"><img src="/Spring/Public/home/templates/default/images/07.gif"  border="0" /></div>
		<div class="clear"></div>
	</div>
	<div class="left_menu_btop">
	<ul>
			<li><a href="/Spring/index.php/Home/Shuoshuo/shuoshuo">我要说说</a></li>
			<li><a href="/Spring/index.php/Home/Return/advice">意见建议</a></li>
			<div class="clear"></div>
	  </ul>
	</div>
</div>

<div class="left_menu_box">
	<div class="left_menu_bg">
		<div class="left_menu_tit">求职管理</div>
		<div class="left_menu_img"><img src="/Spring/Public/home/templates/default/images/07.gif"  border="0" /></div>
		<div class="clear"></div>
	</div>
	<div class="left_menu_btop">
	<ul>
			
			<li><a href="/Spring/index.php/Home/Job/job_list" target="_blank">搜索职位</a></li>
			<li><a href="/Spring/index.php/Home/Student/resume">已投简历</a></li>
			<!-- <li><a href="">职位收藏夹</a></li> -->
			<div class="clear"></div>
	  </ul>
	</div>
</div>
<div class="left_menu_box" style="border-bottom:1px;">
	<div class="left_menu_bg">
		<div class="left_menu_tit">账户管理</div>
		<div class="left_menu_img"><img src="/Spring/Public/home/templates/default/images/07.gif"  border="0" /></div>
		<div class="clear"></div>
	</div>
	<div class="left_menu_btop">
	<ul>
			<li><a href="/Spring/index.php/Home/Vip/protect">密码保护</a></li>
			<li><a href="/Spring/index.php/Home/Vip/update">密码修改</a></li>
 			<li><a href="/Spring/index.php/Home/Index/tc">安全退出</a></li>
		<div class="clear"></div>
	  </ul>
	</div>
</div>

<?php else: ?>
<div class="left_menu_home"><a href="/Spring/index.php/Home/Vip/comvip" style="color:#990000">中心首页</a>
<a href="/Spring/index.php/Home/Company/company" style="color:#990000" target="_blank">预览企业</a>
</div>
<div class="left_menu_box" id="info">
<div class="left_menu_bg">
	<div class="left_menu_tit">公司信息</div>
	<div class="left_menu_img"><img src="/Spring/Public/home/templates/default/images/07.gif"  border="0" /></div>
	<div class="clear"></div>
</div>
<div class="left_menu_btop">
		<ul>
		<li><a href="/Spring/index.php/Home/Company/com_info">基本信息</a></li>
	
		<li><a href="/Spring/index.php/Home/Company/logo">企业Logo</a></li>
	
		<div class="clear"></div>
		</ul>
</div>
</div>
<div class="left_menu_box" id="index">
	<div class="left_menu_bg">
		<div class="left_menu_tit">职位管理</div>
		<div class="left_menu_img"><img src="/Spring/Public/home/templates/default/images/07.gif"  border="0" /></div>
		<div class="clear"></div>
	</div>
	<div class="left_menu_btop">
	<ul>
			<li><a href="/Spring/index.php/Home/Company/recruit" >发布职位</a></li>
			<li><a href="/Spring/index.php/Home/Company/jobs">职位管理</a></li>	
			<div class="clear"></div>		
	  </ul>
	</div>
</div>


<div class="left_menu_box" id="recruitment">
<div class="left_menu_bg">
	<div class="left_menu_tit">招聘管理</div>
	<div class="left_menu_img"><img src="/Spring/Public/home/templates/default/images/07.gif"  border="0" /></div>
	<div class="clear"></div>
</div>
<div class="left_menu_btop">
<ul>
	
		<li><a href="/Spring/index.php/Home/Company/jian">简历管理</a></li>		
		<li><a href="/Spring/index.php/Home/Student/stu_list">招聘人才</a></li>		
		<div class="clear"></div>
	</ul>
</div>
</div>
<div class="left_menu_box" id="user" style="border-bottom:1px;">
	<div class="left_menu_bg">
		<div class="left_menu_tit">账户管理</div>
		<div class="left_menu_img"><img src="/Spring/Public/home/templates/default/images/07.gif"  border="0" /></div>
		<div class="clear"></div>
	</div>
	<div class="left_menu_btop">
		<ul>
		<li><a href="/Spring/index.php/Home/Return/advice">意见建议</a></li>
		<li><a href="/Spring/index.php/Home/Vip/protect">密码保护</a></li>
		<li><a href="/Spring/index.php/Home/Vip/update">密码修改</a></li>
		<li><a href="/Spring/index.php/Home/Index/tc">安全退出</a></li>
		<div class="clear"></div>
		</ul>
	</div>
</div><?php endif; ?>
</td>
    <td valign="top">
	<div class="user_right_box">
		<div class="user_right_top_tit_bg">		
		  <h1>密码保护</h1>
		</div>
	
      <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
	  <tr>
       <td width="142" height="28"  valign="top" style="padding-left:160px;"><font color="red">修改时，请设置为显示状态</font></td>

        </tr>
        <tr>
          <td height="22" valign="top">
		  <form id="Form1" name="Form1" method="post" action=""  >
		  <table width="100%" border="0" cellspacing="0" cellpadding="4" style="margin-top:20px;">
           <td width="142" height="28" align="right" valign="top"><strong  style="color:#FF0000">*</strong>密保问题：</td>
                <td>
                  <div>
                  <select name="an_qid"style="width:208px;height:24px;">
                    <option value="">请选择</option> 
                    <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["q_id"]); ?>" <?php if($list["an_qid"] == $vo["q_id"] ): ?>selected=selected<?php endif; ?>><?php echo ($vo["q_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                  </select>
                    </div>
               </td>
               </tr>
           		 <tr>
                    <td width="142" height="28" align="right" valign="top">答案：</td>
                    <td width="200px"><input name="an_content" type="password" class="input_text_200 date_input" id="answer1" value="<?php echo ($list["an_content"]); ?>" />
                    <input name="an_content1" type="text" class="input_text_200 date_input" id="answer2" value="<?php echo ($list["an_content"]); ?>" />
                     </td><td align="left"><input type="button" value="显示" id="hide"><input type="hidden" value="1" id="val"></td>
              </tr>
			<tr>
              <td width="100" height="23" align="right">&nbsp;</td>
              <td><div id="trade_txt" style="color: #006699; line-height:30px;"> 请您记好您选择问题对应的密码</div>
			    </td>
            </tr>
			<input type="hidden" name="id" value="<?php echo ($list["an_id"]); ?>">
           
			 <tr><td width="100" height="23" align="right">&nbsp;</td>
              <td height="60" align="left" >
			   			  <input type="submit" name="submit" id="submitsave" value="保存"  class="user_long_submit" style=""/>&nbsp;&nbsp;
			  			  </td>
            </tr>
		
			 </table>
			  </form>
			
	 
		  </td>
         
        </tr>
      </table>
         
		  </div>
    </td>
  </tr>
</table>

 
 <div class="footer-t-container">
                <div>
                <img  id="qr-code"  src="/Spring/Public/home/data/images/sdspringcode.png"  alt="二维码">
          		<div class="jyfw"><h3>教育是服务—用阳光的形象引领学生健康成长。</h3>
				<h4>Education is a service —— With the image of the sun lead healthy growth.</h4></div>                    
                </div>
            </div>
</body>
</html>