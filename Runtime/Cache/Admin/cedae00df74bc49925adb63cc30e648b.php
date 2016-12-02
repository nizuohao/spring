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
<style type="text/css">
  
</style>
<script type="text/javascript">
function getclass(){

      var c=$("#grade").val();
     $.get('/Spring/admin.php/Common/getclass',{cid:c},function(data){
       $("#class").html(data);
     });

   };
   
function dele(){
    var obj=document.getElementsByName('r_id[]');
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
            var t="/Spring/admin.php/Serve/ret_delete";
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
  $("#print").click(function(){
     location.href="/Spring/index.php/Admin/Serve/serve/print/1";
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
</script>
<script type="text/javascript">

$(document).ready(function(){
    $("#checked").toggle(function(){
    if($("#checked :checked")){
        $("input[name='r_id[]']").attr("checked","checked");
    }
        },function(){
    if($("#checked :not(:checked)")){
        $("input[name='r_id[]']").removeAttr("checked","checked");
    }
        });
  });

$(document).ready(function(e) {
    $(".select1").uedSelect({
        width : 345           
    });
    $(".select2").uedSelect({
        width : 120  
    });
    $(".select3").uedSelect({
        width : 120
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
       <!--<li><a href="/Spring/index.php/Admin/Serve/ret_add" target="rightFrame"><span><img src="/Spring/Public/admin/images/t01.png" /></span>添加</a></li>
        --><li onclick="return dele()"><span><img src="/Spring/Public/admin/images/t03.png"  /></span>删除</li>
   
        </ul>
            
    
   <ul class="seachform">
    <form action="" method="post">      
    <li><label>姓名</label><input name="s_name" type="text" class="scinput" value="<?php echo ($val["s_name"]); ?>"/></li>
  
    <li><label>公司</label><input name="r_company" type="text" class="scinput" value="<?php echo ($val["r_company"]); ?>"/></li>
    
     <!--<li><label>年级</label>  
        <div class="vocation">
        <select class="select3" name="grade" id="grade" onchange="getclass()">
           <option value="">请选择</option>
           <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["g_id"]); ?>" <?php if( $val["grade"] == $vo["g_id"] ): ?>selected="selected"<?php endif; ?>><?php echo ($vo["g_name"]); ?>级</option><?php endforeach; endif; else: echo "" ;endif; ?>
       
        </select>
        </div>
        </li>
   <li><label>班级</label>  
        <div class="vocation" >
        <select class="select3" name="class" id='class'>
          
        </select>
        </div>
        </li>
        <li><label>专业</label>  
        <div class="vocation">
        <select class="select3" name="s_type">
           <option value="">请选择</option>
           
           <option value="1" <?php if( $val["s_type"] == 1 ): ?>selected="selected"<?php endif; ?>>编程</option>
           <option value="2" <?php if( $val["s_type"] == 2 ): ?>selected="selected"<?php endif; ?>>美工</option>
       
        </select>
        </div>
        </li>
        <li><label>职位</label>  
    <div class="vocation">
    <select class="select3" name="r_job">
     <option value="">请选择</option>
      <?php if(is_array($job)): $i = 0; $__LIST__ = $job;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo); ?>" <?php if($val["r_job"] == $vo): ?>selected="selected"<?php endif; ?>><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
    </select>
    </div>
    </li>-->
        <li><label>在职</label>  
        <div class="vocation">
        <select class="select3" name="r_in">
           <option value="">请选择</option>
           
           <option value="1" <?php if( $vo["r_in"] == 1 ): ?>selected="selected"<?php endif; ?>>在职</option>
           <option value="2" <?php if( $vo["r_in"] == 2 ): ?>selected="selected"<?php endif; ?>>离职</option>
       
        </select>
        </div>
        </li>
      <!--<li><label>年限</label>  
        <div class="vocation">
        <select class="select3" name="r_year">
           <option value="">请选择</option>
          <?php $__FOR_START_6309__=1;$__FOR_END_6309__=15;for($i=$__FOR_START_6309__;$i < $__FOR_END_6309__;$i+=1){ ?><option value="<?php echo ($i); ?>" <?php if( $vo["r_year"] == $i ): ?>selected="selected"<?php endif; ?>><?php echo ($i); ?>年</option><?php } ?>
       
        </select>
        </div>
        </li>
     --><li><label>求助</label>  
        <div class="vocation">
        <select class="select3" name="r_help">
           <option value="">请选择</option>
          
           <option value="1" <?php if( $vo["r_help"] == 1 ): ?>selected="selected"<?php endif; ?>>求助</option>
          <option value="2" <?php if( $vo["r_help"] == 2 ): ?>selected="selected"<?php endif; ?>>不求助</option>
       
        </select>
        </div>
        </li>
    <li><label>&nbsp;</label><input name="sub" type="submit" class="scbtn" value="查询"/></li>
    <input name="submit" type="button" id="print" class="scbtn" value="导出" />
</form>
    
        </ul>
       

    
  <form action="" method="post">
  
    
    <table class="tablelist">
    	<thead>
    	<tr>
        <th><input name="check" type="checkbox"  id="checked"/></th>
        <th >编号<i class="sort"><img src="/Spring/Public/admin/images/px.gif" /></i></th>
        <th>姓名</th>
        <th>所在公司</th>
        <th>所在职位</th>
        <th>工资(试用/转正)</th>
     
        <th>应用技术</th>
        <th>待遇</th>

        <th>企业联系方式</th>
        <th>图片</th>
        <th>求助</th>
        <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
        <td width="30px"><input name="r_id[]" type="checkbox" value="<?php echo ($vo["r_id"]); ?>" /></td>
        <td width="45px" align="center"><?php echo ($key+1); ?></td>
        <td width="60px"><?php echo ($vo["s_name"]); ?></td>
        <td width="200px"><?php echo ($vo["r_company"]); ?></td>
        <td><?php echo ($vo["r_job"]); ?></td>
        <td width="100px"><?php echo ($vo["r_spay"]); ?>/<?php echo ($vo["r_pay"]); ?></td>
        <td width="80px"><?php echo ($vo["r_tec"]); ?></td>
        <td width="80px"><?php echo ($vo["r_dy"]); ?></td>
        <td><?php echo ($vo["r_tel"]); ?></td>
        <td><a href="/Spring/Public/Uploads/ret/<?php echo ($vo["r_photo"]); ?>" target="_blank">查看大图</a></td>
        <td><?php if($vo["r_help"] == 1): ?><font color="red">求助</font><?php else: ?>不求助<?php endif; ?></td>
        <td align="center" width="100px"><a href="/Spring/index.php/Admin/Serve/ret_update/r_id/<?php echo ($vo["r_id"]); ?>" class="tablelink"  >修改</a>    &nbsp; |  &nbsp;  <a href="/Spring/index.php/Admin/Serve/ret_delete/r_id/<?php echo ($vo["r_id"]); ?>" class="tablelink"> 删除</a></td>
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