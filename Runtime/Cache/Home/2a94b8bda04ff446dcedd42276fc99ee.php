<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>学生就业服务_软件工程系</title>
<link rel="stylesheet" type="text/css" href="/AProduct/Spring/Public/home/templates/default/css/style.css" />
<script type="text/javascript" src="/AProduct/Spring/Public/home/templates/default/js/jquery-1.8.1.js"></script>
<script type="text/javascript" src="/AProduct/Spring/Public/home/templates/default/js/index.js"></script>
<script type="text/javascript">
	document.createElement("header");
	document.createElement("section");
	document.createElement("footer");
	document.createElement("time");
</script>
<style type="text/css">
.vip{font-size: 18px;padding: 10px 30px;font-weight: 300;}
.xin{text-align:center;display: block;float:left;width:100px;line-height:40px;background-color: #10646F;margin-right:30px;color: white;margin-top:10px;}
</style>
</head>
<body>
<header>
	<div id="top">
    	<h1 class="logo"><a href="#"><img src="/AProduct/Spring/Public/home/data/images/logo.png" width="193" height="45" /></a></h1>
        <nav class="list">
        	<a href="/AProduct/Spring/index.php" class="selected">首页</a>
            <a href="/AProduct/Spring/index.php/Home/News/info_select">就业快讯</a>
            <a href="/AProduct/Spring/index.php/Home/Return/huizhi">入职信息</a>
            <a href="/AProduct/Spring/index.php/Home/Return/serve">就业跟踪</a>
          <a href="/AProduct/Spring/index.php/Home/Shuoshuo/index_select">我要说说</a>
        </nav>
        <form action="#" method="post" id="search">
        	<input type="search" class="sear" placeholder="搜索…" />
            <input type="submit" class="sub" value="" />
        </form>
    </div><!--/top-->
</header>
<div id="notice">
	<marquee scrollamount="3" scrolldelay="20" direction="left" width="1000" height="30" class="public"
    onMouseOver="stop()" onMouseOut="start()"><?php if(is_array($info5)): $i = 0; $__LIST__ = $info5;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$info5): $mod = ($i % 2 );++$i;?><a href="/AProduct/Spring/index.php/Home/News/info/id/<?php echo ($info5["i_id"]); ?>">标题：<?php echo ($info5["i_title"]); ?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?></marquee>
</div><!--/notice-->
<div id="box">
    <div id="banner">
         <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl class="ban"><dt><a href="/AProduct/Spring/index.php/Home/News/info/id/<?php echo ($vo["i_id"]); ?>"><img src="/AProduct/Spring/Public/Uploads/Info/<?php echo ($vo["i_photo"]); ?>" width="738" height="247" /></a></dt>
                <dd><a href="/AProduct/Spring/index.php/Home/News/info/id/<?php echo ($vo["i_id"]); ?>"><?php echo ($vo["i_title"]); ?></a></dd>
            </dl><?php endforeach; endif; else: echo "" ;endif; ?>
        <p></p>
    </div><!--/banner-->

    <div id="login">
    <?php if($session != ''): ?><div style="border-bottom:1px #C4DBE9 solid;height:120px;background-color:#F4F7F9;">
		<div style="" class="vip">会员信息</div>
		<div class="">
			<a class="xin" style="margin-left:30px;" <?php if(session('s_id') == ''): ?>href="/AProduct/Spring/index.php/Home/Vip/comvip" <?php else: ?> href="/AProduct/Spring/index.php/Home/Student/centre"<?php endif; ?>>会员中心</a>
			<a href="/AProduct/Spring/index.php/Home/Vip/protect" class="xin" >密码保护</a>
	   </div>
   </div>
