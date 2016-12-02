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
    var obj=document.getElementsByName('c_id[]');
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
            var t="/Spring/admin.php/Com/delete";
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
$(document).ready(function(){
  $("#print").click(function(){
   location.href="/Spring/index.php/Admin/Com/comlist/print/1";
  });
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
KE.show({
        id : 'content7',
        cssPath : './index.css'
    });
</script>

<script type="text/javascript">
$(document).ready(function(e) {
    $(".select1").uedSelect({
        width : 345           
    });
    $(".select2").uedSelect({
        width : 100  
    });
    $(".select3").uedSelect({
        width : 100
    });
    $("#checked").toggle(function(){
    if($("#checked :checked")){
        $("input[name='c_id[]']").attr("checked","checked");
    }
        },function(){
    if($("#checked :not(:checked)")){
        $("input[name='c_id[]']").removeAttr("checked","checked");
    }
        });
  });



</script>
</head>
<body>
<div class="place">
<span>位置：</span>
<ul class="placeul">
<li><a href="/Spring/admin.php">首页</a></li>
<li><a href="#">会员管理</a></li>
<li><a href="#">所有</a></li>
</ul>
</div>

<div class="rightinfo">
    <div class="tools">
    	<ul class="toolbar">
        <li onclick="return dele()"><span><img src="/Spring/Public/admin/images/t03.png"  /></span>删除</li>
        </ul>
 <ul class="seachform">
    <form action="" method="post">      
    <li ><label>名称</label><input name="c_name" type="text" class="scinput"/></li>
    <li ><label>联系人</label><input name="c_telname" type="text" class="scinput"/></li>
    <!--<li><label>地区</label>  
    <div class="vocation">
    <select class="select2" name="c_city">
     <option value="">请选择</option>
     <?php if(is_array($city)): $i = 0; $__LIST__ = $city;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["ci_name"]); ?>" <?php if($val["c_city"] == $vo.ci_name): ?>selected="selected"<?php endif; ?>><?php echo ($vo["ci_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
    </select>
    </div>
    </li>
    --><li><label>审核</label>  
    <div class="vocation">
    <select class="select2" name="c_state">
     <option value="">请选择</option>
     <option value='0' <?php if($val["c_state"] == '0'): ?>selected="selected"<?php endif; ?>>未审核</option>
     <option value="1" <?php if($val["c_state"] == 1): ?>selected="selected"<?php endif; ?>>已通过</option>
     <option value="2" <?php if($val["c_state"] == 2): ?>selected="selected"<?php endif; ?>>未通过</option>
    </select>
    </div>
    </li>
    
 
    <li><label>企业规模</label>  
    <div class="vocation">
    <select class="select3" name="c_size">
    <option value="">请选择</option>
    <option value="3" <?php if($val["c_size"] == 3): ?>selected="selected"<?php endif; ?>>大型</option>
    <option value="2" <?php if($val["c_size"] == 2): ?>selected="selected"<?php endif; ?>>中型</option>
    <option value="1" <?php if($val["c_size"] == 1): ?>selected="selected"<?php endif; ?>>小型</option>
  
    </select>
    </div>
    </li>
    
    <li><label>&nbsp;</label><input name="sub" type="submit" class="scbtn" value="查询"/></li>
    
</form><input name="submit" type="button" id="print" class="scbtn" value="导出" />
    
        </ul>
    </div>
	  <div class="clear"></div>
    <table class="tablelist">
      <thead>
      <tr>
        <th><input name="check" type="checkbox"  id="checked"/></th>
        <th>编号</th>
        <th>公司名称</th>
        <th>公司地址</th>
        <th>公司规模</th>
        <th>公司网站</th>
        <th>公司邮箱</th>
        <th>联系人</th>
        <th>联系电话</th>
        <th>审核</th>
        <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>

         <td><input name="c_id[]" type="checkbox" value="<?php echo ($vo["c_id"]); ?>" /></td>
        <td width="150px;"><?php echo ($key+1); ?></td>   
        <td width="700px;"><?php echo ($vo["c_name"]); ?></td>
        <td width="300px;"><?php echo ($vo["c_address"]); ?></td>
        <td  width="250px;"><?php if($vo["c_size"] == 3): ?>大型<?php elseif($vo["c_size"] == 2): ?>中型<?php else: ?>小型<?php endif; ?></td>
        <td width="200px"><?php echo ($vo["c_url"]); ?></td>
        <td ><?php echo ($vo["c_email"]); ?></td>
        <td width="200px;"><?php echo ($vo["c_telname"]); ?></td>
        <td><?php echo ($vo["c_tel"]); ?></td>
        <td width="400px" align="center"><?php if($vo["c_state"] == '0' ): ?><a href="/Spring/index.php/Admin/Com/state/c_id/<?php echo ($vo["c_id"]); ?>/id/1"><font color="blue">通过</font></a> | <a href="/Spring/index.php/Admin/Com/state/c_id/<?php echo ($vo["c_id"]); ?>/id/2"><font color="blue">不通过</font></a><?php elseif($vo["c_state"] == 1 ): ?><font color="green">已通过</font><?php else: ?><font color="red">未通过</font><?php endif; ?></td>
        <td align="center" width="300px;"><a href="/Spring/index.php/Admin/Com/update/c_id/<?php echo ($vo["c_id"]); ?>" class="tablelink"> 修改</a> |  <a href="/Spring/index.php/Admin/Com/del/c_id/<?php echo ($vo["c_id"]); ?>" class="tablelink"> 删除</a></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
      
        
           
        </tbody>
    </table>
    <div class="clear"></div>
    <div class="pagin">
    	<div class="message"><?php echo ($page); ?></div>
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
<div style="display:none"></div>
</body>
<script language="javascript">
	$(".classlist li").css({width:"300px",height:"170px",overflow:"true"});
	$(".mar").css({margin:"14px 0"});
</script>
</html>