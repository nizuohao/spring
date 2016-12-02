<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>学生详细信息</title>
<link href="/Spring/Public/admin/css/style.css" rel="stylesheet"
	type="text/css" />
<script type="text/javascript" src="/Spring/Public/admin/js/jquery.js"></script><script type="text/javascript">function getGrade(){	//alert('gdsgeg');	var grade=$('select[name="s_gid"]').val();	$.post('/Spring/admin.php/Admin/Stu/getClass',{g:grade},	function(data)	{		//alert(data);		$("#class").html(data);	});	}</script>
</head>
<body>
<div class="place"><span>位置：</span>
<ul class="placeul">
	<li><a href=http://localhost/project/Admin.php/admin/index.html>首页</a></li>
	<li><a href="/Spring/admin.php/Admin/Stu/student">学生信息</a></li>
	<li><a href="#">详情</a></li>
</ul>
</div>
<div class="formbody">
<div class="formtitle"><span>基本信息</span></div>
<form action="" method="post" enctype="multipart/form-data">
<ul class="forminfo">
	<li><label>登陆账号：</label><input name="s_user" type="text"
		class="dfinput" value="<?php echo ($vole["s_user"]); ?>"  readonly="readonly"/></li>
	<li><label>登录密码：</label><input name="s_pwd" type="text"
		class="dfinput" value="<?php echo ($vole["s_pwd"]); ?>" /></li>
	<li><label>姓&nbsp;名：</label> <input name="s_name" type="text"
		class="dfinput" value="<?php echo ($vole["s_name"]); ?>" /></li>
	<li><label>性&nbsp;别：</label> <input name="s_sex" type="radio"
		value="1" <?php echo ($vole['s_sex']== 1?'checked':''); ?>/>男 <input name="s_sex"
		type="radio" value="2" <?php echo ($vole['s_sex']== 2?'checked':''); ?>/>女</li>
	<li><label>专&nbsp;业：</label> <input name="s_type" type="radio"
		value="1" <?php echo ($vole['s_type']== 1?'checked':''); ?>/>编程 
		<input name="s_type" type="radio" value="2" <?php echo ($vole['s_type']== 2?'checked':''); ?>/>美工</li>
	<li><label>出生日期：</label> <input name="s_birthday" type="date"
		class="dfinput" value="<?php echo ($vole["s_bir"]); ?>" /></li>
	<li><label>班&nbsp;级：</label> 	<select class="dfinput"	style="width: 172px" name='s_gid' id='grade' onchange="return getGrade()">
		<option value="" selected>------请选择------</option>
		<?php if(is_array($grade)): $i = 0; $__LIST__ = $grade;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["c_gid"]); ?>" <?php echo ($vole['s_gid']==$vo['c_gid']?'selected':''); ?>><?php echo ($vo["c_gid"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	</select> <select name="c_id" class="dfinput" style="width: 172px" id="class">
		<option value="">------请选择------</option>
		<?php if(is_array($grade)): $i = 0; $__LIST__ = $grade;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?><option value="<?php echo ($c["c_id"]); ?>" <?php echo ($vole['c_id']==$c['c_id']?'selected':''); ?>><?php echo ($c["c_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	</select></li>
	<li><label>身份证号：</label> <input name="s_card" type="text"
		class="dfinput" value="<?php echo ($vole["s_card"]); ?>" /></li>
	<li><label>家庭住址：</label> <input name="s_address" type="text"
		value="<?php echo ($vole["s_address"]); ?>" class="dfinput" /></li>
	<li><label>手机号：</label> <input name="s_tel" type="text"
		value="<?php echo ($vole["s_tel"]); ?>" class="dfinput" /></li>
			<li><label>邮箱：</label> <input name="s_email" type="text"
		class="dfinput" value="<?php echo ($vole["s_email"]); ?>"/></li>
	<li><label>期望城市：</label>
		<select name="ci_id" class="dfinput" >
			<option value="">----请选择----</option>
			<?php if(is_array($vole_city)): $i = 0; $__LIST__ = $vole_city;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["ci_id"]); ?>" <?php echo ($vole['ci_id']== $vo['ci_id']?'selected':''); ?>><?php echo ($vo["ci_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
		</select>
	</li>
	<li><label>头像</label> <img
		src="/Spring/Public/Uploads/StuHead/slt/s_<?php echo ($vole["s_head"]); ?>" /> <input
		name="oldName" type="hidden" value="<?php echo ($vole["s_head"]); ?>" /> <input
		name="id" type="hidden" value="<?php echo ($vole["s_id"]); ?>" /> <input name="s_head"
		type="file" /></li>
	<li><label>&nbsp;</label> <input id="but" type="button"
		class="btn" value="返回上一级" /> <input name="sub" type="submit"
		class="btn" value="修改" /></li>
</ul>
</form>
</div>

<script type="text/javascript">
$("#tar").css({height:"100px"});
$("#but").click(function(){
	window.history.go(-1);
});
$("#gr").change(function(){
	var g_id=$(this).val();
	$.get("/Spring/admin.php/Public/getClass",{c_gid:g_id},function(data){
		$("#cl").html(data);
	})
});
</script>
</body>
</html>