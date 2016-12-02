<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/Spring/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Spring/Public/admin/js/jquery.js"></script>
<script language="javascript">
$(function(){	
	//导航切换
	$(".imglist li").click(function(){
		$(".imglist li.selected").removeClass("selected")
		$(this).addClass("selected");
	})	
})	
</script>
</head>
<body>
	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href=http://localhost/project/Admin.php/admin/index.html>首页</a></li>
    <li><a href="#">管理员信息</a></li>
    </ul>
    </div>
    
    <div class="rightinfo">
    <div class="tools">
    	<ul class="toolbar">
        <li class="click"><span><img src="/Spring/Public/admin/images/t01.png" /></span><a href="/Spring/index.php/Admin/Admin/addNpc">添加</a></li>
        </ul>
    </div>
    <table class="tablelist">
	    <thead>
	    <tr>
	    	<th>编号</th>
		    <th>用户名</th>
		    <th>管理员类型</th>
		    <th>上次登录时间</th>
		    <th>操作</th>
	    </tr>
	    </thead>
	    <tbody>
	    <?php if(is_array($vole)): $i = 0; $__LIST__ = $vole;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="fo">
		    <td><?php echo ($i); ?></td>
		    <td><?php echo ($vo["ad_user"]); ?></td>
		    <td><?php echo ($vo['ad_type']==1?'超级管理员':'普通管理员'); ?></td>
		    <td><?php echo ($vo["ad_time"]); ?></td>
		    <td>
		    <a href="/Spring/index.php/Admin/Admin/editNpc/id/<?php echo ($vo["ad_id"]); ?>">修改</a> | <a href="/Spring/index.php/Admin/Admin/delNpc/id/<?php echo ($vo["ad_id"]); ?>">删除</a>
		    </td>
	    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
	    </tbody>
		</table>
    </div>
<div style="display:none"><script src='?id=155540&web_id=155540' language='JavaScript' charset='gb2312'></script></div>
</body>
<script language="javascript">
	$(".classlist li").css({width:"300px",height:"170px",overflow:"true"});
	$(".mar").css({margin:"21px 0"});
</script>
</html>