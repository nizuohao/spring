<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>我的就业回执 - 个人会员中心 </title>
<meta http-equiv="X-UA-Compatible" content="IE=7">
<link rel="shortcut icon" href="/favicon.ico" />
<meta name="copyright" content="/Spring/index.php" />
<script type="text/javascript"  src="/Spring/Public/home/data/js/laydate.js"></script>
<script src="/Spring/Public/home/templates/default/js/uploadPreview.js"></script>
<link href="/Spring/Public/home/templates/default/css/user.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
$(document).ready(function()
{
  !function(){
  laydate.skin('molv');//切换皮肤，请查看skins下面皮肤库
}();

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
<link href="/Spring/Public/home/templates/default/css/global.css" rel="stylesheet" type="text/css" />
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
当前位置：<a href="/Spring/index.php">首页</a>&nbsp;>>&nbsp;<a href="/Spring/index.php/Student/centre">会员中心</a>&nbsp;>>&nbsp;就业回执&nbsp;
</div>
<table width="1100px" border="0" align="center" cellpadding="0" cellspacing="0" id="table" style="margin-top:8px;margin-left:165px" >
  <tr>
    <td width="173" valign="top" class="link_bk">


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
		  <h1>我的就业回执</h1>
		</div>
      <table width="100%" border="0" cellpadding="0" cellspacing="0" >
        <tr>
          <td  valign="top">
         
            
 <table width="100%" border="0" cellspacing="0" cellpadding="4" style="margin-bottom:150px; ">
                 
			<form id="Form1" name="Form1" method="post" action="" enctype="multipart/form-data"><tr>
			<?php if($list["hz_id"] == ''): ?><td height="23" colspan="2" valign="top" bgcolor="#E0F0F5"  style=" border-bottom:1px #CCCCCC dashed; color:#003399; border-top:1px #CCCCCC dashed; color:#003399; padding-left:35px;">添加就业回执</td>
                <?php else: ?>
                <td height="23" colspan="2" valign="top" bgcolor="#E0F0F5"  style=" border-bottom:1px #CCCCCC dashed; color:#003399; border-top:1px #CCCCCC dashed; color:#003399; padding-left:35px;">修改就业回执<?php endif; ?>
                </tr >
                <tr height="30px">
                 <input type="hidden" name="id" value="<?php echo ($list["hz_id"]); ?>" />
          		</tr>
				 
               <tr>
                    <td width="242" height="28" align="right" valign="top"><strong  style="color:#FF0000">*</strong>学生姓名：</td>
                    <td>
            				<div>
            				<input name="hz_name" type="text" class="input_text_200 date_input" readonly="readonly" value="<?php echo ($name); ?>" />
            						</div>
    					     </td>
              </tr>
               <tr>
                   <td width="242" height="28" align="right" valign="top"><strong  style="color:#FF0000">*</strong>所在公司：</td>
                     <td>
                    <div>
                    <input name="hz_cname" type="text" class="input_text_200 date_input" id="r_com" value="<?php echo ($list["hz_cname"]); ?>" />
                    </div>
                     </td>
              </tr>
               <tr>
                   <td width="242" height="28" align="right" valign="top"><strong  style="color:#FF0000">*</strong>工作职位：</td>
                     <td>
                    <div>
                    <input name="hz_job" type="text" class="input_text_200 date_input" id="r_com" value="<?php echo ($list["hz_job"]); ?>" />
                    </div>
                     </td>
              </tr>
               <tr>
                   <td width="242" height="28" align="right" valign="top"><strong  style="color:#FF0000">*</strong>工作待遇：</td>
                     <td>
                    <div>
                    <input name="hz_dy" type="text" class="input_text_200 date_input" id="r_com" value="<?php echo ($list["hz_dy"]); ?>" />
                    </div>
                     </td>
              </tr>
               <tr>
                   <td width="242" height="28" align="right" valign="top"><strong  style="color:#FF0000">*</strong>是否满意：</td>
                     <td>
                    <div>
                    <input name="hz_goods" type="text" class="input_text_200 date_input" id="r_com" value="<?php echo ($list["hz_goods"]); ?>" />
                    </div>
                     </td>
              </tr>
              <tr>
          <td width="242" height="28" align="right" valign="top"><strong  style="color:#FF0000">*</strong>带队老师：</td>
                <td>
                  <div>
                  <select name="hz_teacher"style="width:100px;height:24px;">
                    <option value="">请选择</option> 
                    <?php if(is_array($teacher)): $i = 0; $__LIST__ = $teacher;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["ci_tea"]); ?>" <?php if($list["hz_teacher"] == $vo["ci_tea"] ): ?>selected=selected<?php endif; ?>><?php echo ($vo["ci_tea"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                  </select>
                    </div>
               </td>
               </tr>
               <tr>
                    <td width="242" height="28" align="right" valign="top">联系方式：</td>
                    <td><input name="hz_tel" type="text" class="input_text_200 date_input"  value="<?php echo ($list["hz_tel"]); ?>" />
                     </td>
              </tr>
               <tr>
                    <td width="242" height="28" align="right" valign="top">联系ＱＱ：</td>
                    <td><input name="hz_qq" type="text" class="input_text_200 date_input"  value="<?php echo ($list["hz_qq"]); ?>" />
                     </td>
              </tr>
              <tr>
                    <td width="242" height="28" align="right" valign="top"><strong  style="color:#FF0000">*</strong>联系邮箱：</td>
                    <td>
                    <div>
                    <input name="hz_email" type="text" class="input_text_200 date_input"  value="<?php echo ($list["hz_email"]); ?>" />
                        </div>
                   </td>
              </tr>
            
              <tr>
                    <td width="242" height="28" align="right" valign="top" ><strong  style="color:#FF0000">*</strong>就业照片：</td>
                    <td width="836" id="warp" ><li><input name="hz_photo" type="file"  id="up_img_WU_FILE_0"/> 
                    <br> <img  width="120px" height="120px" id="imgShow_WU_FILE_0" <?php if($list["hz_photo"] != '' ): ?>src="/Spring/Public/Uploads/hui/<?php echo ($list["hz_photo"]); ?>"><?php endif; ?></li></td>
              </tr>
              <tr>
                    <td width="242" height="28" align="right" valign="top">就业感言：</td>
                    <td><textarea name="hz_desc" rows="10" cols="60"><?php echo ($list["hz_desc"]); ?></textarea>
                     </td>
              </tr>
              <tr >
                <td height="10" align="center" >
               </td>
                <td height="50"  >
                 <input type="submit" name="submit" value="保存"   class="user_submit"  />                  
                &nbsp;
                  <br /></td>
              </tr>

         </form>
             </table>

           </td>   
        </tr>
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