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

  <div class="pagebody" style="background-color:#FCFAE6"><!--pagebody-begin -->
    
    <div class="leftpage"> <!--leftpage-begin -->
        <div class="down"></div>
	   <div class="comment">
      <div id="form">
    
	<form method="post" action="/Spring/index.php/Home/shuoshuo" id="form1" name="form1" >
		<p>&nbsp;</p>
		<div class="fieldset">
			<span class="legend">我要说说</span><span class="legend" style="float:right"><a href="/Spring/index.php/Home/index_select">说说中心</a></span>
            <div  class="none result" style="font-family:微软雅黑,Tahoma;margin-bottom: 10px;font-size:18px;color:green;text-align:center"></div>
			<table style="vertical-align:top;">
				<tr>
					<td><label >发布标题:</label></td>
					<td><input type="text" name="si_title" ></td>
				</tr>	
                 <tr>
					<td><label>发布内容:</label></td>
					<td><textarea name="si_content" id="si_content" cols="0" rows="0" style="width: 450px; height: 100px;"></textarea></td>
				</tr>
			</table>
			<br />
             
			<input type="submit" name="submit" id="dosubmit" value="发表"  />
		</div>
	</form>
</div>
	   </div>
      
   <div class="line10"></div>
    </div><!--leftpage-end -->
 </div>

 
 
 <div class="footer-t-container">
                <div>
                <img  id="qr-code"  src="/Spring/Public/home/data/images/sdspringcode.png"  alt="二维码">
          		<div class="jyfw"><h3>教育是服务—用阳光的形象引领学生健康成长。</h3>
				<h4>Education is a service —— With the image of the sun lead healthy growth.</h4></div>                    
                </div>
            </div>
  </body>
</html>