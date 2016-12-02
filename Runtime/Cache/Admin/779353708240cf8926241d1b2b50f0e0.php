<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/Spring/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/Spring/Public/admin/css/select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Spring/Public/admin/js/jquery.js"></script>
<script type="text/javascript" src="/Spring/Public/admin/js/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="/Spring/Public/admin/js/select-ui.min.js"></script>
<script type="text/javascript" src="/Spring/Public/admin/editor/kindeditor.js"></script>
<script type="text/javascript">
function dele(){
    var obj=document.getElementsByName('ad_id[]');
    var str='';
     for(var i=0;i<obj.length;i++){
       if(obj[i].checked){
        str+=obj[i].value+",";
       }
      }
      if(str==''){
        alert("请选择一项");
        return false;
      }
            var t="/Spring/admin.php/Serve/advice";
            //alert(t);
           var c=t.replace("#","")
            //   alert(c);
           var strlen=str.lastIndexOf(",");
            var strnew=str.substr(0,strlen);
//alert(strlen); alert(strnew);
           var b=c.lastIndexOf("?");
           //alert(b);
           if(b>0){
             cc=c.substr(0,b);
            // alert(cc);
           }else{
             cc=c;
           }
          // alert(cc);
           document.location.href=cc+"?id="+strnew;

}
    KE.show({
        id : 'content7',
        cssPath : './index.css'
    });
  </script>


<script type="text/javascript">
$(document).ready(function(){
  $(".click").click(function(){
  $(".tip").fadeIn(200);
  });
  
  $(".tiptop a").click(function(){
  $(".tip").fadeOut(200);
});

  $(".sure").click(function(){
  $(".tip").fadeOut(100);
});

  $(".cancel").click(function(){
  $(".tip").fadeOut(100);
});

});
</script>
<script type="text/javascript">

$(document).ready(function(){
    $("#checked").toggle(function(){
    if($("#checked :checked")){
        $("input[name='in_id[]']").attr("checked","checked");
    }
        },function(){
    if($("#checked :not(:checked)")){
        $("input[name='in_id[]']").removeAttr("checked","checked");
    }
        });
  });

$(document).ready(function(e) {
    $(".select1").uedSelect({
        width : 345           
    });
    $(".select2").uedSelect({
        width : 167  
    });
    $(".select3").uedSelect({
        width : 100
    });
    
});
</script>


</head>


<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
    <li><a href="#">数据表</a></li>
    <li><a href="#">基本内容</a></li>
    </ul>
    </div>
     
    <div class="rightinfo">
    <div  class="tabson">
  <ul class="toolbar">
       
        <li onclick="return dele()"><span><img src="/Spring/Public/admin/images/t03.png"  /></span>删除</li>
   
        </ul>
            <ul class="toolbar1">
        <li><span><img src="/Spring/Public/admin/images/t05.png" /></span>设置</li>
        </ul>
   <ul class="seachform">
    <form action="" method="get">      

    <li><label>用户类型</label>  
    <div class="vocation">
    <select class="select3" name="type">
     <option value="">请选择</option>
      
       <option value="1">用户</option>
       <option value="2">企业</option>
   
    </select>
    </div>
    </li>
     <li><label>意见状态</label>  
    <div class="vocation">
    <select class="select3" name="ad_cd">
     <option value="">请选择</option>
      
       <option value="1">恳切</option>
       <option value="2">重视</option>
       <option value="3">一般</option>
   
    </select>
    </div>
    </li>
    
 
    
    <li><label>&nbsp;</label><input name="submit" type="submit" class="scbtn" value="查询"/></li>
    
</form>
    
        </ul>
       

    
  <form action="" method="post">
  
    
    <table class="tablelist">
    	<thead>
    	<tr>
        <th><input name="check" type="checkbox"  id="checked"/></th>
        <th >编号<i class="sort"><img src="/Spring/Public/admin/images/px.gif" /></i></th>
        <th>意见内容</th>
        <th>意见状态</th>
        <th>用户姓名或企业姓名</th>
        <th>发布时间</th>
        <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
        <td><input name="ad_id[]" type="checkbox" value="<?php echo ($vo["ad_id"]); ?>" /></td>
         <td ><?php echo ($key+1); ?></td>
         <td ><?php echo ($vo["ad_cont"]); ?></td>
         <td ><?php if($vo["ad_cd"] == 1): ?>恳切<?php elseif($vo["ad_cd"] == 2): ?>重视<esleif condition="$vo.ad_cd eq 3" />一般<esle />暂未选择<?php endif; ?></td>
         <td><?php echo ($vo["s_name"]); echo ($vo["c_name"]); ?></td>
         <td width="140px"><?php echo ($vo["ad_time"]); ?></td>
        <td align="center"> <a href="/Spring/index.php/Admin/Serve/advice/ad_id/<?php echo ($vo["ad_id"]); ?>" class="tablelink"> 删除</a></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
       
        
       
      
        
           
        </tbody>
    </table>
    </form>
    <?php echo ($page); ?>
   </div>
   
    
    
    <div class="tip">
    	<div class="tiptop"><span>提示信息</span><a></a></div>
        
      <div class="tipinfo">
        <span><img src="/Spring/Public/admin/images/ticon.png" /></span>
        <div class="tipright">
        <p>是否确认对信息的修改 ？</p>
        <cite>如果是请点击确定按钮 ，否则请点取消。</cite>
        </div>
        </div>
        
        <div class="tipbtn">
        <input name="" type="button"  class="sure" value="确定" />&nbsp;
        <input name="" type="button"  class="cancel" value="取消" />
        </div>
    
    </div>
    
    
    
    
    </div>
    
    <script type="text/javascript">
	$('.tablelist tbody tr:odd').addClass('odd');
	</script>

<div style="display:none"></div>
<script type="text/javascript"> 
      $("#usual1 ul").idTabs(); 
    </script>
    
    <script type="text/javascript">
    $('.tablelist tbody tr:odd').addClass('odd');
    </script>
    

</body>
</html>