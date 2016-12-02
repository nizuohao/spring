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
    var obj=document.getElementsByName('re_id[]');
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
            var t="/Spring/admin.php/Com/del";
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
function jian(){
    var obj=document.getElementsByName('re_id[]');
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
            var t="/Spring/admin.php/Com/re_jian";
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
   $("#print").click(function(){
   location.href="/Spring/index.php/Admin/Com/recruit/print/1";
  });
    $("#checked").toggle(function(){
    if($("#checked :checked")){
        $("input[name='re_id[]']").attr("checked","checked");
    }
        },function(){
    if($("#checked :not(:checked)")){
        $("input[name='re_id[]']").removeAttr("checked","checked");
    }
        });
  });

$(document).ready(function(e) {
    $(".select1").uedSelect({
        width : 345           
    });
    $(".select2").uedSelect({
        width : 80 
    });
    $(".select3").uedSelect({
        width : 80
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
        <li onclick="return jian()"><span><img src="/Spring/Public/admin/images/t05.png"  /></span>推荐</li>
        </ul>
            
    
   <ul class="seachform">
    <form action="" method="post">      
    <li ><label>名称</label><input name="c_name" type="text" class="scinput" value="<?php echo ($val["c_name"]); ?>" style="width:80px;"/></li>
    <li ><label>联系人</label><input name="re_telname" type="text" class="scinput" value="<?php echo ($val["re_telname"]); ?>" style="width:80px;"/></li>
    <li><label>地区</label>  
    <div class="vocation">
    <select class="select2" name="re_city">
     <option value="">请选择</option>
     <?php if(is_array($city)): $i = 0; $__LIST__ = $city;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo); ?>" <?php if($val["re_city"] == $vo): ?>selected="selected"<?php endif; ?>><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
    </select>
    </div>
    </li>
     <li><label>职位</label>  
    <div class="vocation">
    <select class="select2" name="re_job">
     <option value="">请选择</option>
     <?php if(is_array($job)): $i = 0; $__LIST__ = $job;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo); ?>" <?php if($val["re_job"] == $vo): ?>selected="selected"<?php endif; ?>><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
    </select>
    </div>
    </li>
    <li><label>推荐</label>  
    <div class="vocation">
    <select class="select2" name="re_jian">
     <option value="">请选择</option>
     <option value="1" <?php if($val["re_jian"] == 1): ?>selected="selected"<?php endif; ?>>推荐</option>
     <option value='0' <?php if($val["re_jian"] == '0'): ?>selected="selected"<?php endif; ?>>不推荐</option>
  
     
    </select>
    </div>
    </li>
    <li><label>审核</label>  
    <div class="vocation">
    <select class="select2" name="re_state">
     <option value="">请选择</option>
     <option value='0' <?php if($val["re_state"] == '0'): ?>selected="selected"<?php endif; ?>>未审核</option>
     <option value="1" <?php if($val["re_state"] == 1): ?>selected="selected"<?php endif; ?>>通过</option>
     <option value="2" <?php if($val["re_state"] == 2): ?>selected="selected"<?php endif; ?>>不通过</option>
    </select>
    </div>
    </li>
    
    <li><label>&nbsp;</label><input name="sub" type="submit" class="scbtn" value="查询" style="width:60px;" /></li>
    <input name="submit" type="button" id="print" class="scbtn" value="导出" style="width:60px;" />
</form>
    
        </ul>
       

    
  <form action="" method="post">
  
    
    <table class="tablelist">
    	<thead>
    	<tr>
        <th><input name="check" type="checkbox"  id="checked"/></th>
        <th >编号<i class="sort"><img src="/Spring/Public/admin/images/px.gif" /></i></th>
        <th>企业姓名</th>
        <th>招聘职位</th>
        
        <th>人数</th>
        <th>截止日期</th>
        <th>工作地区</th>
        <th>工资范围</th>
      
        <th>联系人</th>
        <th>联系方式</th>
        <th>推荐</th>
        <th>审核</th>
        <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
        <td><input name="re_id[]" type="checkbox" value="<?php echo ($vo["re_id"]); ?>" /></td>
        <td><?php echo ($key+1); ?></td>
        <td><?php echo ($vo["c_name"]); ?></td>
        <td><?php echo ($vo["re_job"]); ?></td>
        
        <td><?php echo ($vo["re_sum"]); ?></td>
        <td><?php echo ($vo["re_endtime"]); ?></td>
        <td><?php echo ($vo["re_city"]); ?></td>
        <td><?php echo ($vo["re_money"]); ?></td>
       
        <td><?php echo ($vo["re_telname"]); ?></td>
        <td><?php echo ($vo["re_tel"]); ?></td>
         <td><?php if($vo["re_jian"] == 1): ?><a href="/Spring/index.php/Admin/Com/re_jian/re_id/<?php echo ($vo["re_id"]); ?>/rid/1"><font color="green">推荐</font></a><?php else: ?><a href="/Spring/index.php/Admin/Com/re_jian/re_id/<?php echo ($vo["re_id"]); ?>/rid/'0'"><font color="red">不推荐</font></a><?php endif; ?></td>
        <td><?php if($vo["re_state"] == '0' ): ?><a href="/Spring/index.php/Admin/Com/rec_state/re_id/<?php echo ($vo["re_id"]); ?>/id/1"><font color="blue">通过</font></a> | <a href="/Spring/index.php/Admin/Com/rec_state/re_id/<?php echo ($vo["re_id"]); ?>/id/2"><font color="blue">不通过</font></a><?php elseif($vo["re_state"] == 1 ): ?><font color="green">已通过</font><?php else: ?><font color="red">未通过</font><?php endif; ?></td>
        <td align="center" width="100px"><a href="/Spring/index.php/Admin/Com/rec_update/re_id/<?php echo ($vo["re_id"]); ?>" class="tablelink" >修改</a>  &nbsp; |  &nbsp;  <a href="/Spring/index.php/Admin/Com/delete/re_id/<?php echo ($vo["re_id"]); ?>" class="tablelink"> 删除</a></td>
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