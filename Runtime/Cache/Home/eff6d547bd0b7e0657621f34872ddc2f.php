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
<script type="text/javascript" src="/Spring/Public/home/templates/default/js/jquery-1.8.1.js"></script>
<script type="text/javascript" src="Think.config.jsurl}jquery.form.js"></script>
<script language="javascript" type="text/javascript" src="Think.config.jsurl}chekform.js" charset="UTF-8"></script>
<script type="text/javascript">
$(function(){
  $(".table").hide();
  $button=$("<input type='button' name='button' value='提交'>");
  $(".fu").click(function(){
    $(this).parent().parent().append("<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' id='re_content' >").append($button);
    $val=$(this).next().val();
    $("#re_tid").val($val);
  });
  $button.click(function(){
    $val=$("#re_tid").val();
    $si_id=$("#si_id").val();
    $content=$("#re_content").val();
   $.post("/Spring/index.php/Home/Shuoshuo/ajax",{ri_tid:$val,content:$content,si_id:$si_id},function($data){

    if($data==1){
      history.go(0);
      alert("评论成功");
    }else{
       alert("评论失败");
    }
  });
  });
  $(".zan").click(function(){
     $si_id=$("#si_id").val();
    $.post("/Spring/index.php/Home/Shuoshuo/zan",{si_id:$si_id},function(data){
      alert(data);
    });
  });
});

