<?php if (!defined('THINK_PATH')) exit();?><center>
<h2><?php echo ($hz["hz_name"]); ?>的就业回执表</h2>
<h4 style="margin:0;text-align:left;text-indent:4em;">1、就业感想和经验</h4>
<table border="1" cellspacing='0' width="1200px">
<tr height="40px">
	<td width="200px">姓名</td>
	<td><?php echo ($hz["hz_name"]); ?></td>
	<td width="200px">手机</td>
	<td><?php echo ($hz["hz_tel"]); ?></td>
</tr>
<tr height="40px">
	<td>QQ</td>
	<td><?php echo ($hz["hz_qq"]); ?></td>
	<td>邮箱</td>
	<td><?php echo ($hz["hz_email"]); ?></td>
</tr>
<tr height="40px">
	<td>单位名称</td>
	<td><?php echo ($hz["hz_cname"]); ?></td>
	<td>岗位</td>
	<td><?php echo ($hz["hz_job"]); ?></td>
</tr>
<tr height="40px">
	<td>待遇</td>
	<td><?php echo ($hz["hz_dy"]); ?></td>
	<td>工作是否满意</td>
	<td><?php echo ($hz["hz_goods"]); ?></td>
</tr>
<tr height="40px">
	<td>带队老师</td>
	<td colspan="3"><?php echo ($hz["hz_teacher"]); ?></td>
	
</tr>
<tr height="200px">
	<td colspan="4"><img src="/Spring/Public/Uploads/hui/<?php echo ($hz["hz_photo"]); ?>" width="300" /></td>
	
</tr>
<tr>
	<td colspan="4" align="center" height="40px">就业感言</td>
	
</tr>
<tr>
	<td colspan="4" style="text-indent:2em;height:200px;" valign="top"><?php echo ($hz["hz_desc"]); ?></td>
	
</tr>

</table>
<h4 style="margin:0;text-align:left;text-indent:4em;margin-top:20px">2、列出你所面试公司总数和公司名称</h4>
<table border="1" cellspacing='0' width="1200px">
<tr height="40px">
	<td >公司名称</td>
	<td>应聘职位</td>
	<td >应聘时间</td>
	<td>面试是否通过</td>
	<td>面试收获</td>
</tr>
<?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr height="40px">
	<td><?php echo ($vo["ms_cname"]); ?></td>
	<td><?php echo ($vo["ms_job"]); ?></td>
	<td ><?php echo ($vo["ms_time"]); ?></td>
	<td><?php echo ($vo['ms_state']=='1' ?'是':'否'); ?></td>
	<td><?php echo ($vo["ms_get"]); ?></td>
</tr><?php endforeach; endif; else: echo "" ;endif; ?>

</table>
<h4 style="margin:0;text-align:left;text-indent:4em;margin-top:20px">列出你所面试通过的单位名称、职位、待遇（包括试用期和转正后）入职时间、就业城市</h4>
<table border="1" cellspacing='0' width="1200px">
<tr height="40px">
	<td >公司名称</td>
	<td width="200px">应聘职位</td>
	<td width="150px">入职时间</td>
	<td>待遇</td>
	<td>就业城市</td>
	<td width="150px">是否在当前工作单位</td>
</tr>
<?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr height="40px">
	<td><?php echo ($vo["ms_cname"]); ?></td>
	<td><?php echo ($vo["ms_job"]); ?></td>
	<td ><?php echo ($vo["ms_rtime"]); ?></td>
	<td><?php echo ($vo["ms_dy"]); ?></td>
	<td><?php echo ($vo["ms_city"]); ?></td>
	<td><?php echo ($vo['ms_in']==1?'是':'否'); ?></td>
</tr><?php endforeach; endif; else: echo "" ;endif; ?>

</table>
<input type="button" class="print_btn" value="打印" onClick="window.print()" />
</center>