<?php if (!defined('THINK_PATH')) exit();?>
<header>
  <div id="top">
      <h1 class="logo"><a href="http://www.sdspring.cn"><img src="/Spring/Public/home/data/images/logo.png" width="193" height="45" /></a></h1>
        <nav class="list">
            <a href="/Spring/index.php" class="selected">首页</a>
            <a href="/Spring/index.php/News/info_select">就业快讯</a>
            <a href="/Spring/index.php/Return/huizhi">入职信息</a>
            <a href="/Spring/index.php/Return/serve">就业跟踪</a>
            <a href="/Spring/index.php/Shuoshuo/index_select">我要说说</a>
        </nav>
        <form action="#" method="post" id="search">
          <input type="search" class="sear" placeholder="搜索…" />
            <input type="submit" class="sub" value="" />
        </form>
    </div><!--/top-->
</header>


<link href="/Spring/Public/home/templates/default/css/style.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" type="text/css" href="/job/home/Tpl/Index/style/style2.css" />
<link rel="stylesheet" type="text/css" href="/job/home/Tpl/Index/style/bao-list.css" />
<script type="text/javascript" src="/job/home/Tpl/Index/js/jquery-1.8.1.js"></script>
<script type="text/javascript" src="/job/home/Tpl/Index/js/index.js"></script>
<script type="text/javascript" src="/job/home/Tpl/Shuoshuo/js/dialog.js"></script>
<script type="text/javascript">
    $(function(){
        $("#s_sub").click(function(){
            if($("#si_title").val()==""){
                $("#si_title1").html("请输入标题");
                return false;
            }
        });
        $("#s_text").click(function(){
            $(this).html("");
        })
    })
</script>
<div class="main-wrap">
        <div class="main">      
            <div id="pageShow" class="content">
                <div class="article-single">
                <nav class="article-nav">
                    <ul>
                        <li class="slash"><a href="/Spring/index.php/Index/index"><i class="icon-home"></i>首页</a></li>
                        <li class="slash"><a href="/Spring/index.php/Shuoshuo/index_select">说说中心</a></li>
                    </ul>
                </nav>
                </div>
<div style="padding-left:25px;">
    <h2 style="font-size:20px; font-weight:bold; color:#666">
        发表说说
    </h2>
<form action="/Spring/index.php/Shuoshuo/shuoshuo" method="post" enctype="multipart/form-data" style="padding-left:15px; padding-top:10px;">
    <span class="pl3" align="left" style="padding:8px 0; display:block">
      标题 : <input type="text" name="si_title" id="si_title" /><span id="si_title1" style="color:#f00;"></span>
    </span>
    <div class="txd">
        <textarea class="j a_show_login" name="si_content" rows="5" cols="54" id="s_text"> 在这里请输入内容……</textarea><br>
        <span class="bn-flat-hot rr">
        <input type="file" name="si_photo" /><input name="submit_btn" type="submit" class="j a_show_login" value="加上去" id="s_sub" />
        </span>
    </div>
</form>
</div>
                <div class="article-list">
                    <div class="dsh-sub-header">
                    <h2 style=" font-size:26px; padding-top:20px;">
                        <?php if($state == 1): ?>banner
                        <?php elseif($state == 2): ?>部门快讯
                        <?php elseif($state == 3): ?>毕业生快讯
                        <?php elseif($state == 4): ?>行业快讯 
                        <?php elseif($state == 5): ?>公告
                        <?php elseif($state == 'shuo'): ?>说说中心
                        <?php else: endif; ?>
                    </h2>
                        </div>
                    <div class="article-list-content">
