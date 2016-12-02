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
    <li><label>年级名称</label>
		<input name="g_name"  type="text" class="dfinput" value="<?php echo ($sel["g_name"]); ?>" /><i>****级(注：只需填写年份)</i>
	</li>
        <input type="hidden" name="g_id" value="<?php echo ($sel["g_id"]); ?>" />
    <li><label>&nbsp;</label><?php if($sel["g_id"] == ''): ?><input name="sub" type="submit" class="btn" value="添 加"/><?php else: ?><input name="sub" type="submit" class="btn" value="修 改"/><?php endif; ?></li>
    </ul>
    </form>
    
    </div>