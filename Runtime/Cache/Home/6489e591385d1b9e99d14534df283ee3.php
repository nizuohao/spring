<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>个人资料管理 - 个人会员中心</title>
<meta http-equiv="X-UA-Compatible" content="IE=7">
<link rel="shortcut icon" href="/favicon.ico" />
<link rel="stylesheet" type="text/css"
	href="/Spring/Public/home/templates/default/css/style.css" />
<link href="/Spring/Public/home/templates/default/css/user.css"
	rel="stylesheet" type="text/css" />
<script src="/Spring/Public/home/templates/default/js/jquery.js"
	type='text/javascript' language="javascript"></script> <script
	src="/Spring/Public/home/templates/default/js/jquery.idTabs.min.js"
	type='text/javascript' language="javascript"></script> <script
	src="/Spring/Public/home/templates/default/js/jquery.validate.min.js"
	type='text/javascript' language="javascript"></script> <script
	src="/Spring/Public/home/templates/default/js/jquery.user.selectlayer.js"
	type='text/javascript' language="javascript"></script> <script
	src="/Spring/Public/home/templates/default/js/jquery.vtip-min.js"
	type='text/javascript' language="javascript"></script>
<link href="/Spring/Public/home/templates/default/css/lanrenzhijia.css"
	type="text/css" rel="stylesheet" />

<script src="/Spring/Public/home/templates/default/js/emailAutoComplete.js"></script>
<body>
<link href="/Spring/Public/home/templates/default/css/global.css"
	rel="stylesheet" type="text/css">
<header>
  <div id="top">
      <h1 class="logo"><a href="http://www.sdspring.cn"><img src="/Spring/Public/home/data/images/logo.png" width="193" height="45" /></a></h1>
        <nav class="list">
            <a href="/Spring/index.php/Home" class="selected">首页</a>
            <a href="/Spring/index.php/Home/News/info_select">就业快讯</a>
            <a href="/Spring/index.php/Home/Return/huizhi">入职信息</a>
            <a href="/Spring/index.php/Home/Return/serve">就业跟踪</a>
            <a href="/Spring/index.php/Home/Shuoshuo/index_select">我要说说</a>
        </nav>
        <form action="#" method="post" id="search">
          <input type="search" class="sear" placeholder="搜索…" />
            <input type="submit" class="sub" value="" />
        </form>
    </div><!--/top-->
</header>


