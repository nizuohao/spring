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
<div id="tab1" class="tabson">
    
    <div class="formtext">Hi，<b><?php echo (session('admin_name')); ?></b>，欢迎您使用合作企业功能！</div>
    <form action="/Spring/admin.php/Hezuo/add" method="post" enctype="multipart/form-data">
    <ul class="forminfo">
    <li><label>合作企业<b>*</b></label><input name="hz_name" type="text" class="dfinput" value="<?php echo ($info["hz_name"]); ?>"  style="width:518px;"/></li>
    <li><label>企业LOGO<b>*</b></label><input name="hz_logo" type="file" class="dfinput" value="<?php echo ($info["hz_logo"]); ?>"  style="width:318px;"/></li> 
    <li><label>企业URL<b></b></label><input name="hz_url" type="text" class="dfinput" value="<?php echo ($info["hz_url"]); ?>"  style="width:318px;" value="http://" /><font color="red" ><span>请添加 http://</span></font></li>
    <li><label>说明<b>*</b></label>
    <textarea id="content7" name="hz_content" style="width:700px;height:250px;visibility:hidden;"><?php echo ($info["hz_content"]); ?></textarea>
    </li>
    <input type="hidden" name="hz_id" value="<?php echo ($info["hz_id"]); ?>" />
        <li><label>&nbsp;</label><?php if($info["hz_id"] != ''): ?><input name="sub" type="submit" class="btn" value="修改信息"/><?php else: ?><input name="sub" type="submit" class="btn" value="马上发布"/><?php endif; ?></li>
    </ul>
    </form>
    </div>