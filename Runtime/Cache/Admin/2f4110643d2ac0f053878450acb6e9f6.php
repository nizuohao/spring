<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/Spring/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Spring/Public/admin/js/jquery.js"></script>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    	<li><a href=http://localhost/project/Admin.php/admin/index.html>首页</a></li>
	    <li><a href="/Spring/index.php/Admin/Admin/Npc">管理员</a></li>
	    <li><a href="#">修改</a></li>
    </ul>
    </div>
    <div class="formbody">
    <div class="formtitle"><span>基本信息</span></div>
    <ul class="forminfo">
    <input type="hidden" name="ad_id" value="<?php echo ($vole["ad_id"]); ?>" />
    <li><label>登陆账号：</label><input 	name="ad_user" 	type="text" 	class="dfinput" value="<?php echo ($vole["ad_user"]); ?>" /></li>
    <li><label>登录密码：</label><input 	name="ad_pwd" 	type="text" 	class="dfinput" value="<?php echo ($vole["ad_pwd"]); ?>" /></li>
    <li><label>&nbsp;</label><input name="sub" type="submit" class="btn" value="确认修改"/></li>
    </ul>
    </div>
<div style="display:none"></script></div>
</form>
<script type="text/javascript">

</script>
</body>
</html>