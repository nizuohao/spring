<?php if (!defined('THINK_PATH')) exit();?>
<link href="/Spring/Public/home/templates/default/css/style.css" rel="stylesheet" type="text/css">
<link href="/Home/Tpl/Index/style/bao-list.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/Home/Tpl/Index/style/style2.css" />
<link rel="stylesheet" type="text/css" href="/Home/Tpl/Index/style/style.css" />
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


<div class="main-wrap">
        <div class="main">      
            <div id="pageShow" class="content">
                <div class="article-single">
                <nav class="article-nav">
                    <ul>
                        <li class="slash"><a href="/Spring/index.php/Home/Index/index"><i class="icon-home"></i>首页</a></li>
                        <li class="slash"><a href="/Spring/index.php/Home/News/info_select">新闻中心</a></li>
                    </ul>
                </nav>
                </div>
                <div class="article-list">
                    <div class="dsh-sub-header">
                    <h2 style=" font-size:26px; padding-top:20px;">
                        <?php if($state == 1): ?>banner
                        <?php elseif($state == 2): ?>部门快讯
                        <?php elseif($state == 3): ?>毕业生快讯
                        <?php elseif($state == 4): ?>行业快讯 
                        <?php elseif($state == 5): ?>公告
                        <?php else: ?>所有新闻<?php endif; ?>
                    </h2>
                        </div>
                    <div class="article-list-content">
<!------  新闻列表---------->
<?php if(is_array($list1)): $i = 0; $__LIST__ = $list1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$info): $mod = ($i % 2 );++$i;?><article class="article-list-item">
    <div>
        <h3 style="">[
		 <?php if($info["i_state"] == 1): ?>banner
                        <?php elseif($info["i_state"] == 2): ?>部门快讯
                        <?php elseif($info["i_state"] == 3): ?>毕业生快讯
                        <?php elseif($info["i_state"] == 4): ?>行业快讯 
                        <?php else: ?>公告<?php endif; ?>
		]&nbsp;<a href="/Spring/index.php/Home/News/info/id/<?php echo ($info["i_id"]); ?>" target="_blank"><?php echo ($info["i_title"]); ?></a></h3>
        <span><?php echo (date("Y-m-d H:i:s",$info["i_time"])); ?></span>
        <p> <?php  $con=$info["i_content"]; echo substr($con,0,120);?>……</p>
        <a href="/Spring/index.php/Home/News/info/id/<?php echo ($info["i_id"]); ?>" class="view-more" target="_blank"> 查看详细 <i class="icon-angle-right"></i></a>
    </div>
</article><?php endforeach; endif; else: echo "" ;endif; ?>
<!-- the end 新闻列表-->
<nav class="page-nav"><?php echo ($page); ?></nav>
                    </div>
                </div>
            </div>
<div class="sidebar">
    <div class="other-special">
        <h2 style=" font-size:26px; padding-top:20px; padding-bottom:10px">专题列表</h2>
               <div class="other-special-item">
               <h4>新闻频道</h4>
               <ul id="info-board0" style="height: 218px; padding-top: 0px; margin-top: 0px; padding-bottom: 10px; margin-bottom: 0px;">
			   		<li><a href="/Spring/index.php/Home/News/info_select" <?php if($state == ''): ?>style="color:#f00"<?php endif; ?> >所有新闻</a></li>
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