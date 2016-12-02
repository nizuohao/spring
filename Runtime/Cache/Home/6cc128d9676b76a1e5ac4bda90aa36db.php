<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>学生就业服务_软件工程系</title>
<script src="/Spring/Public/home/templates/default/js/jquery.js" type='text/javascript' language="javascript"></script>
<script src="/Spring/Public/home/templates/default/js/jquery.idTabs.min.js" type='text/javascript' language="javascript"></script>
<script src="/Spring/Public/home/templates/default/js/jquery.validate.min.js" type='text/javascript' language="javascript"></script>
<script src="/Spring/Public/home/templates/default/js/jquery.user.selectlayer.js" type='text/javascript' language="javascript"></script>
<script src="/Spring/Public/home/templates/default/js/jquery.vtip-min.js" type='text/javascript' language="javascript"></script>
<script src="/Spring/Public/home/data/cache_classify.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" type="text/css"
	href="/Spring/Public/home/templates/default/css/user.css" />
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
<div class="page_location link_bk">当前位置：<a
	href="">首页</a>&nbsp;&gt;&gt;&nbsp;<a
	href="">用户中心</a></div>
<table width="985" border="0" align="center" cellpadding="0"
	cellspacing="0" style="margin-top: 8px; margin-left: 175px">
	<tr>
		<td width="173" valign="top" class="link_bk"><script
			src="/Spring/Public/home/templates/default/js/jquery.dialog.js"
			type='text/javascript'></script>
			<!-- 左侧栏目 --> 
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
		<td valign="top" class="link_lan">
		<div class="com_user_box">
		<div class="titbox">
		<div class="lefttit"><u>欢迎：<?php echo ($vole['s_name']); ?></u><!-- (uid:{<?php echo ($vole['s_id']); ?>})&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; --><a
			href="/Spring/index.php/Home/Student/read">个人资料</a></div>
		<div class="rightip">上次登录时间：<?php echo ($time); ?>&nbsp;&nbsp;&nbsp;</div>
		<div class="clear"></div>
		</div>
		<table width="98%" border="0" align="center" cellpadding="0"
			cellspacing="5">
			<tbody>
				<tr>
					<td width="120">
					<table border="0" cellpadding="0" cellspacing="1" bgcolor="#CDE6F3"
						style="margin: 3px; padding: 3px;">
						<tbody>
							<tr>
								<td bgcolor="#FFFFFF">
								<div style="position: relative" id="show_avatars_url"><a
									href="/Spring/index.php/Home/Student/head">
									<?php if($vole["s_head"] == ''): ?><img src="/Spring/Public/Uploads/no_photo.gif"
									border="0" width="100" height="100"><?php else: ?><img src="/Spring/Public/Uploads/StuHead/<?php echo ($vole["s_head"]); ?>"
									border="0" width="100" height="100"><?php endif; ?>
								</a>
								<div class="avatars_edit">修改头像</div>
								</div>
								</td>
							</tr>
						</tbody>
					</table>
					</td>
					<td valign="top">
					<table width="100%" border="0" cellspacing="0" cellpadding="0"
						style="color: #666666">
						<tbody>
							<tr>
								<td style="padding-top: 12px;">姓名：<?php echo ($vole["s_name"]); ?></td>
							</tr>
							<tr>
								<td style="padding-top: 12px;">性别：<?php if($vole["s_sex"] == 1): ?>男<?php else: ?>女<?php endif; ?></td>
							</tr>
							<tr>
								<td style="padding-top: 12px;">专业：<?php if($vole["s_type"] == 1): ?>编程<?php else: ?>美工<?php endif; ?></td>
							</tr>
						</tbody>
					</table>
					</td>
					<td width="150" valign="top">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tbody>
							<tr>
								<td style="padding-top: 15px;"><a
									href="/Spring/index.php/Home/Apply/addResume"><img
									src="/Spring/Public/home/templates/default/images/83.gif"
									alt="创建简历" border="0"></a></td>
							</tr>
							<tr>
								<td style="padding-top: 15px;"><a
									href="/Spring/index.php/Home/Apply/resume"><img
									src="/Spring/Public/home/templates/default/images/82.gif"
									alt="管理简历" border="0"></a></td>
							</tr>
						</tbody>
					</table>
					</td>
				</tr>
			</tbody>
		</table>
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