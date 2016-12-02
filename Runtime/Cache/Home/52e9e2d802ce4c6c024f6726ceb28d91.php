<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>管理简历 - 个人会员中心 </title>

<script src="/Spring/Public/home/templates/default/js/jquery.js" type='text/javascript' language="javascript"></script>
<script src="/Spring/Public/home/templates/default/js/jquery.idTabs.min.js" type='text/javascript' language="javascript"></script>
<script src="/Spring/Public/home/templates/default/js/jquery.validate.min.js" type='text/javascript' language="javascript"></script>
<script src="/Spring/Public/home/templates/default/js/jquery.user.selectlayer.js" type='text/javascript' language="javascript"></script>
<script src="/Spring/Public/home/templates/default/js/jquery.vtip-min.js" type='text/javascript' language="javascript"></script>
<script src="/Spring/Public/home/data/cache_classify.js" type="text/javascript" charset="utf-8"></script>
<link href="/Spring/Public/home/templates/default/css/user.css"
	rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css"
	href="/Spring/Public/home/templates/default/css/style.css" />
<link rel="stylesheet" type="text/css"
	href="/Spring/Public/home/data/css/style.css" />
<script type="text/javascript"
	src="/Spring/Public/home/js/jquery-1.8.1.js"></script>
<script type="text/javascript" src="/Spring/Public/home/js/index.js"></script>
<!-- 头部文件 -->

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


<!-- end -->
<div class="page_location link_bk">当前位置：<a href="/Spring/index.php">首页</a>&nbsp;>>&nbsp;<a
	href="/Spring/index.php/Student/centre">用户中心</a>&nbsp;>>&nbsp;管理简历</div>
<table width="985" border="0" align="center" cellpadding="0"
	cellspacing="0" style="margin-top: 8px; margin-left: 175px">
	<tr>
		<td width="173" valign="top" class="link_bk"><script
			src="/Spring/Public/home/templates/default/js/jquery.dialog.js"
			type='text/javascript'></script> <!-- 左侧栏目 --> 
<div class="left_menu_home"><a href="/Spring/index.php/Home/Student/centre" style="color:#990000">中心首页</a>
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
 <!-- end -->
		<td valign="top">
		<div class="user_right_box">
		<div class="user_right_top_tit_bg">
		<h1>简历管理</h1>
		</div>
		<form id="Form1" name="Form1" method="post" action="?act=addjobs_save">
		<input name="addrand" type="hidden" id="addrand" value="2631" />
		<table width="100%" border="0" cellpadding="4" cellspacing="0"
			style="margin-top: 8px;" class="cen">
			<tr>
				<th>编号</th>
				<th>期望职位</th>
				<th>期望薪资</th>
				<th>期望城市</th>
				<th>工作经验</th>
				<th>自我介绍</th>
				<th>关键字</th>
				<th>手机号</th>
				<th>填写时间</th>
				<th>操作</th>
			</tr>
			<?php if(is_array($value)): $i = 0; $__LIST__ = $value;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr >
				<td align="center"><?php echo ($i); ?></td>
				<td align="center"><?php echo ($vo["re_job"]); ?></td>
				<td align="center"><?php echo ($vo["re_money"]); ?></td>
				<td align="center"><?php echo ($vo["re_city"]); ?></td>
				<td align="center"><?php echo ($vo["re_scale"]); ?>年</td>
				<td align="left"><?php echo (mb_substr($vo["re_text"],0,30,utf8)); ?>...</td>
				<td align="center"><?php echo ($vo["re_keyword"]); ?></td>
				<td align="center"><?php echo ($vo["re_tel"]); ?></td>
				<td align="center"><?php echo (date("Y-m-d H:i:s",$vo["re_time"])); ?></td>
				<td align="center"><a
					href="/Spring/index.php/Home/Apply/readResume/re_id/<?php echo ($vo["re_id"]); ?>">查看</a> | <a
					href="/Spring/index.php/Home/Apply/addResume/re_id/<?php echo ($vo["re_id"]); ?>">修改</a> | <a
					href="/Spring/index.php/Home/Apply/delResume/re_id/<?php echo ($vo["re_id"]); ?>">删除</a></td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			<tr>
				<td colspan="7" align="center"><?php echo ($page); ?></td>
			</tr>
		</table>
		</div>
		</form>
		</div>
		</td>
	</tr>
</table>
<!-- 底部文件 -->

 
 <div class="footer-t-container">
                <div>
                <img  id="qr-code"  src="/Spring/Public/home/data/images/sdspringcode.png"  alt="二维码">
          		<div class="jyfw"><h3>教育是服务—用阳光的形象引领学生健康成长。</h3>
				<h4>Education is a service —— With the image of the sun lead healthy growth.</h4></div>                    
                </div>
            </div>
<!-- end -->