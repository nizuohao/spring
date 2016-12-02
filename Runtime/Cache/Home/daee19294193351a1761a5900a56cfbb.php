<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($arr["c_name"]); ?></title>

<link rel="stylesheet" type="text/css" href="/Spring/Public/home/templates/default/css/style.css" />
<meta http-equiv="X-UA-Compatible" content="IE=7">
<link rel="shortcut icon" href="/favicon.ico" />
<link href="/Spring/Public/home/templates/default/css/css.css" rel="stylesheet" type="text/css" />
<link href="/Spring/Public/home/templates/default/css/global.css" rel="stylesheet" type="text/css" />
<script src="/Spring/Public/home/templates/default/js/jquery.js" type='text/javascript' ></script>
<script src="/Spring/Public/home/templates/default/js/jquery.dialog.js" type='text/javascript' ></script>
<script type="text/javascript">
$(document).ready(function()
{
		var company_id="54810";
		var tsTimeStamp= new Date().getTime();
		$.get("/plus/ajax_contact.php", { "id": company_id,"time":tsTimeStamp,"act":"company_contact"},
			function (data,textStatus)
			 {			
				$("#company_contact").html(data);
			 }
		);
		$.get("/plus/ajax_click.php", { "id": company_id,"time":tsTimeStamp,"act":"company_click"},
			function (data,textStatus)
			 {			
				$(".click").html(data);
			 }
		);
		
	$("#newbuddy").click(function(){
	dialog("加为好友","url:get?/user/user_buddy.php?tuid=196114","350px","auto","");
	});
	$("#addpms").click(function(){
	var url="/user/user_pms.php?tuid=196114";
	dialog("发送短消息","url:get?"+url,"400px","auto","");
	});
});
</script>
</head>
<body>


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
当前位置：<a href="/Spring/index.php/Home">首页</a>&nbsp;>>&nbsp;<a href="/Spring/index.php/Home/Company/com_job/c_id/<?php echo ($arr["c_id"]); ?>">招聘信息</a>&nbsp;>>&nbsp;<?php echo ($arr["c_name"]); ?>
</div>
<div class="company-show-topnav">
  <div class="topcomname">
  <h1><?php echo ($arr["c_name"]); ?></h1>
    <div class="company_license1" title="营业执照已验证"></div>
				<div class="clear"></div>
  </div>
  <div class="snav">
		<a href="" class="selected">公司介绍</a>
		<a href="/Spring/index.php/Home/Company/com_job/c_id/<?php echo ($arr["c_id"]); ?>" >招聘职位</a>
		
		
		<div class="clear"></div>
  </div>
</div>
<div class="company-show" >
  <div class="left" >
    <div class="show link_lan" >
			
					
			 <div class="logo" style="position:absolute;left:450px;top:-85px;"> <?php if($arr["c_logo"] == ''): ?><img src="/Spring/Public/home/data/logo/no_logo.gif" border="0" /><?php else: ?><img src="/Spring/Public/Uploads/logo/<?php echo ($arr["c_logo"]); ?>" border="0" width="200px" /><?php endif; ?></div>
			 
		
			<div class="clear"></div>
			 <table width="100%" border="0" cellspacing="0" cellpadding="6" >
			  <tr>
				<td bgcolor="#F5FAFE" class="listtit">招聘职位</td>
				<td bgcolor="#F5FAFE" class="listtit">招聘人数</td>
				<td bgcolor="#F5FAFE" class="listtit">工作地区</td>
				<td align="center" bgcolor="#F5FAFE" class="listtit">添加日期</td>
				<td align="center" bgcolor="#F5FAFE" class="listtit">截至日期</td>
				<td width="100" align="center" bgcolor="#F5FAFE" class="listtit">投简历</td>
			  </tr>
			  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
				<td class="list">
				<a href="/Spring/index.php/Home/Company/jobshow/re_id/<?php echo ($vo["re_id"]); ?>" target="_blank"><?php echo ($vo["re_job"]); ?></a>
				<?php if($vo["re_jian"] == 1): ?><img src="/Spring/Public/home/templates/default/images/62.gif" border="0" align="absmiddle" /><?php endif; ?>

				</td>
				<td class="list"><?php echo ($vo["re_sum"]); ?>人</td>
				<td class="list"><?php echo ($vo["re_city"]); ?></td>

				<td align="center" class="list"><span style="color:#FF3300"><?php echo ($vo["re_time"]); ?></span></td>
				<td align="center" class="list"><?php echo ($vo["re_endtime"]); ?></td>
				<td align="center" class="list"><a <?php if($s_id != ''): ?>href="/Spring/index.php/Home/Company/jian/re_id/<?php echo ($vo["re_id"]); ?>/c_id/<?php echo ($arr["c_id"]); ?>"<?php endif; ?> ><img src="/Spring/Public/home/templates/default/images/53.gif" border="0"  class="app_jobs" id="40696" style="cursor:pointer"/></a> </td>
			  </tr><?php endforeach; endif; else: echo "" ;endif; ?>	
			  	
			  	  </table>
	  	         <div  style=" padding:10px; padding-right:20px;text-align:right;"><a href="/Spring/index.php/Home/Company/com_job/c_id/<?php echo ($arr["c_id"]); ?>">更多职位&gt;&gt;</a></div>
			 	         <div class="title"><strong>公司简介</strong></div>
			 <?php echo ($arr["c_intro"]); ?>
			 <div class="title"><strong>联系方式</strong></div>
			
			 <table>
			 	<tr><td>公司邮箱：</td><td> <?php echo ($arr["c_email"]); ?></td></tr>	
			 	<tr><td>公司网址：</td><td><?php echo ($arr["c_url"]); ?></td></tr>	
			 	
			 	<tr><td>联系人：</td><td><?php echo ($arr["c_telname"]); ?></td></tr>	
			 	<tr><td>联系电话：</td><td><?php echo ($arr["c_tel"]); ?></td></tr>	</table>	
			 <div class="title"><strong>公司位置</strong></div>
			 <table style="margin-bottom:120px">
			 	
			 	<tr><td>公司位置：</td><td><?php echo ($arr["c_address"]); ?></td></tr>	
			 </table>
			 			   
					</div>
  </div>
  <div class="right" >
		 
			 <div class="txtbox" >
				  <div class="tit">最新招聘的职位</div>	  
				  <?php if(is_array($job)): $i = 0; $__LIST__ = $job;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="txt1 link_lan">
					<strong><a href="/Spring/index.php/Home/Company/jobshow/re_id/<?php echo ($vo["re_id"]); ?>" target="_blank">月薪<?php echo ($vo["re_money"]); ?>招<?php echo ($vo["re_job"]); ?></a></strong><br />
					<a href="/Spring/index.php/Home/Company/company/c_id/<?php echo ($vo["c_id"]); ?>" target="_blank"><?php echo ($vo["c_name"]); ?></a><br />
					薪资待遇：<?php echo ($vo["re_money"]); ?><br />招聘人数：<?php echo ($vo["re_sum"]); ?>人<br />截止日期：<?php echo ($arr["re_endtime"]); ?>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
					
										
					
  </div>					
					
  </div>
  <div class="clear"></div>
</div>

 
 <div class="footer-t-container">
                <div>
                <img  id="qr-code"  src="/Spring/Public/home/data/images/sdspringcode.png"  alt="二维码">
          		<div class="jyfw"><h3>教育是服务—用阳光的形象引领学生健康成长。</h3>
				<h4>Education is a service —— With the image of the sun lead healthy growth.</h4></div>                    
                </div>
            </div>
</body>
</html>