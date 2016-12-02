<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/Spring/Public/admin/css/style.css" rel="stylesheet"
	type="text/css" />
<style type="text/css">
.dfinput {
	width: 100px;
	height: 32px;
	line-height: 32px;
	border-top: solid 1px #a7b5bc;
	border-left: solid 1px #a7b5bc;
	border-right: solid 1px #ced9df;
	border-bottom: solid 1px #ced9df;
	background: url(../images/inputbg.gif) repeat-x;
	text-indent: 10px;
}
;
</style>
<script type="text/javascript" src="/Spring/Public/admin/js/jquery.js"></script><script type="text/javascript">function getGrade(){	//alert('gdsgeg');	var grade=$('select[name="s_gid"]').val();	$.post('/Spring/index.php/Admin/Stu/getClass',{g:grade},	function(data)	{		//alert(data);		$("#class").html(data);	});	}</script>
<script language="javascript">
$(function(){	
	 $("#print").click(function(){
  	 location.href="/Spring/index.php/Admin/Stu/read/print/1";
  	});
	//导航切换
	$(".imglist li").click(function(){
		$(".imglist li.selected").removeClass("selected")
		$(this).addClass("selected");
	});
});
</script>
</head>
<body>
<div class="place"><span>位置：</span>
<ul class="placeul">
	<li><a href=http://localhost/project/Admin.php/admin/index.html>首页</a></li>
	<li><a href="/Spring/index.php/Admin/Stu/student">学生信息</a></li>
</ul>
</div>
<div class="rightinfo">
<div class="tools">
<ul class="toolbar">
	<li class="click"><span><img
		src="/Spring/Public/admin/images/t01.png" /></span> <a href="/Spring/index.php/Admin/Stu/add">添加</a>
	</li>
</ul>
<form action="" method="post">
<ul class="toolbar1" style="float: left">
	<li>&nbsp;&nbsp;年级： <select name="s_gid" id="grade" class="dfinput" onchange="return getGrade()">
		<option value="">---请选择---</option>
		<?php if(is_array($grade)): $i = 0; $__LIST__ = $grade;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["c_gid"]); ?>"><?php echo ($vo["c_gid"]); ?>级</option><?php endforeach; endif; else: echo "" ;endif; ?>
	</select></li>
	<li>&nbsp;&nbsp;班级： <select name="c_id" id="class" class="dfinput">
		<option value="">---请选择---</option>
	</select></li>
	<li>&nbsp;&nbsp;审核状态： <select name="s_state" class="dfinput">
		<option value="">---请选择---</option>
		<option value=3>---未审核---</option>
		<option value=1>---通过---</option>
		<option value=2>---不通过---</option>
	</select></li>
	<li>&nbsp;&nbsp;专业： <select name="s_type" class="dfinput">
		<option value="">---请选择---</option>
		<option value=1>---编程---</option>
		<option value=2>---美工---</option>
	</select></li>
	<li>&nbsp;&nbsp;学生姓名：<input type="text" name="s_name"
		class="dfinput"></li>
	<input type="submit" name="sub" value="查询" class="scbtn" />
</ul><input name="submit" type="button" id="print" class="scbtn" value="导出" />
</form>
</div>

<table class="tablelist">
	<thead>
		<tr>
			<!--<th width="50px"><a id="qx" href="">全选</a></th>-->
			<th>编号</th>
			<th><a href="">用户名</a></th>
			<th><a href="">姓名</a></th>
			<th><a href="">性别</a></th>
			<th><a href="">年级</a></th>
			<th><a href="">班级</a></th>
			<th><a href="">期望城市</a></th>
			<th><a href="">专业</a></th>
			<th><a href="">手机号</a></th>
			<th><a href="">邮箱</a></th>
			<th><a href="">头像</a></th>
			<th><a href="">审核状态</a></th>
			<th><a href="">操作</a></th>
		</tr>
	</thead>
	<tbody>
		<?php if(is_array($vole)): $i = 0; $__LIST__ = $vole;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="fo">
			<!-- <td class="imgtd"><input type="checkbox" name="check[]" value="<?php echo ($vo["s_id"]); ?>" /></td> -->
			<td><?php echo ($vo["s_id"]); ?></td>
			<td><?php echo ($vo["s_user"]); ?></td>
			<td><?php echo ($vo["s_name"]); ?></td>
			<td><?php echo ($vo['s_sex']==1?'男':'女'); ?></td>
			<td><?php echo ($vo["g_name"]); ?>级</td>
			<td><?php echo ($vo["c_name"]); ?></td>
			<!-- <td><?php echo ($vo["ci_id"]); ?></td> -->
			<td><?php if(is_array($vole_city)): $i = 0; $__LIST__ = $vole_city;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v_city): $mod = ($i % 2 );++$i; echo ($v_city['ci_id']==$vo['ci_id']?$v_city['ci_name']:''); endforeach; endif; else: echo "" ;endif; ?></td>
			<td><?php if($vo["s_type"] == 1): ?>编程<?php else: ?>美工<?php endif; ?></td>
			<td><?php echo ($vo["s_tel"]); ?></td>
			<td><?php echo ($vo["s_email"]); ?></td>
			<!--<?php if($vo["s_head"] == ''): ?><td>还未上传头像</td><?php else: ?>
			<td><a href="/Spring/public/uploads/stuhead/<?php echo ($vo["s_head"]); ?>"
				target="_blank">查看大图</a></td><?php endif; ?>-->
			<td><a href="/Spring/Public/Uploads/StuHead/slt/s_<?php echo ($vo["s_head"]); ?>"
				target="_blank">查看大图</a></td>
			<!--<td class="click"><a-->
			<!--href="/Spring/index.php/Admin/Stu/state/id/<?php echo ($vo['s_id']); ?>/state/<?php echo ($vo['s_state']); ?>"><?php echo ($vo['s_state']==1?'已审核':'<b>未审核</b>'); ?></a></td>-->
			<td>
			<?php if($vo["s_state"] == '3' ): ?><a href="/Spring/index.php/Admin/Stu/state/s_id/<?php echo ($vo["s_id"]); ?>/id/1"><font color="blue">通过</font></a> | <a href="/Spring/index.php/Admin/Stu/state/s_id/<?php echo ($vo["s_id"]); ?>/id/2"><font color="blue">不通过</font></a><?php elseif($vo["s_state"] == 1 ): ?><font color="green">已通过</font><?php else: ?><font color="red">未通过</font><?php endif; ?></td>
			<td><a href="/Spring/index.php/Admin/Stu/edit/id/<?php echo ($vo["s_id"]); ?>">修改</a> | <a
				href="/Spring/index.php/Admin/Stu/del/id/<?php echo ($vo["s_id"]); ?>">删除</a></td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	</tbody>
</table>
<div class="clear"></div>
<div class="pagin">
<div class="message"><?php echo ($page); ?></div>
</div>
</div>
</body>
<script language="javascript">
	$(".classlist li").css({width:"300px",height:"170px",overflow:"true"});
	$("#gr").change(function(){
		var g_id=$("#gr").val();
		$.get("/Spring/admin.php/Public/getClass",{c_gid:g_id},function(data){
			$("#cl").html(data);
		})
	});

	$(".state").change(function(){
		id	=	$(this).attr("id");
		val	=	$(this).val();
		$.post("/Spring/index.php/Admin/Stu/state",{id:id,val:val},function(data){
			alert(data);
				});
	})
</script>
</html>