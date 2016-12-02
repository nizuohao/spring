<?php if (!defined('THINK_PATH')) exit();?><link href="/Spring/Public/admin/css/style.css" rel="stylesheet"
	type="text/css" />
<link href="/Spring/Public/admin/css/select.css" rel="stylesheet"
	type="text/css" />
<link href="/Spring/Public/templates/default/css/list-global.css"
	rel="stylesheet" type="text/css">
<script type="text/javascript"
	src="/Spring/Public/admin/js/jquery.idTabs.min.js"></script>
<script type="text/javascript"
	src="/Spring/Public/admin/js/select-ui.min.js"></script>
<script type="text/javascript"
	src="/Spring/Public/admin/editor/kindeditor.js"></script>
<script type="text/javascript" src="/Spring/Public/admin/js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    a='';
    $("#update").click(function(){
      if(a){
          $('#update').attr('href','/Spring/admin.php/Resume/add?id='+a);
          return true;
      }else{
          alert('请选择需要修改的信息');
          return false;
      }
    });
    $("#delete").click(function(){
      if(a){
          if(confirm('确定删除么？')){
          $('#delete').attr('href',"/Spring/index.php/Admin/Resume/del");
          return true;
          }else{ return false;}
      }else{
          alert('请选择需要删除的信息');
          return false;
      }
    });
    $(".click2").click(function(){
    a = $(this).children('.poid').val();
        $(this).addClass('ccc').siblings('tr').removeClass('ccc');
  });
});

</script>
<div class="place"><span>位置：</span>
<ul class="placeul">
	<li><a href="#">首页</a></li>
	<li><a href="#">信息发布</a></li>
</ul>
</div>

<div class="rightinfo overflow">

<div class="tools overflow">
<form action="" method="post">
<ul class="toolbar overflow">
	<!--<li><a href="/Spring/index.php/Admin/Resume/add" target="rightFrame"><span><img
		src="/Spring/Public/admin/images/t01.png" /></span>添加</a></li>
	<li class="click"><a href="/Spring/index.php/Admin/Resume/edit" id='update'><span><img
		src="/Spring/Public/admin/images/t02.png" /></span>修改</a></li>
	--><li><a href="/Spring/index.php/Admin/Resume/del" id='delete'><span><img
		src="/Spring/Public/admin/images/t03.png" /></span>删除</a></li>
	<li>&nbsp;期望职位：<input type='text' name="re_job" class="dfinput" style="width:100px" /></li>
	<li>&nbsp;期望薪资：<input type='text' name="re_money" class="dfinput" style="width:100px" /></li>
	<li>&nbsp;期望城市：<input type='text' name="re_city" class="dfinput" style="width:100px" /></li>
	<li>&nbsp;工作经验：<input type='text' name="re_scale" class="dfinput" style="width:100px" /></li>
	<input type="submit" name="sub" value="查询" class="btn" />
</ul>
</form>
</div>
<table class="imgtable">
	<thead>
		<tr>
			<th>编号</th>
			<th>姓名</th>
			<th>期望职位</th>
			<th>期望薪资</th>
			<th>期望城市</th>
			<th width="200px">自我介绍</th>
			<th>工作经验</th>
			<th>手机号</th>			<th>操作</th>
		</tr>
	</thead>
	<tbody style="">
		<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr height="30" class="click2">
			<td><?php echo ($i); ?></td>
			<td><?php echo ($vo["s_name"]); ?></td>
			<input type="hidden" value="<?php echo ($vo["re_id"]); ?>" class="poid" />
			<td><a href=""><?php echo ($vo["re_job"]); ?></a>
			<p>发布时间：<?php echo (date("Y-m-d H:i:s",$vo["re_time"])); ?></p>
			</td>
			<td><?php echo ($vo["re_money"]); ?></td>
			<td><?php echo ($vo["re_city"]); ?></td>
			<td><?php echo (mb_substr($vo["re_text"],0,30,utf8)); ?>...</td>
			<td><?php echo ($vo["re_scale"]); ?>年</td>
			<td><?php echo ($vo["re_tel"]); ?></td>			<td><a href="/Spring/index.php/Admin/Resume/delete/re_id/<?php echo ($vo["re_id"]); ?>" class="tablelink"> 删除</a></td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	</tbody>
</table>
<div class="page-next"><?php echo ($page); ?></div>
<div class="clear"></div>
</div>
<script type="text/javascript">
    function update(){
    alert(a);
//      if(a){
//          $('#update').attr('href','/Spring/admin.php/Info/policy_add?po_id='+a);
//          return true;
//      }else{
//          alert('请选择需要修改的信息');
//          return false;
//      }
}
	$('.imgtable tbody tr:odd').addClass('odd');
	$(".classlist li").css({width:"300px",height:"170px",overflow:"true"});
	</script>
</div>