<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/Spring/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Spring/Public/admin/js/jquery.js"></script>
</head>
<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="/Spring/index.php/Admin/Index/right.html">首页</a></li>
    </ul>
    </div>
    
    <div class="mainindex">
    <div class="welinfo">
    <span><img src="/Spring/Public/admin/images/sun.png" alt="天气" /></span>
    <b><span style="color:blue">&nbsp;&nbsp;<?php echo ($_SESSION['user']); ?></span>您好，欢迎使用就业信息管理系统</b>(admin@uimaker.com)
    </div>
    
    <div class="welinfo">
    <span><img src="/Spring/Public/admin/images/time.png" alt="时间" /></span>
    <i>您上次登录的时间：<?php echo ($_SESSION['time']); ?></i>
    </div>
    </div>
    <div class="xline"></div>
    
    <div class="mainindex">未读消息：
    <div class="welinfo">
    <a href="/Spring/index.php/Admin/Stu/read"><span>学生注册申请<b><?php echo ($value['stu']); ?></b>&nbsp;|&nbsp;&nbsp;</span></a>
    <a href="/Spring/index.php/Admin/Com/comlist"> <span>企业注册申请<b><?php echo ($value['com']); ?></b>&nbsp;|&nbsp;&nbsp;</span></a>
	<a href="/Spring/index.php/Admin/Com/recruit"><span>职位发布申请<b><?php echo ($value['rec']); ?></b>&nbsp;|&nbsp;&nbsp;</span></a>
    <a href="/Spring/index.php/Admin/StuInfo/stuInfo"> <span>信息发布申请<b><?php echo ($value['info']); ?></b>&nbsp;&nbsp;&nbsp;</span></a>
    </div>
    <div class="xline"></div>
    
</body>
</html>