</script>
<style type="text/css">
.hui{float:right;position:relative;left:200px;color:#008000;}
</style>
<!--代码高亮显示调试-->
<script type="text/javascript" src="Think.config.rooturl}Public/SyntaxHighlighter/scripts/shCore.js"></script>
<link rel="stylesheet" href="Think.config.rooturl}Public/SyntaxHighlighter/style/shCore.css" />	
   <!--代码高亮显示调试--> 
<!--<div class="container">container-begin -->
  <div class="pagebody"><!--pagebody-begin -->
    
    <div class="leftpage"> <!--leftpage-begin -->
     
      <div class="updow">  <!-- updow-begin -->
      
        <div class="down"></div>
		<div class="up"><a title="pageup['title']}" >«&nbsp;<a href="/Spring/index.php/Home/Shuoshuo/index_select/s_id/<?php echo ($info["s_id"]); ?>"><?php echo ($info["s_name"]); ?>--<?php echo ($info["si_title"]); ?></a></div><?php if(($info["s_id"] == $s_id )): ?><span style="float:right;margin-right:30px;"><a href="/Spring/index.php/Home/Shuoshuo/delete/si_id/<?php echo ($info["si_id"]); ?>/s_id/<?php echo ($info["s_id"]); ?>">[删除]</a></span><?php endif; ?>


		</div>
      <!-- updow-end -->
     <div class="info">
        <!-- info-begin -->
        <div class="postinfo">
          <div class="date">
            <!-- date-begin -->
             <div class="t"><?php echo (date("m",$info["si_time"])); ?>月</div>
            <div class="d"><strong><?php echo (date("d",$info["si_time"])); ?></strong></div>
          </div>
          <!-- date-end -->
          <div class="title"><strong><a title="vo['title']}" ><?php echo ($info["si_title"]); ?></a></strong></div>
		 <div class="tinfo">
          <div class="author">作者:<?php echo ($info["s_name"]); ?></div>
         <div class="com" style="margin-left:10px;"><a class="zan">赞一下</a></div>
          <div class="com" style="margin-left:10px;"><a ><?php echo ($length); ?>人评论</a></div>
          <div class="com" ><a ><?php echo ($click); ?>人点赞</a></div>
		  </div><!--tinfo end-->
          <div class="line"></div>
        </div>
        <!-- postinfo-end -->
        <div class="post">内容</div>
        <div class="tag"><?php echo ($info["si_content"]); ?></div>
        <div class="comnum"><!--<a href="#comment">【已有人发表了看法，你呢？】</a>--></div>
      </div>
      <!-- info-end -->
      <!-- rela- -->
      <div class="rela">
      <div class="title"><strong>相关阅读</strong></div>
      
      <div class="relainfo">
            </div>
      
      </div>
       <input type="hidden"   id="si_id" value="<?php echo ($info["si_id"]); ?>">
     <input type="hidden"  name="re_tid" id="re_tid" value="">
      <div class="comtit">〖评论〗</div>
	    <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="rcomment">
	   <div class="line10"></div>
           <div class="cominfo">
           <span class="reply"></span>
        <a href="/Spring/index.php/Home/Shuoshuo/index_select/s_id/<?php echo ($vo["s_id"]); ?>"> &nbsp;&nbsp;<?php echo ($vo["s_name"]); ?> </a><span style="margin-left: 5px;margin-right: 5px;">于</span><?php echo (date("Y-m-d h:i:s",$vo["ri_time"])); ?><span style="margin-left: 5px;margin-right: 5px;">回复</span><?php echo ($vo["ri_name"]); ?><span class="hui"><a  class="fu">[回复]</a> 
        <input type="hidden"  value="<?php echo ($vo["s_id"]); ?>"></span>
        <?php if(($vo["s_id"] == $s_id ) or ($info["s_id"] == $s_id )): ?><span class="hui"><a href="/Spring/index.php/Home/Shuoshuo/del/ri_id/<?php echo ($vo["ri_id"]); ?>/s_id/<?php echo ($vo["s_id"]); ?>/sid/<?php echo ($info["s_id"]); ?>">[删除]</a></span><?php endif; ?>
      </div>
	  <div class="cinfo" >
      
        </div>
	  <div class="rcominfo">
       内容： <?php echo ($vo["ri_content"]); ?>
      </div>
        
       <div class="cominfo">
      <?php if(is_array($vo["hui"])): $i = 0; $__LIST__ = $vo["hui"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?>&nbsp;&nbsp;&nbsp;&nbsp;<span class="reply"></span>
        <a href="/Spring/index.php/Home/Shuoshuo/index_select/s_id/<?php echo ($vo1["s_id"]); ?>"> &nbsp;&nbsp;<?php echo ($vo1["s_name"]); ?> </a><span style="margin-left: 5px;margin-right: 5px;">于</span><?php echo (date("Y-m-d h:i:s",$vo1["ri_time"])); ?><span style="margin-left: 5px;margin-right: 5px;">回复</span><?php echo ($vo["s_name"]); if(($vo1["s_id"] == $s_id ) or ($info["s_id"] == $s_id )): ?><span class="hui"><a href="/Spring/index.php/Home/Shuoshuo/del/ri_id/<?php echo ($vo1["ri_id"]); ?>/s_id/<?php echo ($vo1["s_id"]); ?>/sid/<?php echo ($info["s_id"]); ?>">[删除]</a></span><?php endif; ?>

      <div class="rcominfo" style="margin-left:45px;">
       内容： <?php echo ($vo1["ri_content"]); ?>
      </div>
        <div class="cinfo">
     
      </div><?php endforeach; endif; else: echo "" ;endif; ?>
      </div>
      <div class="line10"></div>
	  </div><!-- comment-end --><?php endforeach; endif; else: echo "" ;endif; ?>  
	  <div class="pages"><div class="page"><?php echo ($Page); ?></div></div>   
	   <div class="comment">
      <div id="form">
     <a name="postComment"></a>
	<form method="post" action="/Spring/index.php/Home/Shuoshuo/huifu" id="form1" name="form1" onsubmit="return regs('click')">
		<p>&nbsp;</p>
		<div class="fieldset">
			<span class="legend">发表评论</span>
            <div id="result" class="none result" style="font-family:微软雅黑,Tahoma;margin-bottom: 10px;font-size:18px;color:green;text-align:center"></div>
            <table style="vertical-align:top;" class="table">
           
          <tr>
          <td><label for="references">评论内容:</label></td>
          <td><textarea name="ri_content" id="content" cols="0" rows="0" style="width: 450px; height: 100px;"></textarea></td>
        </tr>
      </table>
			<table style="vertical-align:top;">
					<input type="hidden" value="<?php echo ($info["si_id"]); ?>" name="ri_siid">

          <tr>
					<td><label for="references">评论内容:</label></td>
					<td><textarea name="ri_content" id="content" cols="0" rows="0" style="width: 450px; height: 100px;"></textarea></td>
				</tr>
			</table>
			<br />
             
			<input type="submit" name="dosubmit" id="dosubmit" value="发表"  />
		</div>
	</form>
</div>
	   </div>
      
   <div class="line10"></div>
    </div><!--leftpage-end -->
 
<script type="text/javascript">
		SyntaxHighlighter.config.clipboardSwf = 'Think.config.rooturl}Public/SyntaxHighlighter/scripts/clipboard.swf';
		SyntaxHighlighter.all();
</script>
</div>
<div id="bootom">&nbsp;</div>

  </body>
  
 
 <div class="footer-t-container">
                <div>
                <img  id="qr-code"  src="/Spring/Public/home/data/images/sdspringcode.png"  alt="二维码">
          		<div class="jyfw"><h3>教育是服务—用阳光的形象引领学生健康成长。</h3>
				<h4>Education is a service —— With the image of the sun lead healthy growth.</h4></div>                    
                </div>
            </div>
</html>
<script>
function getPid(i){
	pid=document.getElementById('pid');
	pid.value=i;
}
</script>
<script type="text/javascript">
(function(){
var tab_tit  = document.getElementById('think_page_trace_tab_tit').getElementsByTagName('span');
var tab_cont = document.getElementById('think_page_trace_tab_cont').getElementsByTagName('div');
var open     = document.getElementById('think_page_trace_open');
var close    = document.getElementById('think_page_trace_close').childNodes[0];
var trace    = document.getElementById('think_page_trace_tab');
var cookie   = document.cookie.match(/thinkphp_show_page_trace=(\d\|\d)/);
var history  = (cookie && typeof cookie[1] != 'undefined' && cookie[1].split('|')) || [0,0];
open.onclick = function(){
	trace.style.display = 'block';
	this.style.display = 'none';
	close.parentNode.style.display = 'block';
	history[0] = 1;
	document.cookie = 'thinkphp_show_page_trace='+history.join('|')
}
close.onclick = function(){
	trace.style.display = 'none';
this.parentNode.style.display = 'none';
	open.style.display = 'block';
	history[0] = 0;
	document.cookie = 'thinkphp_show_page_trace='+history.join('|')
}
for(var i = 0; i < tab_tit.length; i++){
	tab_tit[i].onclick = (function(i){
		return function(){
			for(var j = 0; j < tab_cont.length; j++){
				tab_cont[j].style.display = 'none';
				tab_tit[j].style.color = '#999';
			}
			tab_cont[i].style.display = 'block';
			tab_tit[i].style.color = '#000';
			history[1] = i;
			document.cookie = 'thinkphp_show_page_trace='+history.join('|')
		}
	})(i)
}
parseInt(history[0]) && open.click();
tab_tit[history[1]].click();
})();
</script>