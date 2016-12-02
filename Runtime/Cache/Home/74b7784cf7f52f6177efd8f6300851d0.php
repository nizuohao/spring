<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>我的简历 - 个人会员中心  </title>
<meta http-equiv="X-UA-Compatible" content="IE=7">
<link rel="shortcut icon" href="/favicon.ico" />
<meta name="copyright" content="/Spring/index.php/Home" />
<script type="text/javascript"  src="/Spring/Public/home/data/js/laydate.js"></script>
<script src="/Spring/Public/home/templates/default/js/uploadPreview.js"></script>
<link href="/Spring/Public/home/templates/default/css/user.css" rel="stylesheet" type="text/css" />
<script src="/Spring/Public/home/templates/default/js/jquery.js" type='text/javascript' language="javascript"></script>

<script type="text/javascript">
$(document).ready(function()
{
  !function(){
  laydate.skin('molv');//切换皮肤，请查看skins下面皮肤库
}();
$("#r_url").click(function(){
  if($("#r_url").val()==''){
    $("#r_url").val('http://');
  }
});
$("#hide").hide();
$("#hidden").hide();
$("input[name='r_work']").click(function(){
$val=$("input[name='r_work']:checked").val();
if($val==1){
  $("#hidden").hide();
  $("#hide").show();
}
if($val==2){
  $("#hide").hide();
  $("#hidden").show();
}
});

$(".left_menu_bg").click(function(){
    var tb=$(this).next();
    var tb_display=tb.css("display");
    if (tb_display=="block")
    {
    tb.css("display","none");
    $(this).find("img").attr("src","/Spring/Public/home/templates/default/images/06.gif");
    }
    else
    {
    tb.css("display","block");
    $(this).find("img").attr("src","/Spring/Public/home/templates/default/images/07.gif");
    }
  });
  
  

});
</script>
</head>
<body>
<link href="/Spring/Public/home/templates/default/css/style.css" rel="stylesheet" type="text/css" />
<link href="/Spring/Public/home/templates/default/css/lanrenzhijia.css" type="text/css" rel="stylesheet" />

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


<div class="page_location link_bk">
当前位置：<a href="/Spring/index.php/Home">首页</a>&nbsp;>>&nbsp;<a href="/Spring/index.php/Home/Student/centre">会员中心</a>&nbsp;>>&nbsp;就业反馈&nbsp;
</div>
<table width="1100px" border="0" align="center" cellpadding="0" cellspacing="0" id="table" style="margin-top:8px;margin-left:165px" >
  <tr>
    <td width="173" valign="top" class="link_bk">
	<script src="/Spring/Public/home/templates/default/js/jquery.dialog.js" type='text/javascript' ></script>

<div class="left_menu_home"><a href="/Spring/index.php/Home/Student/centre" style="color:#990000">中心首页</a>
<a href="/Spring/index.php/Home/Student/read" style="color:#990000"  id="preview">个人信息</a>
</div>
<div id="previewbox" style="display:none">
<table width="100%" border="0" cellspacing="0" cellpadding="5">
<tr>
    <td bgcolor="#F3F7FC"><strong>简历名称</strong></td>
    <td width="130" align="center" bgcolor="#F3F7FC"><strong>刷新时间</strong></td>
    <td width="50" bgcolor="#F3F7FC"><strong>点击</strong></td>
  </tr>

 
  </table>
</div>

<div class="left_menu_box">
	<div class="left_menu_bg">
		<div class="left_menu_tit">简历管理</div>
		<div class="left_menu_img"><img src="/Spring/Public/home/templates/default/images/07.gif"  border="0" /></div>
		
	</div>
	<div class="left_menu_btop">
	<ul>
			<li><a href="/Spring/index.php/Home/Apply/addResume">创建新简历</a></li>
			<li><a href="/Spring/index.php/Home/Apply/resume">简历管理</a></li>
			
			
			<div class="clear"></div>
	  </ul>
	</div>
</div>
<div class="left_menu_box">
	<div class="left_menu_bg">
		<div class="left_menu_tit">就业服务<div class="hot"></div></div>
		<div class="left_menu_img"><img src="/Spring/Public/home/templates/default/images/07.gif"  border="0" /></div>
		<div class="clear"></div>
	</div>
	<div class="left_menu_btop">
	<ul>
			<li><a href="/Spring/index.php/Home/Return/serve">工作反馈</a></li>
			<li><a href="/Spring/index.php/Home/Return/huizhi">就业回执</a></li>
			<li><a href="/Spring/index.php/Home/Return/mianshi">面试历程</a></li>
			
			<div class="clear"></div>
	  </ul>
	</div>
