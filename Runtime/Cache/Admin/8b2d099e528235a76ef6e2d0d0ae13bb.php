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

    

    <div class="formtext">Hi，<b><?php echo (session('admin_name')); ?></b>，欢迎您使用信息发布功能！</div>

    <form action="/Spring/admin.php/Info/infoUpde" method="post" enctype="multipart/form-data">

    <ul class="forminfo">

    <li><label>信息标题<b>*</b></label><input name="i_title" type="text" class="dfinput" value="<?php echo ($info["i_title"]); ?>"  style="width:518px;"/></li>

    <li><label>发布者<b>*</b></label><input name="i_name" type="text" class="dfinput" value="<?php echo ($info["i_name"]); ?>"  style="width:318px;"/></li>
    <li><label>图片<b>*</b></label><image src="/Spring/Public<?php echo ($info["i_photo"]); ?>" width="70" height="80"></li>
    <li><label>更改图片<b>*</b></label><input name="i_photo" type="file" class="dfinput" value="<?php echo ($info["i_photo"]); ?>"  style="width:318px;"/><span style="color:#aaa; font-size:12px;">上传大小最好为738x247像素</span></li>        

    <li><label>位置<b>*</b></label>  

    <div class="vocation">

    <select class="select1" name="i_state">

        <option value="2" <?php if($info["i_state"] == 2): ?>selected<?php endif; ?> >部门快讯</option>

        <option value="3" <?php if($info["i_state"] == 3): ?>selected<?php endif; ?> >毕业生快讯</option>

        <option value="4" <?php if($info["i_state"] == 4): ?>selected<?php endif; ?> >行业快讯</option>

        <option value="5" <?php if($info["i_state"] == 5): ?>selected<?php endif; ?> >公告</option>

    </select>

    </div>  

    </li>  

    <li><label>信息内容<b>*</b></label>

    <textarea id="content7" name="i_content" style="width:700px;height:250px;visibility:hidden;"><?php echo ($info["i_content"]); ?></textarea>
     </li>
    <input type="hidden" name="i_id" value="<?php echo ($id); ?>" />



    <li><label>&nbsp;</label><input name="sub" type="submit" class="btn" value="修改信息"/>
</li>

    </ul>

    </form>

    </div>