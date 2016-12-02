<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>企业信息修改</title>
<link href="/Spring/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Spring/Public/admin/js/jquery.js"></script>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    	<li><a href=http://localhost/project/Admin.php/admin/index.html>首页</a></li>
	    <li><a href="#">招聘信息</a></li>
	    <li><a href="#">修改</a></li>
    </ul>
    </div>
    <div class="formbody">
    <div class="formtitle"><span>基本信息</span></div>
    <ul class="forminfo">
	    <li height="30px"><label>招聘职位：</label><input 	name="re_name" 	type="text" 	class="dfinput" value="<?php echo ($role["re_job"]); ?>" /></li>
	     
	    <li height="30px"><label>招聘人数：</label><input 	name="re_sum" 	type="text" 	class="dfinput" value="<?php echo ($role["re_sum"]); ?>" /></li>
	    <li height="30px"><label>关键字</label><input 	name="re_keyword" 	type="text" 	class="dfinput" value="<?php echo ($role["re_keyword"]); ?>" /></li>
	    <li><label>截止日期：</label><input 	name="re_endtime" 	type="text" 	class="dfinput" value="<?php echo ($role["re_endtime"]); ?>" /></li>
	    <li><label>工作地区：</label><input 	name="re_city" 	type="text" 	class="dfinput" value="<?php echo ($role["re_city"]); ?>" /></li>
	    <li><label>工资范围：</label><input 	name="re_money" 	type="text" 	class="dfinput" value="<?php echo ($role["re_money"]); ?>" /></li>
	    <li><label>联系电话：</label><input 	name="re_tel" 	type="text" 	class="dfinput" value="<?php echo ($role["re_tel"]); ?>" /></li>
	   
	    <li><label>职位简介：</label>
	    	<textarea name="re_intro" class="dfinput" id="tar" cols="55" ><?php echo ($role["re_intro"]); ?></textarea>
	    </li>
	    <?php if($role["re_state"] == '0'): ?><li>审核状态：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	    	<input 	name="re_state" 	type="radio"  value="1" <?php echo ($role['re_state']=='1'?'checked':''); ?> />通过&nbsp;&nbsp;
	    	<input 	name="re_state" 	type="radio"  value="2" <?php echo ($role['re_state']=='2'?'checked':''); ?> />不通过
	    	
	    </li><?php endif; ?>
	    <li><label>&nbsp;</label>
	    	<input name="re_id" type="hidden" value="<?php echo ($role["re_id"]); ?>"/>
	    	<input name="sub" type="submit" class="btn" value="确认修改"/>
	    </li>
    </ul>
    </div>
<div style="display:none"></div>
</form>
<script type="text/javascript">
$("#tar").css({height:"100px"});
</script>
</body>
</html>