</div>
<div class="left_menu_box">
	<div class="left_menu_bg">
		<div class="left_menu_tit">我要说说<div class="hot"></div></div>
		<div class="left_menu_img"><img src="/Spring/Public/home/templates/default/images/07.gif"  border="0" /></div>
		<div class="clear"></div>
	</div>
	<div class="left_menu_btop">
	<ul>
			<li><a href="/Spring/index.php/Home/Shuoshuo/shuoshuo">我要说说</a></li>
			<li><a href="/Spring/index.php/Home/Return/advice">意见建议</a></li>
			<div class="clear"></div>
	  </ul>
	</div>
</div>

<div class="left_menu_box">
	<div class="left_menu_bg">
		<div class="left_menu_tit">求职管理</div>
		<div class="left_menu_img"><img src="/Spring/Public/home/templates/default/images/07.gif"  border="0" /></div>
		<div class="clear"></div>
	</div>
	<div class="left_menu_btop">
	<ul>
			
			<li><a href="/Spring/index.php/Home/Job/job_list" target="_blank">搜索职位</a></li>
			<li><a href="/Spring/index.php/Home/Student/resume">已投简历</a></li>
			<!-- <li><a href="">职位收藏夹</a></li> -->
			<div class="clear"></div>
	  </ul>
	</div>
</div>
<div class="left_menu_box" style="border-bottom:1px;">
	<div class="left_menu_bg">
		<div class="left_menu_tit">账户管理</div>
		<div class="left_menu_img"><img src="/Spring/Public/home/templates/default/images/07.gif"  border="0" /></div>
		<div class="clear"></div>
	</div>
	<div class="left_menu_btop">
	<ul>
			<li><a href="/Spring/index.php/Home/Vip/protect">密码保护</a></li>
			<li><a href="/Spring/index.php/Home/Vip/update">密码修改</a></li>
 			<li><a href="/Spring/index.php/Home/Index/tc">安全退出</a></li>
		<div class="clear"></div>
	  </ul>
	</div>
</div>

