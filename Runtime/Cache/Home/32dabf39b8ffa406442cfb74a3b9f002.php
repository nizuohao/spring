<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>企业资料注册</title>
<meta http-equiv="X-UA-Compatible" content="IE=7">
<link rel="shortcut icon" href="/favicon.ico" />
<link rel="stylesheet" type="text/css" href="/Spring/Public/home/templates/default/css/style.css" />
<link href="/Spring/Public/home/templates/default/css/user.css" rel="stylesheet" type="text/css" />
<script src="/Spring/Public/home/templates/default/js/jquery.js" type='text/javascript' language="javascript"></script>
<script src="/Spring/Public/home/templates/default/js/jquery.idTabs.min.js" type='text/javascript' language="javascript"></script>
<script src="/Spring/Public/home/templates/default/js/jquery.validate.min.js" type='text/javascript' language="javascript"></script>
<script src="/Spring/Public/home/templates/default/js/jquery.user.selectlayer.js" type='text/javascript' language="javascript"></script>
<script src="/Spring/Public/home/templates/default/js/jquery.vtip-min.js" type='text/javascript' language="javascript"></script>

<link href="/Spring/Public/home/templates/default/css/lanrenzhijia.css" type="text/css" rel="stylesheet" />

<script src="/Spring/Public/home/templates/default/js/emailAutoComplete.js"></script>


<body>
<link href="/Spring/Public/home/templates/default/css/global.css" rel="stylesheet" type="text/css">

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


<div class="page_location link_bk"> 当前位置：<a href="/Spring/index.php/Home">首页</a>&nbsp;>>&nbsp;公司信息&nbsp;>>注册基本信息 </div>
<table width="1100" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top:8px;margin-left:170px" >
  <tr>
   <script src="/Spring/Public/home/templates/default/js/jquery.dialog.js" type='text/javascript' ></script>
