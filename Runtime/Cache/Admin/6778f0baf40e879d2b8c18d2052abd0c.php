<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/Spring/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/Spring/Public/admin/js/jquery.js"></script>

<script type="text/javascript">
$(function(){	
	//导航切换
	$(".menuson li").click(function(){
		$(".menuson li.active").removeClass("active")
		$(this).addClass("active");
	});
	
	$('.title').click(function(){
		var $ul = $(this).next('ul');
		$('dd').find('ul').slideUp();
		if($ul.is(':visible')){
			$(this).next('ul').slideUp();
		}else{
			$(this).next('ul').slideDown();
		}
	});
})	
</script>


</head>

<body style="background:#f0f9fd;">
	<div class="lefttop"><span></span>通讯录</div>
    
    <dl class="leftmenu">
        
    <dd>
    <div class="title">
    <span><img src="/Spring/Public/admin/images/leftico01.png" /></span>学生信息
    </div>
    	<ul class="menuson">
        <li><cite></cite><a href="/Spring/index.php/Admin/Index/right" target="rightFrame" class="active">首页模版</a><i></i></li>
        <li ><cite></cite><a href="/Spring/index.php/Admin/Stu/read" target="rightFrame">学生列表</a><i></i></li>
      
        <li><cite></cite><a href="/Spring/index.php/Admin/Resume/read" target="rightFrame">简历管理</a><i></i></li>
        </ul>    
    </dd>
        
    
    <dd>
    <div class="title">
    <span><img src="/Spring/Public/admin/images/leftico02.png" /></span>企业信息
    </div>
    <ul class="menuson">
        <li><cite></cite><a href="/Spring/index.php/Admin/Com/comlist" target="rightFrame">企业列表</a><i></i></li>
        <li><cite></cite><a href="/Spring/index.php/Admin/Com/recruit/" target="rightFrame">企业招聘</a><i></i></li>
        
        </ul>     
    </dd> 
    
    
    <dd><div class="title"><span><img src="/Spring/Public/admin/images/leftico03.png" /></span>就业服务</div>
    <ul class="menuson">
      <li><cite></cite><a href="/Spring/index.php/Admin/Serve/serve" target="rightFrame">工作反馈</a><i></i></li>
        <li><cite></cite><a href="/Spring/index.php/Admin/Serve/hz" target="rightFrame">就业回执</a><i></i></li>
  
    </ul>    
    </dd>  
    
    
     
    <dd><div class="title"><span><img src="/Spring/Public/admin/images/leftico04.png" /></span>信息管理</div>
    <ul class="menuson">
           <li><cite></cite><a href="/Spring/index.php/Admin/Serve/advice" target="rightFrame">意见建议</a><i></i></li>
           <li><cite></cite><a href="/Spring/index.php/Admin/Info/info" target="rightFrame">信息处理</a><i></i></li>
           <li><cite></cite><a href="/Spring/index.php/Admin/StuInfo/stuInfo" target="rightFrame">学生信息发布</a><i></i></li>
           <li><cite></cite><a href="/Spring/index.php/Admin/Hezuo/index" target="rightFrame">合作单位</a><i></i></li>
    </ul>
    
    </dd> 
    <dd><div class="title"><span><img src="/Spring/Public/admin/images/leftico04.png" /></span>日常管理</div>
    <ul class="menuson">
         <li><cite></cite><a href="/Spring/index.php/Admin/Info/grade" target="rightFrame">年级管理</a><i></i></li>
         <li><cite></cite><a href="/Spring/index.php/Admin/Info/info_class" target="rightFrame">班级管理</a><i></i></li>
         <li><cite></cite><a href="/Spring/index.php/Admin/Info/city" target="rightFrame">地区管理</a><i></i></li>
         <li><cite></cite><a href="/Spring/index.php/Admin/Admin/Npc" target="rightFrame">管理员</a><i></i></li>    
    </ul>
    
    </dd>   
    </dl>
    
<div style="display:none"></div>
</body>
</html>