<!------  新闻列表---------->
<?php if(is_array($list1)): $i = 0; $__LIST__ = $list1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$info): $mod = ($i % 2 );++$i;?><article class="article-list-item">
    <div>
        <h3><a href="/Spring/index.php/Shuoshuo/index_list/s_id/<?php echo ($info["s_id"]); ?>" style="color:#0E5691">[<?php echo ($info["s_name"]); ?>]</a>&nbsp;<a href="/Spring/index.php/Shuoshuo/index/id/<?php echo ($info["si_id"]); ?>"><?php echo ($info["si_title"]); ?></a></h3>
        <span><?php echo (date("Y-m-d H:i:s",$info["si_time"])); ?></span>
        <p><?php echo ($info["si_content"]); if($info["si_photo"] != ''): ?><span style="color:#f00;">[有图]</span><?php endif; ?></p>
        <a href="/Spring/index.php/Shuoshuo/index/id/<?php echo ($info["si_id"]); ?>" class="view-more"> 查看详细 <i class="icon-angle-right"></i></a>
    </div>
</article><?php endforeach; endif; else: echo "" ;endif; ?>
<!-------- the end 新闻列表--------------------->
<nav class="page-nav"><?php echo ($page); ?></nav>
<!--
                        <nav class="page-nav"><ul>
	         <li>共<span style="font-weight:bold">148</span>页&nbsp;&nbsp;</li>
		     <li><a class="d-left-arrow" href="http://www.sdspring.cn/index.php?M=news#"></a></li>
			 <li><a class="left-arrow" href="http://www.sdspring.cn/index.php?M=news#"></a></li>
			 <li><a class="current" href="http://www.sdspring.cn/index.php?M=news#">1</a></li>
			 <li><a class="right-arrow" href="http://www.sdspring.cn/index.php?M=news#" onclick="return page(2,0,&#39;pageNews&#39;)"></a></li>
			 <li><a class="d-right-arrow" href="http://www.sdspring.cn/index.php?M=news#" onclick="return page(148,0,&#39;pageNews&#39;)"></a></li>
		  </ul></nav>
-->
                    </div>
                </div>
            </div>
<div class="sidebar">
    <div class="other-special">
        <h2 style=" font-size:26px; padding-top:20px; padding-bottom:10px">专题列表</h2>
               <div class="other-special-item">
               <h4>新闻频道<a href="http://www.sdspring.cn/tbgz#info-board0"><i class="icon-chevron-down"></i></a></h4>
               <ul id="info-board0" style="height: 218px; padding-top: 0px; margin-top: 0px; padding-bottom: 10px; margin-bottom: 0px;">
			   		<li><a href="/Spring/index.php/Index/info_select" <?php if($state == ''): ?>style="color:#f00"<?php endif; ?> >所有新闻</a></li>
			   		<li><a href="/Spring/index.php/Shuoshuo/index_select" <?php if($state == 'shuo'): ?>style="color:#f00"<?php endif; ?> >说说中心</a></li>
			   		<li><a href="/Spring/index.php/Index/info_select/i_state/1" <?php if($state == 1): ?>style="color:#f00"<?php endif; ?> >banner</a></li>
                    <li><a href="/Spring/index.php/Index/info_select/i_state/2" <?php if($state == 2): ?>style="color:#f00"<?php endif; ?>>部门快讯</a></li>
                    <li><a href="/Spring/index.php/Index/info_select/i_state/3" <?php if($state == 3): ?>style="color:#f00"<?php endif; ?>>毕业生快讯</a></li>
                    <li><a href="/Spring/index.php/Index/info_select/i_state/4" <?php if($state == 4): ?>style="color:#f00"<?php endif; ?>>行业快讯</a></li>
                    <li><a href="/Spring/index.php/Index/info_select/i_state/5" <?php if($state == 5): ?>style="color:#f00"<?php endif; ?>>公告</a></li>
</ul>
			   </div>  
    </div>
</div>
        </div>
    </div>

 
 <div class="footer-t-container">
                <div>
                <img  id="qr-code"  src="/Spring/Public/home/data/images/sdspringcode.png"  alt="二维码">
          		<div class="jyfw"><h3>教育是服务—用阳光的形象引领学生健康成长。</h3>
				<h4>Education is a service —— With the image of the sun lead healthy growth.</h4></div>                    
                </div>
            </div>