<div class="user-info shadow">
  <ul>																<!-- 更改过 -->
    <li class="col-b" style="font-size:13px;margin-top:15px;margin-left:20px;">欢迎你：<a <?php if(session('s_id') == ''): ?>href="/AProduct/Spring/index.php/Home/Vip/comvip" <?php else: ?> href="/AProduct/Spring/index.php/Home/Student/centre"<?php endif; ?> style="color:#057BD4;"><?php echo ($name); ?></a>&nbsp;|&nbsp;<?php if(session('s_id') == ''): ?><a href="/AProduct/Spring/index.php/Home/Company/jobs" style="color:#333;">管理职位</a> <?php else: ?> <a href="/AProduct/Spring/index.php/Home/Apply/resume" style="color:#333;">管理简历</a><?php endif; ?>&nbsp;|&nbsp;<a href="/AProduct/Spring/index.php/Home/Index/tc" style="color:#333;">退出登录</a></li>
    <li class="sli1" style="margin-top:15px;margin-left:20px;color:#666;font-size:13px;"><span>会员类型：</span><?php if(session('s_id') == ''): ?><span>企业会员</span> <?php else: ?> <span>个人会员</span><?php endif; ?>
    <li style="margin-top:15px;margin-left:20px;color:#666;font-size:13px;">登录时间：<?php echo session("time");?></li>
  </ul>
</div>

