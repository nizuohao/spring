<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
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
<form action="" method="post" enctype="multipart/form-data">
<div class="formbody">
<div class="formtitle"><span>基本信息</span></div>
<ul class="forminfo">
	<li><label>姓&nbsp;名：</label> <input name="s_name" type="text"
		class="dfinput" /></li>
	<li><label>性&nbsp;别：</label>
		<input name="s_sex" type="radio" value="1" checked/>男
		<input name="s_sex" type="radio" value="2"/>女
	</li>
	<li><label>专&nbsp;业：</label>
		<input name="s_type" type="radio" value="1" checked/>编程
		<input name="s_type" type="radio" value="2"/>美工
	</li>
	<li><label>出生日期：</label>
		<input name="s_bir" type="date" class="dfinput"/></li>
	<li><label>年级： </label>	<!--<select  name='s_gid' id='grade' onchange="return getGrade()">						<option value=''>--请选择--</option>						<?php if(is_array($grade)): $i = 0; $__LIST__ = $grade;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value='<?php echo ($val["c_gid"]); ?>'> <?php echo ($val["c_gid"]); ?> </option><?php endforeach; endif; else: echo "" ;endif; ?></select>												<span id='class'>  </span>						-->		<select class="dfinput"	style="width: 172px"  name='s_gid' id='grade' onchange="return getGrade()">		<option value="" selected>------请选择------</option>		<?php if(is_array($grade)): $i = 0; $__LIST__ = $grade;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value='<?php echo ($val["c_gid"]); ?>'> <?php echo ($val["c_gid"]); ?> </option><?php endforeach; endif; else: echo "" ;endif; ?>	</select> <select name="c_id" class="dfinput" style="width: 172px" id='class'>		<option value="">------请选择------</option>		<!--<?php if(is_array($vole_c)): $i = 0; $__LIST__ = $vole_c;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?><option value="<?php echo ($c["c_id"]); ?>" <?php echo ($vole['c_id']==$c['c_id']?'selected':''); ?>><?php echo ($c["c_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>	--></select>	</li>
	<li><label>身份证号：</label> <input name="s_card" type="text"
		class="dfinput"/></li>
	<li><label>家庭住址：</label> <input name="s_address" type="text"
		class="dfinput"/></li>
	<li><label>手机号：</label> <input name="s_tel" type="text"
		class="dfinput"/></li>
		<li><label>邮箱：</label> <input name="s_email" type="text"
		class="dfinput"/></li>
	<li><label>期望城市：</label>
		<select name="ci_id" class="dfinput" >
			<option value="">----请选择----</option>
			<?php if(is_array($vole_city)): $i = 0; $__LIST__ = $vole_city;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["ci_id"]); ?>"><?php echo ($vo["ci_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
		</select>
	</li>
	<li><label>登陆账号：</label><input name="s_user" type="text"
		class="dfinput"/></li>
	<li><label>登录密码：</label><input name="s_pwd" type="text"
		class="dfinput"/></li>
	<li><label>头像</label> <input name="s_head" type="file" /></li>
	<li><label>&nbsp;</label>
	<input id="but" type="button" class="btn" 	value="返回上一级" />
	<input name="sub" 	type="submit" 	class="btn" 	value="添加" /></li>
</ul>
</div>
</form>
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