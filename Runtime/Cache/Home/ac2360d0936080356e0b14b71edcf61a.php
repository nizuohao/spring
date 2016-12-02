<?php if (!defined('THINK_PATH')) exit();?>
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


<link href="/Spring/Public/home/templates/default/css/style.css" rel="stylesheet" type="text/css"/>
<link href="/Spring/Public/home/templates/default/css/www.css" rel="stylesheet" type="text/css"/>
<!--<div class="container">container-begin -->
  <div class="pagebody"> <!--pagebody-begin -->
  
    <div class="leftpage"> <!--leftpage-begin -->
	 <b style="color:#008000;font-weight:blod;font-size:20px;margin-left:5px;"> 说说中心 </b>
    <b style="color:#008000;font-weight:blod;font-size:20px;margin-right:25px; float:right"> <a href="/Spring/index.php/Home/Shuoshuo/shuoshuo">发布说说 </a></b>
      <div class="ance" style="margin-top:5px;"> <!-- anoun-begin -->      
                    
        </div> <!-- anoun-end -->
		<?php if(is_array($list1)): $i = 0; $__LIST__ = $list1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="info" style="border-bottom:1px #008000 solid;"> <!-- info-begin -->
        <div class="postinfo">
          <div class="date"> <!-- date-begin -->
            <div class="t"><?php echo (date("m",$vo["si_time"])); ?>月</div>
            <div class="d"><strong><?php echo (date("d",$vo["si_time"])); ?></strong></div>
          </div> <!-- date-end -->
          <div class="title"><strong><a title="<?php echo ($vo["si_title"]); ?>" href="/Spring/index.php/Home/Shuoshuo/index/id/<?php echo ($vo["si_id"]); ?>"><?php echo ($vo["si_title"]); ?></a></strong></div>
		  <div class="tinfo">
          <div class="author">作者:<?php echo ($vo["s_name"]); ?></div>
         
          <div class="com" ><a href="#" ><?php echo ($vo["ping"]); ?>人评论</a></div>
		  </div><!--tinfo end-->
          <div class="line"></div>
        </div>
        <!-- postinfo-end -->
        <div class="post">内容</div>
       <div class="tag"><?php $con=$vo["si_content"]; echo substr($con,0,120)."……"; ?></div>
        <div class="comnum">评论人数<?php echo ($vo["ping"]); ?><a href="/Spring/index.php/Home/Shuoshuo/index/id/<?php echo ($vo["si_id"]); ?>">【我来说两句】</a></div>
      </div><?php endforeach; endif; else: echo "" ;endif; ?>
      <!-- info-end -->
	  <div class="pages"><div class="page"><?php echo ($page); ?>          </div></div>
    </div>
    <!--comnumleftpage-end -->
 
     
    </div><!--rightpage-end -->
  </div> <!--pagebody-end -->
  <!-- <div class="clear"></div>-->

 
 <div class="footer-t-container">
                <div>
                <img  id="qr-code"  src="/Spring/Public/home/data/images/sdspringcode.png"  alt="二维码">
          		<div class="jyfw"><h3>教育是服务—用阳光的形象引领学生健康成长。</h3>
				<h4>Education is a service —— With the image of the sun lead healthy growth.</h4></div>                    
                </div>
            </div>
<div id="bootom">&nbsp;</div>
  </body>
</html>