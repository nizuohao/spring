<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>欢迎登录后台管理系统</title>
<link href="/AProduct/Spring/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/AProduct/Spring/Public/admin/js/jquery.js"></script>
<script src="/AProduct/Spring/Public/admin/js/cloud.js" type="text/javascript"></script>
<script language="javascript">
	$(function(){
    $('.loginbox').css({'position':'absolute','left':($(window).width()-692)/2});
	$(window).resize(function(){
    $('.loginbox').css({'position':'absolute','left':($(window).width()-692)/2});
    })  
}); 
	
</script> 

</head>
<body style="background-color:#1c77ac; background-image:url(images/light.png); background-repeat:no-repeat; background-position:center top; overflow:hidden;">
<form action="" method="post" name="Form1" id="Form1">
<div id="mainBody">
  <div id="cloud1" class="cloud"></div>
  <div id="cloud2" class="cloud"></div>
</div>  
<div class="logintop">    
    <span>欢迎登录后台管理界面平台</span>    
</div>
<div class="loginbody">    
    <span class="systemlogo"></span> 
    <div class="loginbox">
    <ul>
    <li><input name="user" type="text" class="loginuser" value=""  onclick="JavaScript:this.value=''"/></li>
    <li><input name="pwd" type="password" class="loginpwd"   onclick="JavaScript:this.value=''"/></li>    <!--<li><input name="user" type="text" class="loginuser" value=""  onclick="JavaScript:this.value=''"/><?php echo ($v); ?></li>

    --><li style="position:relative;top:10px"><input name="sub" type="submit" class="loginbtn" value="登录" onclick="return yz()" /><label></label></li>
    </ul>
    </div>
</div>
</form>
	
</body>
<script language="javascript">
	$("ul li").css({margin:"8px",padding:"0"});
	$(".loginyzm").css({width:"100px",height:"40px",border:"1px solid #BAC7D2",margin:"0px 5px",background:"#ECF5FA"});

	function yz(){
		if($(".loginuser").val()==''||$(".loginpwd").val()=='')
		{
			alert('用户名或密码不能为空');
			return false;
		}
	}
	
</script>
</html>