<div class="page_location link_bk">当前位置：<a href="/Spring/index.php/Home">首页</a>&nbsp;>>&nbsp;个人信息&nbsp;>>注册基本信息
</div>
<table width="1100" border="0" align="center" cellpadding="0"
	cellspacing="0" style="margin-top: 8px; margin-left: 170px">
	<tr>
		<script src="/Spring/Public/home/templates/default/js/jquery.dialog.js"
			type='text/javascript'></script>
		<script type="text/javascript">
	$(document).ready(function() {
		$("c_url").focus(function() {
		$val = $("c_url").val();
							if (empty($val)) {
								$("c_url").val("http://");
							}
						});
						$('#chk').click(
								function() {
									$("#form1 :checkbox").attr('checked',
											$("#chk").attr('checked'))
								});
						
						$("input[type='text'],input[type='password']").focus(
								function() {
									$(this).css("border-color",
											"#0066CC #9DCEFF #9DCEFF #0066CC");
								});
						$("input[type='text'],input[type='password']").blur(
								function() {
									$(this).css("border-color", "");
								});
						//用户名
						$("#s_user")
								.keyup(
										function() {
											num = $(this).val().length;
											if (num < 4||num > 16) {
												$("#submit").attr("disabled","disabled");
												$("#s_user_t")
														.html(
																"<font color='red' >用户名长度应大于4位英文并小于16位英文</font>");
											}else {
												user = $(this).val();
												$.post("/Spring/index.php/Home/Reg/ajax",{id:1,user:user},function(data){
													if(data==1)
													{
														$("#submit").attr("disabled","disabled");
														$("#s_user_t")
														.html(
																"<font color='red' class='jg' >用户名已存在</font>");
													}else{
														$("#submit").removeAttr("disabled");
														$("#s_user_t")
														.html(
																"<font color='green' >用户名格式正确</font>");
													}
												})
											}
										});
						//二级联动
						$("#gr").change(function() {
							var g_id = $(this).val();
							$.get("/Spring/index.php/Home/Public/getClass", {
								c_gid : g_id
							}, function(data) {
								$("#cl").replaceWith(data);
							})
						});
						//非法字符验证
						$(".input_text_200").blur(function(){
							ff($(this).val());
						});
					});
	//验证
	function yz(){
		x=0;
		if($("#s_user").val()=='请输入登录名')
		{
			x++;
			$("#s_user").css("border-color","red");
		}
		if($("#s_pwd").val()=='请输入登录密码')
		{
			x++;
			$("#s_pwd").css("border-color","red");
		}
		if($("#s_name").val()=='请输入个人姓名')
		{
			x++;
			$("#s_name").css("border-color","red");
		}
		if($("#s_bir").val()=='')
		{
			x++;
			$("#s_bir").css("border-color","red");
		}
		if($("#s_card").val()=='')
		{
			x++;
			$("#s_card").css("border-color","red");
		}
		if($("#s_address").val()=='')
		{
			x++;
			$("#s_address").css("border-color","red");
		}
		if($("#s_tel").val()=='')
		{
			x++;
			$("#s_tel").css("border-color","red");
		}
		if($("#ci_id").val()=='')
		{
			x++;
			$("#ci_id").css("border-color","red");
		}
		if(x>0)
		{
			alert("您还有"+x+"必填项未填写的！");
			return false;
		}
	}
	
	function ff(val)
	{
		var patrn=/[`~!@#$^&*()+=|\\\[\]\{}:;',.<>/?]/;
		if(patrn.test(val)){
			$("#submit").attr("disabled","disabled");
			alert("提示信息：您输入的数据含有非法字符！");  
		    }else{
		    	$("#submit").removeAttr("disabled");
		    }
	}
	
</script>
		<td valign="top">
		<div class="user_right_box">
		<div class="user_right_top_tit_bg">
		<h1>个人基本信息</h1>
		</div>
		<form id="Form1" method="post" action="" enctype="multipart/form-data">
		<table width="100%" border="0" cellpadding="4" cellspacing="0"
			style="margin-top: 10px;">
			<tr>
				<td width="90" height="30" align="right"><span
					style="color: #FF3300; font-weight: bold">*</span>登录名：</td>
				<td><input name="s_user" id="s_user" type="text"
					class="input_text_200" id="s_user" maxlength="30"
					onFocus="this.value=''"
					onBlur="if(this.value=='')this.value='请输入登录名'"
					value='请输入登录名' /><span id="s_user_t"></span></td>
			</tr>
			<tr>
				<td width="90" height="30" align="right"><span
					style="color: #FF3300; font-weight: bold">*</span>登录密码：</td>
				<td><input name="s_pwd" id="s_pwd" type="password"
					class="input_text_200" maxlength="30"
					onFocus="this.value=''" /></td>
			</tr>
			<tr>
				<td width="90" height="30" align="right"><span
					style="color: #FF3300; font-weight: bold">*</span>确认密码：</td>
				<td><input id="pwd_2" type="password"
					class="input_text_200" maxlength="30"
					onFocus="this.value=''" /></td>
			</tr>
			<tr>
				<td width="90" height="30" align="right"><span
					style="color: #FF3300; font-weight: bold">*</span>个人姓名：</td>
				<td><input name="s_name" id="s_name" type="text"
					class="input_text_200" id="companyname" maxlength="30"
					onFocus="this.value=''"
					onBlur="if(this.value=='')this.value='请输入个人姓名'" value="请输入个人姓名" /></td>
			</tr>
			<tr>
				<td width="90" height="30" align="right"><span
					style="color: #FF3300; font-weight: bold">*</span>性&nbsp;别：</td>
				<td><input name="s_sex" type="radio" value="1" checked /> 男 <input
					name="s_sex" type="radio" value="2" /> 女</td>
			</tr>
			<tr>
				<td width="90" height="30" align="right"><span
					style="color: #FF3300; font-weight: bold">*</span>专业类别：</td>
				<td><input name="s_type" type="radio" value="1" checked /> PHP <input
					name="s_type" type="radio" value="2" /> 美工</td>
			</tr>
			<tr>
				<td width="90" height="30" align="right"><span
					style="color: #FF3300; font-weight: bold">*</span>出生日期：</td>
				<td><input name="s_bir" id="s_bir" type="date" class="dfinput" /></td>
			</tr>
			<tr>
				<td width="90" height="30" align="right"><span
					style="color: #FF3300; font-weight: bold"></span>班&nbsp;级：</td>
				<td><select id="gr" name="s_gid">
					<option>----请选择----</option>
					<?php if(is_array($vole_g)): $i = 0; $__LIST__ = $vole_g;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$g): $mod = ($i % 2 );++$i;?><option value="<?php echo ($g["g_id"]); ?>">----<?php echo ($g["g_name"]); ?>级----</option><?php endforeach; endif; else: echo "" ;endif; ?>
				</select>&nbsp;&nbsp;<select name="c_id" id="cl">
					<option>----请选择----</option>
				</select></td>
			</tr>
			<tr>
				<td width="90" height="30" align="right"><span
					style="color: #FF3300; font-weight: bold">*</span>身份证号：</td>
				<td><input name="s_card" id="s_card" type="text"
					class="input_text_200" /></td>
			</tr>
			<tr>
				<td width="90" height="30" align="right"><span
					style="color: #FF3300; font-weight: bold">*</span>家庭住址：</td>
				<td><input name="s_address" id="s_address" type="text"
					class="input_text_200" /></td>
			</tr>
			<tr>
				<td width="90" height="30" align="right"><span
					style="color: #FF3300; font-weight: bold">*</span>手机号：</td>
				<td><input name="s_tel" id="s_tel" type="text"
					class="input_text_200" /></td>
			</tr>
			<tr>
				<td width="90" height="30" align="right"><span
					style="color: #FF3300; font-weight: bold">*</span>联系邮箱：</td>
				<td><input name="s_email" id="s_email" type="text"
					class="input_text_300"/>&nbsp;&nbsp;<font color="red">找回密码所用邮箱</font></td>
			</tr>
			<tr>
				<td width="90" height="30" align="right"><span
					style="color: #FF3300; font-weight: bold">*</span>期望城市：</td>
				<td><select name="ci_id" class="dfinput" id="ci_id">
					<option value="">----请选择----</option>
					<?php if(is_array($vole_city)): $i = 0; $__LIST__ = $vole_city;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["ci_id"]); ?>"><?php echo ($vo["ci_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				</select>&nbsp;&nbsp;<font color="red">一经选择不能修改，请慎选！</font></td>
			</tr>
<!--			<tr>-->
<!--				<td width="90" height="30" align="right">头像：</td>-->
<!--				<td><input name="s_head" type="file" /></td>-->
<!--			</tr>-->
			<tr>
				<td align="right" valign="top">&nbsp;</td>
				<td height="160" valign="top"><br />
				<input type="submit" name="submit" value="提交" id='submit'
					onclick="return yz()" class="user_submit" /> &nbsp;</td>
			</tr>
		</table>
		</form>
		</div>
		</td>
	</tr>
</table>

 
 <div class="footer-t-container">
                <div>
                <img  id="qr-code"  src="/Spring/Public/home/data/images/sdspringcode.png"  alt="二维码">
          		<div class="jyfw"><h3>教育是服务—用阳光的形象引领学生健康成长。</h3>
				<h4>Education is a service —— With the image of the sun lead healthy growth.</h4></div>                    
                </div>
            </div>
</body>
</html>