<?php else: ?>
    	<p class="tit"><span>个人登录</span><span class="currs">企业登录</span></p>
        <form action="/AProduct/Spring/index.php/Home/Index/login" method="post" class="log">
			<input type="hidden" name="hide" value="1" >
        	<p class="case"><label>用户名：</label><input type="text" class="name" name="username"/></p>
            <p class="case"><label>密&nbsp;码：</label><input type="password" class="pwd" name="userpwd"/></p>
            <div id="logins"><p><input type="submit" value="登录"  name="submit" class="subm" /><input type="reset" value="重置" class="reset" /></p>
        	<p class="secret"><a href="/AProduct/Spring/index.php/Home/Reg/info">忘记密码？</a></p></div>
        </form>
        <form action="/AProduct/Spring/index.php/Home/Index/login" method="post" class="log">
			<input type="hidden" name="hide" value="2" >
        	<p class="case"><label>用户名：</label><input type="text" class="name" name="username" /></p>
            <p class="case"><label>密&nbsp;码：</label><input type="password" class="pwd" name="userpwd"/></p>
            <div id="logins"><p><input type="submit" value="登录" class="subm" name="submit" /><input type="reset" value="重置" class="reset" /></p>
        	<p class="secret"><a href="/AProduct/Spring/index.php/Home/Reg/info">忘记密码？</a></p></div>
        </form>
        <p class="accoun">没有账号？点此进行<a href="/AProduct/Spring/index.php/Home/Reg/stu_reg"> 个人注册 </a>或<a href="/AProduct/Spring/index.php/Home/Reg/com_reg"> 企业注册 </a></p><?php endif; ?>
    </div><!--/login-->
    <section id="news">
    	<h1 class="title">
        	<span>就业快讯</span><a href="/AProduct/Spring/index.php/Home/News/info_select">更多>></a>
        </h1>
        <div class="press">
        	<p class="tab"><span>部门快讯</span><span>毕业生快讯</span><span>行业快讯</span></p>
            <ul class="admin">
            	<?php if(is_array($info2)): $i = 0; $__LIST__ = $info2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$info2): $mod = ($i % 2 );++$i;?><li><a href="/AProduct/Spring/index.php/Home/News/info/id/<?php echo ($info2["i_id"]); ?>"><span><?php echo ($info2["i_title"]); ?></span><time><?php echo (date("Y-m-d",$info2["i_time"])); ?></time></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul><!--/admin-->
            <ul class="admin">
            	<?php if(is_array($info3)): $i = 0; $__LIST__ = $info3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$info3): $mod = ($i % 2 );++$i;?><li><a href="/AProduct/Spring/index.php/Home/News/info/id/<?php echo ($info3["i_id"]); ?>"><span><?php echo ($info3["i_title"]); ?></span><time><?php echo (date("Y-m-d",$info3["i_time"])); ?></time></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul><!--/admin-->
            <ul class="admin">
            	<?php if(is_array($info4)): $i = 0; $__LIST__ = $info4;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$info4): $mod = ($i % 2 );++$i;?><li><a href="/AProduct/Spring/index.php/Home/News/info/id/<?php echo ($info4["i_id"]); ?>"><span><?php echo ($info4["i_title"]); ?></span><time><?php echo (date("Y-m-d",$info4["i_time"])); ?></time></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul><!--/admin-->
        </div><!--/press-->
    </section><!--/news-->
    <section id="job">
    	<h1 class="title">
        	<span>企业招聘</span><a href="/AProduct/Spring/index.php/Home/Job/job_list">更多>></a>
        </h1>
        <ul class="bring">
        <?php if(is_array($joblist)): $i = 0; $__LIST__ = $joblist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>·<a href="/AProduct/Spring/index.php/Home/Company/company/c_id/<?php echo ($vo["c_id"]); ?>"><?php  $s=mb_substr($vo["c_name"],0,15)."..."; echo $s; ?></a><?php if(is_array($vo["job"])): $i = 0; $__LIST__ = array_slice($vo["job"],0,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$job): $mod = ($i % 2 );++$i;?><a href="/AProduct/Spring/index.php/Home/Company/jobshow/re_id/<?php echo ($job["re_id"]); ?>"><?php echo ($job["re_job"]); ?></a>|<?php endforeach; endif; else: echo "" ;endif; ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul><!--/bring-->
    </section><!--/job-->
    <section class="company">
    	<h1 class="caption">
        	<span>推荐企业专区</span><a href="/AProduct/Spring/index.php/Home/Job/job_jian">更多>></a>
        </h1>
        <?php if(is_array($jian)): $i = 0; $__LIST__ = $jian;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl class="firm">
          	<dt><a href="/AProduct/Spring/index.php/Home/Company/company/c_id/<?php echo ($vo["c_id"]); ?>"><?php  $s=mb_substr($vo["c_name"],0,48)."..."; echo $s; ?></a> <img src="/AProduct/Spring/Public/home/templates/default/images/ico4.png" width="13" height="13" /></dt>
          	<dd><span>聘</span><?php if(is_array($vo["job"])): $i = 0; $__LIST__ = array_slice($vo["job"],0,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$job): $mod = ($i % 2 );++$i;?><a href="/AProduct/Spring/index.php/Home/Company/jobshow/re_id/<?php echo ($job["re_id"]); ?>"><?php echo ($job["re_job"]); ?></a>-<a  href="/AProduct/Spring/index.php/Home/Company/jobshow/re_id/<?php echo ($job["re_id"]); ?>" class="money"><?php echo ($job["re_money"]); ?></a></span></a>|<?php endforeach; endif; else: echo "" ;endif; ?></dd>
        </dl><?php endforeach; endif; else: echo "" ;endif; ?>
    </section><!--/company-->
    <section class="company">
    	<h1 class="captions">
        	<span>合作单位</span><a href="/AProduct/Spring/index.php/Home/Index/hezuo">更多>></a>
        </h1>
         <?php if(is_array($hezuo)): $i = 0; $__LIST__ = $hezuo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hz): $mod = ($i % 2 );++$i;?><dl class="join">
                <dt><a href="<?php echo ($hz["hz_url"]); ?>" target="_blank"><img src="/AProduct/Spring/Public/Uploads/Hezuo/<?php echo ($hz["hz_logo"]); ?>" width="147" height="40" /></a></dt>
                <dd><a href="<?php echo ($hz["hz_url"]); ?>" target="_blank"><?php echo ($hz["hz_name"]); ?></a></dd>
            </dl><?php endforeach; endif; else: echo "" ;endif; ?>
    </section><!--/company-->
</div><!--/box--> 

 
 <div class="footer-t-container">
                <div>
                <img  id="qr-code"  src="/AProduct/Spring/Public/home/data/images/sdspringcode.png"  alt="二维码">
          		<div class="jyfw"><h3>教育是服务—用阳光的形象引领学生健康成长。</h3>
				<h4>Education is a service —— With the image of the sun lead healthy growth.</h4></div>                    
                </div>
            </div>
</body>
</html>