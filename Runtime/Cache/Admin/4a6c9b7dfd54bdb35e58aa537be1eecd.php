<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>企业信息添加</title>
<link href="/Spring/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Spring/Public/admin/js/jquery.js"></script>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    	<li><a href=http://localhost/project/Admin.php/admin/index.html>首页</a></li>
	    <li><a href="#">企业信息</a></li>
	    <li><a href="#">修改</a></li>
    </ul>
    </div>
    <div class="formbody">
    <div class="formtitle"><span>基本信息</span></div>
    <ul class="forminfo">
	    <li height="30px"><label>企业名称：</label><input 	name="c_name" 	type="text" 	class="dfinput" value="<?php echo ($role["c_name"]); ?>" /></li>
	    <li height="30px"><label>企业地址：</label><input 	name="c_address" 	type="text" 	class="dfinput" value="<?php echo ($role["c_address"]); ?>" /></li>
	    <li height="30px">企业规模：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	    	<input 	name="c_size" 	type="radio"  value="3" <?php echo ($role['c_size']=='3'?'checked':''); ?> />大型&nbsp;&nbsp;
	    	<input 	name="c_size" 	type="radio"  value="2" <?php echo ($role['c_size']=='2'?'checked':''); ?> />中型&nbsp;&nbsp;
	    	<input 	name="c_size" 	type="radio"  value="1" <?php echo ($role['c_size']=='1'?'checked':''); ?> />小型
	    </li>
	    <li><label>联系邮箱：</label><input 	name="c_tel" 	type="text" 	class="dfinput" value="<?php echo ($role["c_email"]); ?>" /></li>
	    <li><label>联系人：</label><input 	name="c_tel" 	type="text" 	class="dfinput" value="<?php echo ($role["c_telname"]); ?>" /></li>
	    <li><label>联系电话：</label><input 	name="c_tel" 	type="text" 	class="dfinput" value="<?php echo ($role["c_tel"]); ?>" /></li>
	    <li><label>联系QQ：</label><input 	name="c_qq" 	type="text" 	class="dfinput" value="<?php echo ($role["c_qq"]); ?>" /></li>
	    
	    <li><label>企业简介：</label>
	    	<textarea name="c_intro" class="dfinput" id="tar" cols="55" ><?php echo ($role["c_intro"]); ?></textarea>
	    </li>
	    
	   <li>审核状态：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	    	<input 	name="c_state" 	type="radio"  value="1" <?php echo ($role['c_state']=='1'?'checked':''); ?> />通过&nbsp;&nbsp;
	    	<input 	name="c_state" 	type="radio"  value="2" <?php echo ($role['c_state']=='2'?'checked':''); ?> />不通过
	    	
	    </li>
	    <?php if( $role["c_photo"] != ''): ?><li><label>反馈照片：</label><img src="/Spring/Public/Uploads/logo/<?php echo ($role["c_photo"]); ?>" width="200px" height="200px"></li><?php endif; ?>
	    <li><label>&nbsp;</label>
	    	<input name="c_id" type="hidden" value="<?php echo ($role["c_id"]); ?>"/>
	    	<input name="sub" type="submit" class="btn" value="确认修改"/>
	    </li>
    </ul>
    </div>

</form>
<script type="text/javascript">
$("#tar").css({height:"100px"});
</script>
</body>
</html>