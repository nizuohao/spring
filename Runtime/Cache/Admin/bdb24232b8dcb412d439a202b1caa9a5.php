<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/Spring/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/Spring/Public/admin/js/jquery.js"></script>
<script type="text/javascript">
$(function(){	
	//顶部导航切换
	$(".nav li a").click(function(){
		$(".nav li a.selected").removeClass("selected")
		$(this).addClass("selected");
	})	
})	
</script>


</head>

<body style="background:url(/Spring/Public/admin/images//topbg.gif) repeat-x;">

    <div class="topleft">
    <a href="main.html" target="_parent"><img src="/Spring/Public/admin/images/logo.png" title="系统首页" /></a>
    </div>
        
   
    <div class="topright">    
    <ul>
    <li><span><img src="/Spring/Public/admin/images/help.png" title="帮助"  class="helpimg"/></span><a>帮助</a></li>
    <li><a >关于</a></li>
    <li><a href="/Spring/index.php/Admin/Index/loginOut" target="_parent">退出</a></li> 
    </ul>
     
    <div class="user">
    <span><?php echo ($_SESSION['user']); ?></span>
    <i>消息</i>
    <b><?php echo ($value["stu"]+$value["com"]+$value["rec"]+$value["info"]); ?></b>
    </div>    
    
    </div>

<div style="display:none"></div>
</body>
</html>