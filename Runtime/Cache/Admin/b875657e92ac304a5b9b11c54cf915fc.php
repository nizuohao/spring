<?php if (!defined('THINK_PATH')) exit();?><link href="/Spring/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/Spring/Public/admin/css/select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Spring/Public/admin/js/jquery.js"></script>
<script type="text/javascript" src="/Spring/Public/admin/js/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="/Spring/Public/admin/js/select-ui.min.js"></script>
<script type="text/javascript" src="/Spring/Public/admin/editor/kindeditor.js"></script>
<script type="text/javascript">
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
		width : 167  
	});
	$(".select3").uedSelect({
		width : 100
	});
});
</script>
	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
    <li><a href="#">表单</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    
    <div class="formtitle"><span>添加信息</span></div>
    <form method="post" action="">

    <ul class="forminfo">
    <li><label>年级<b>*</b></label>  
    <div class="vocation">
    <select class="select1" name="c_gid">
        <?php if(is_array($grade)): $i = 0; $__LIST__ = $grade;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gr): $mod = ($i % 2 );++$i; $a = $gr["g_id"]; ?>
         <?php if($cla["c_gid"] == $a): ?><option value="<?php echo ($gr["g_id"]); ?>" selected><?php echo ($gr["g_name"]); ?>级</option>
             <?php else: ?> <option value="<?php echo ($gr["g_id"]); ?>"><?php echo ($gr["g_name"]); ?>级</option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
    </select>
    </div>  
    </li>  
    <li><label>班级名称</label>
		<input name="c_name"  type="text" class="dfinput" value="<?php echo ($cla["c_name"]); ?>" /><i>例：编程*班/美工*班</i>
	</li>
        <input type="hidden" name="c_id" value="<?php echo ($cla["c_id"]); ?>" />
    <li><label>&nbsp;</label><?php if($cla["c_id"] == ''): ?><input name="sub" type="submit" class="btn" value="添 加"/><?php else: ?><input name="sub" type="submit" class="btn" value="修 改"/><?php endif; ?></li>
    </ul>
    </form>
    
    </div>