<script type="text/javascript">
$(document).ready(function()
{
	$("c_url").focus(function(){
		$val=$("c_url").val();
		if(empty($val)){
			$("c_url").val("http://");
		}
	});
  $("#c_user").keyup(function(){
    $val=$(this).val();
    if($val.length<3){
      $("#span").html("<font color='red'>用户名不能小于三位</font>");
        $("#reg").attr("disabled","disabled");
    }else{
      
           $.post("/Spring/index.php/Home/Reg/ajax",{name:$val,id:2},function(data){
          if(data==1){
              $("#span").html("<font color='red'>此用户已存在</font>");
              $("#reg").attr("disabled","disabled");
          }else{
             $("#span").html("<font color='green'>输入正确</font>");
              $("#reg").removeAttr("disabled","disabled");
          }
        });
    }
  });
  //非法字符验证
 $(".input_text_200").blur(function(){
      $rs=ff($(this).val());

      if($rs){
      
          $(this).next("span").html("<font color='red'>含有非法字符</font>");
          $("#reg").attr("disabled","disabled");
        
      }else{
         $(this).next("span").html("");
        $("#reg").removeAttr("disabled");
      }
  });
  $("#c_pwd").keyup(function(){
    $value=$(this).val();
     if($value.length<6){
        $("#pwd").html("<font color='red'>密码不能小于六位</font>");
        $("#reg").attr("disabled","disabled");
     }else{
        $("#pwd").html("<font color='green'>输入正确</font>");
        $("#reg").removeAttr("disabled","disabled");
     }
  });
  $("#reg").click(function(){
    $c_pwd=$("#c_pwd").val();
    $c_user=$("#c_user").val();
    $c_name=$("#c_name").val();
  if($c_pwd=='' || $c_user=='请输入登录名' || $c_name=='请输入公司名称'   ){
     $("#reg").attr("disabled","disabled");
     alert("请输入用户名、密码或企业名称");
  }else{
     $("#reg").removeAttr("disabled","disabled");
  }
  });
  
	function ff(val)
  {
    var patrn=/[`~!@#$^&*()+=|\\\[\]\{}:;',.<>/?]/;
    if(patrn.test(val)){
      return true;
        }
  }
});
</script>

 
    <td valign="top"><div class="user_right_box">
        <div class="user_right_top_tit_bg">
          <h1>企业基本信息</h1>
        </div>
        <form id="Form1" name="Form1" method="post" action=""  >
          <table width="100%" border="0" cellpadding="4" cellspacing="0"  style="margin-top:10px;">
            <tr>
              <td width="90" height="30" align="right"   ><span style="color:#FF3300; font-weight:bold">*</span>登录名：</td>
              <td  ><input name="c_user" type="text" class="input_text_200" id="c_user" maxlength="30" onFocus="this.value=''" onBlur="if(this.value=='')this.value='请输入登录名'" value='请输入登录名'/><span id="span"></span></td>
            </tr> <tr>
              <td width="90" height="30" align="right"   ><span style="color:#FF3300; font-weight:bold">*</span>登录密码：</td>
              <td  ><input name="c_pwd" type="password" class="input_text_200" id="c_pwd" maxlength="30" onFocus="this.value=''" onBlur="if(this.value=='')this.value='请输入登录密码'" /><span id="pwd"></span></td>
            </tr>
            <tr>
              <td width="90" height="30" align="right"   ><span style="color:#FF3300; font-weight:bold">*</span>公司名称：</td>
              <td  ><input name="c_name" type="text" class="input_text_200" id="c_name" maxlength="30" onFocus="this.value=''" onBlur="if(this.value=='')this.value='请输入公司名称'" value='请输入公司名称'/><span ></span></td>
            </tr>
           
           
            <tr>
              <td height="30" align="right" ><span style="color:#FF3300; font-weight:bold">*</span>公司规模：</td>
              <td  ><div>
                 <input type="radio" name="c_size" value="1" >大型  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="c_size" value="2" >中型  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="c_size" value="3" >小型
                 
                </div></td>
            </tr>
 
        <tr>
          <td height="30" align="right"  ><span style="color:#FF3300; font-weight:bold">*</span>联 系 人：</td>
          <td  >
		  <input name="c_telname" type="text" class="input_text_200" id="c_telname" maxlength="30" onFocus="this.value='<?php echo ($arr["c_telname"]); ?>'" onBlur="if(this.value=='')this.value='请输入联系人'" value='请输入联系人' /><span ></span>
		  </td>
        </tr>
		       <tr>
          <td height="30" align="right"  ><span style="color:#FF3300; font-weight:bold">*</span>联系电话：</td>
          <td  >
		  <input name="c_tel" type="text" class="input_text_200" id="telephone" maxlength="40" onFocus="this.value='<?php echo ($arr["c_tel"]); ?>'" onBlur="if(this.value=='')this.value='请输入联系电话'" value='请输入联系电话'  /><span ></span>
         
		  </td>
        </tr>
		<tr>
          <td height="30" align="right"  ><span style="color:#FF3300; font-weight:bold">*</span>联系邮箱：</td>
          <td  class="parentCls">
		  <input name="c_email" type="text" class="input_text_200 inputElem" id="c_email" maxlength="80" onFocus="this.value='<?php echo ($arr["c_email"]); ?>'" onBlur="if(this.value=='')this.value='请输入联系邮箱'" value='请输入联系邮箱' /><span ></span>
		  </td>
        </tr>
        <tr>
          <td height="30" align="right" >公司网址：</td>
          <td  ><input name="c_url" type="text" class="input_text_300" id="c_url" maxlength="80"  onBlur="if(this.value=='')this.value='http://'"  value="http://"/><span ></span></td>
        </tr>
		<tr>
              <td height="30" align="right" ><span style="color:#FF3300; font-weight:bold">*</span>联系QQ：</td>
              <td  ><div>
                  <input type="text"  name="c_qq" id="district_cn" class="input_text_200 input_text_200_selsect" onFocus="this.value='<?php echo ($arr["c_qq"]); ?>'" onBlur="if(this.value=='')this.value='请输入联系QQ'" value='请输入联系QQ'/><span ></span>
                </div></td>
            </tr>
		<tr>
          <td height="30" align="right"  ><span style="color:#FF3300; font-weight:bold">*</span>通讯地址：</td>
          <td  >
		  <input name="c_address" type="text" class="input_text_200" id="address" maxlength="80"  style="width:447px;" onFocus="this.value='<?php echo ($arr["c_address"]); ?>'" onBlur="if(this.value=='')this.value='请输入通讯地址'" value="<?php echo ($arr["c_address"]); ?>"/><span ></span>
		  </td>
        </tr>
		
        <tr>
          <td align="right" valign="top"  >
		  <span style="color:#FF3300; font-weight:bold">*</span> 公司介绍：</td>
          <td  >
		  <textarea name="c_intro" class="input_text_200_textarea" id="contents" style="width:450px; height:100px; margin-bottom:6px;" ><?php echo ($arr["c_intro"]); ?></textarea><span ></span>
            </td>
        </tr>
			
       
            <tr>
              <td align="right" valign="top" >&nbsp;</td>
              <td height="160" valign="top" ><br />
                <input type="submit" id="reg" name="submit" value="保存"  class="user_submit" />
                &nbsp;</td>
            </tr>
          </table>
        </form>
      </div></td>
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