</td>
    <td valign="top" >
	<div class="user_right_box" style="height:920px;">
		<div class="user_right_top_tit_bg">		
		  <h1>我的反馈</h1>
		</div>
      <table width="100%" border="0" cellpadding="0" cellspacing="0" >
        <tr>
          <td  valign="top">
          <table width="100%" border="0" cellspacing="0" cellpadding="4" >
            <tr>
              <td height="30" bgcolor="#F5FAFC">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:14px; color:#0033CC">就业反馈</span> <span style="color: #666666">(带<strong  style="color:#FF0000">*</strong>的为必填)</span>
			  
			  	  			  </td>
              </tr>            
          </table>
            <table width="100%" border="0" cellspacing="1" cellpadding="5"  class="link_lan" width="1100px">
              <tr>
                <td height="23" align="center" bgcolor="#E0F0F5" style=" border-bottom:1px #CCCCCC dashed; color:#003399; border-top:1px #CCCCCC dashed;">就业城市</td>
                <td align="center" bgcolor="#E0F0F5" style=" border-bottom:1px #CCCCCC dashed; color:#003399;border-top:1px #CCCCCC dashed;">就业公司</td>
                <td align="center" bgcolor="#E0F0F5" style=" border-bottom:1px #CCCCCC dashed; color:#003399;border-top:1px #CCCCCC dashed;">工作职位</td>
                <td align="center" bgcolor="#E0F0F5" style=" border-bottom:1px #CCCCCC dashed; color:#003399;border-top:1px #CCCCCC dashed;">公司网址</td>
                <td align="center" bgcolor="#E0F0F5" style=" border-bottom:1px #CCCCCC dashed; color:#003399;border-top:1px #CCCCCC dashed;">试用/转正</td>
                <td align="center" bgcolor="#E0F0F5" style=" border-bottom:1px #CCCCCC dashed; color:#003399;border-top:1px #CCCCCC dashed;">联系方式</td>
                <td align="center" bgcolor="#E0F0F5" style=" border-bottom:1px #CCCCCC dashed; color:#003399;border-top:1px #CCCCCC dashed;">是否救助</td>
                <td align="center" bgcolor="#E0F0F5" style=" border-bottom:1px #CCCCCC dashed; color:#003399;border-top:1px #CCCCCC dashed;">是否在职</td>
                <td  align="center" bgcolor="#E0F0F5" style=" border-bottom:1px #CCCCCC dashed; color:#003399;border-top:1px #CCCCCC dashed;width:70px">编辑</td>
              </tr><?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td height="23" align="center"><?php echo ($vo["r_city"]); ?></td>
                <td align="center"><?php echo ($vo["r_company"]); ?></td>
                <td align="center"><?php echo ($vo["r_job"]); ?></td>
                <td align="center"><a href="<?php echo ($vo["r_url"]); ?>"><?php echo ($vo["r_url"]); ?></a></td>
                <td align="center"><?php echo ($vo["r_spay"]); ?>/<?php echo ($vo["r_pay"]); ?></td>
                <td align="center"><?php echo ($vo["r_tel"]); ?></td>
                <td align="center"><?php if( $vo["r_help"] == 1 ): ?>救助<?php elseif( $vo["r_help"] == 2 ): ?>不救助<?php else: ?>未选择<?php endif; ?> </td>
                <td align="center"><?php if( $vo["r_work"] == 1 ): ?>在职<?php elseif( $vo["r_work"] == 2 ): ?>离职<?php else: ?>未选择<?php endif; ?> </td>
                <td align="center"><a href="/Spring/index.php/Home/Return/serve/r_id/<?php echo ($vo["r_id"]); ?>">修改</a>&nbsp;&nbsp;</td>
              </tr><?php endforeach; endif; else: echo "" ;endif; ?>
			              </table>
		              <table width="100%" border="0" cellspacing="0" cellpadding="4" style="margin-bottom:150px; ">
                 
			<form id="Form1" name="Form1" method="post" action="" enctype="multipart/form-data"><tr>
			<?php if($list["r_id"] == ''): ?><td height="23" colspan="2" valign="top" bgcolor="#E0F0F5"  style=" border-bottom:1px #CCCCCC dashed; color:#003399; border-top:1px #CCCCCC dashed; color:#003399; padding-left:35px;">添加就业反馈</td>
                <?php else: ?>
                <td height="23" colspan="2" valign="top" bgcolor="#E0F0F5"  style=" border-bottom:1px #CCCCCC dashed; color:#003399; border-top:1px #CCCCCC dashed; color:#003399; padding-left:35px;">修改就业反馈<?php endif; ?>
                </tr >
                <tr height="30px">
                 <input type="hidden" name="id" value="<?php echo ($list["r_id"]); ?>" />
          		</tr>
				 <tr>
          <td width="242" height="28" align="right" valign="top"><strong  style="color:#FF0000">*</strong>就业城市：</td>
                <td>
          				<div>
          				<select name="r_city"style="width:100px;height:24px;">
                    <option value="">请选择</option> 
                    <?php if(is_array($city)): $i = 0; $__LIST__ = $city;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["ci_name"]); ?>" <?php if($arr["r_city"] == $vo["ci_name"] ): ?>selected=selected<?php endif; ?>><?php echo ($vo["ci_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                  </select>
          					</div>
					     </td>
               </tr>
               <tr>
                    <td width="242" height="28" align="right" valign="top"><strong  style="color:#FF0000">*</strong>就业公司：</td>
                    <td>
            				<div>
            				<input name="r_company" type="text" class="input_text_200 date_input" id="r_com" value="<?php echo ($list["r_company"]); ?>" />
            						</div>
    					     </td>
              </tr>
              <tr>
                    <td width="242" height="28" align="right" valign="top"><strong  style="color:#FF0000">*</strong>公司网址：</td>
                    <td>
                    <div>
                    <input name="r_url" type="text" class="input_text_200 date_input" id="r_url" value="<?php echo ($list["r_url"]); ?>" />
                        </div>
                   </td>
              </tr>
              <tr>
                   <td width="242" height="28" align="right" valign="top"><strong  style="color:#FF0000">*</strong>工作职位：</td>
                     <td>
                    <div>
                    <input name="r_job" type="text" class="input_text_200 date_input" id="r_com" value="<?php echo ($list["r_job"]); ?>" />
                    </div>
                     </td>
              </tr>
              <tr>
                    <td width="242" height="28" align="right" valign="top" ><strong  style="color:#FF0000">*</strong>就业照片：</td>
                    <td width="836" id="warp" ><li><input name="r_photo" type="file"  id="up_img_WU_FILE_0"/> 
                    <br> <img  width="120px" height="120px" id="imgShow_WU_FILE_0" <?php if($list["r_photo"] != '' ): ?>src="/Spring/Public/Uploads/ret/<?php echo ($list["r_photo"]); ?>"><?php endif; ?></li></td>
              </tr>
              <tr>
                    <td width="242" height="28" align="right" valign="top">试用工资：</td>
                    <td><input name="r_spay" type="text" class="input_text_200 date_input" id="r_spay" value="<?php echo ($list["r_spay"]); ?>" />
                     </td>
              </tr>
              <tr>
                    <td width="242" height="28" align="right" valign="top">转正工资：</td>
                    <td><input name="r_pay" type="text" class="input_text_200 date_input" id="r_pay" value="<?php echo ($list["r_pay"]); ?>" />
                     </td>
              </tr>
              <tr>
                    <td width="242" height="28" align="right" valign="top">联系方式：</td>
                    <td><input name="r_tel" type="text" class="input_text_200 date_input" id="" value="<?php echo ($list["r_tel"]); ?>" />
                     </td>
              </tr>
              
			    <tr>
                <td width="242" height="23" align="right" valign="top">是否救助：</td>
                <td><label>
                <input name="r_help" type="radio" value="1"  title="救助" <?php if( $list["r_help"] == 1 ): ?>checked="checked"<?php endif; ?>  /> 救助</label>&nbsp;&nbsp;&nbsp;&nbsp;
               <label> <input type="radio" name="r_help" value="2"  title="不救助" <?php if( $list["r_help"] == 2): ?>checked="checked"<?php endif; ?> />不救助</label></td>
           </tr>
              <tr>
                <td width="242" height="23" align="right" valign="top">是否在职：</td>
                <td><label>
                <input name="r_work" type="radio" value="1"  title="在职" <?php if( $list["r_work"] == 1 ): ?>checked="checked"<?php endif; ?>  /> 在职</label>&nbsp;&nbsp;&nbsp;&nbsp;
                <label> <input type="radio" name="r_work" value="2"  title="待职" <?php if( $list["r_work"] == 2): ?>checked="checked"<?php endif; ?> /> 离职</label></td>
              </tr>
             
                </table>
               <table id="hide" style="position:relative;top:-150px;left:-45px">
               <tr>
                    <td width="242" height="28" align="right" valign="top">入职时间：</td>
                    <td><input name="r_stime" type="text" class="input_text_200 date_input" onClick="laydate({istime: true, format: 'YYYY-MM-DD'})"  value="<?php echo ($list["r_stime"]); ?>" />
                     </td>
                  </tr>
                  <tr>
                    <td width="242" height="28" align="right" valign="top">应用技术：</td>
                    <td><input name="r_tec" type="text" class="input_text_200 date_input" id="" value="<?php echo ($list["r_tec"]); ?>" />
                     </td>
                  </tr>
                  <tr>
                    <td width="242" height="28" align="right" valign="top">主营项目：</td>
                    <td><input name="r_bus" type="text" class="input_text_200 date_input" id="" value="<?php echo ($list["r_bus"]); ?>" />
                     </td>
                  </tr>
                  <tr>
                    <td width="242" height="28" align="right" valign="top">待遇：</td>
                    <td><input name="r_dy" type="text" class="input_text_200 date_input" id="" value="<?php echo ($list["r_dy"]); ?>" />
                     </td>
                  </tr>
               </table>
                <table id="hidden" style="position:relative;top:-150px;left:-45px">
               <tr>
                 <td width="242" height="28" align="right" valign="top">离职时间：</td>
                    <td><input name="r_etime" type="text" class="input_text_200 date_input" onClick="laydate({istime: true, format: 'YYYY-MM-DD'})"  value="<?php echo ($list["r_etime"]); ?>" />
                     </td>
               </tr>
            </table>
        </tr>
         <table style="position:relative;top:-150px;left:200px;height:50px;">
           <tr >
                <td height="10" align="center" >
               </td>
                <td height="50"  >
                 <input type="submit" name="submit" value="保存"   class="user_submit"/>                  
                &nbsp;
                  <br /></td>
              </tr>
         </form>
      </table>
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