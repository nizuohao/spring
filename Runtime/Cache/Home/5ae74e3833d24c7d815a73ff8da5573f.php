<?php if (!defined('THINK_PATH')) exit();?><link href="/Spring/Public/home/templates/default/css/style.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" type="text/css" href="/Home/Tpl/Index/style/style2.css" />

<script type="text/javascript" src="/Home/Tpl/Index/js/jquery-1.8.1.js"></script>
<script type="text/javascript" src="/Home/Tpl/Index/js/index.js"></script>

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


	    <script language="javascript" type="text/javascript">
        $(function () {
            $('.homepage-nav .nav > li').hover(
        function () {
            $('ul', this).stop().fadeIn();
        },
        function () {
            $('ul', this).stop().fadeOut();
        }
      );

            var tabContainers = $('.other-special-item > ul');
            $('.other-special-item h4 a').click(function () {
                tabContainers.stop().slideUp().filter(this.hash).stop().slideDown();

                return false;
            }).filter(':first').click();

        });
    </script>
 <div class="main-wrap">
 <div class="main">
 <div class="content">
<div class="article-single">
        <nav class="article-nav">
<ul>
    <li class="slash"><a href="/Spring/index.php/Home/Index/index"><i class="icon-home"></i>首页</a></li>
    <li class="slash"><a href="/Spring/index.php/Home/News/info_select">新闻中心</a></li>
</ul>
</nav>
<h2 style=" font-size:26px; padding-top:20px;"><?php echo ($info["i_title"]); ?></h2>
<div style="clear: both;"></div>
<div style="padding-top:10px;">
作者：<span><?php echo ($info["i_name"]); ?></span>
时间：<span><?php echo (date("Y-m-d H:i:s",$info["i_time"])); ?></span>
</div>
<div class="article-content">
<p></p><p>
	<?php if($info["i_photo"] != ''): ?><img alt="" src="/Spring/Public/Uploads/Info/<?php echo ($info["i_photo"]); ?>" width="356" style="float:left;margin-right:15px;"><?php endif; ?></p>
<p ><?php echo ($info["i_content"]); ?></p>
<p style="text-align: right;">
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($info["i_name"]); ?></p>
<p style="text-align: right;">
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo (date("Y年m月d日",$info["i_time"])); ?></p><p></p>
<p>&nbsp;</p>
</div></div>
</div>    
<div class="sidebar">
    <div class="other-special">
        <h2 style=" font-size:26px; padding-top:20px; padding-bottom:10px">专题列表</h2>
               <div class="other-special-item">
                   <h4>新闻频道<a href="http://www.sdspring.cn/tbgz#info-board0"><i class="icon-chevron-down"></i></a></h4>
                   <ul id="info-board0" style="height: 218px; padding-top: 0px; margin-top: 0px; padding-bottom: 10px; margin-bottom: 0px; display: none;">			   			   
                       <li><a href="/Spring/index.php/Home/News/info_select/i_banner/2" <?php if($state == 1): ?>style="color:#f00"<?php endif; ?> >banner</a></li>
                       <li><a href="/Spring/index.php/Home/News/info_select/i_state/2" <?php if($state == 2): ?>style="color:#f00"<?php endif; ?>>部门快讯</a></li>
                       <li><a href="/Spring/index.php/Home/News/info_select/i_state/3" <?php if($state == 3): ?>style="color:#f00"<?php endif; ?>>毕业生快讯</a></li>
                       <li><a href="/Spring/index.php/Home/News/info_select/i_state/4" <?php if($state == 4): ?>style="color:#f00"<?php endif; ?>>行业快讯</a></li>
                       <li><a href="/Spring/index.php/Home/News/info_select/i_state/5" <?php if($state == 5): ?>style="color:#f00"<?php endif; ?>>公告</a></li>
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