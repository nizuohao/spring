<?php if (!defined('THINK_PATH')) exit();?><link href="/Spring/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/Spring/Public/admin/css/select.css" rel="stylesheet" type="text/css" />
<link href="/Spring/Public/templates/default/css/list-global.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/Spring/Public/admin/js/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="/Spring/Public/admin/js/select-ui.min.js"></script>
<script type="text/javascript" src="/Spring/Public/admin/editor/kindeditor.js"></script>
<script type="text/javascript" src="/Spring/Public/admin/js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    a='';
    $("#update").click(function(){
      if(a){
          $('#update').attr('href','/Spring/admin.php/Info/grade_add?g_id='+a);
          return true;
      }else{
          alert('请选择需要修改的信息');
          return false;
      }
    });
    $("#delete").click(function(){
      if(a){
          if(confirm('确定删除么？')){
          $('#delete').attr('href',"/Spring/admin.php/Public/delete?table=Grade&id="+a+"&url=Info/grade");
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
    $('.imgtable tbody tr:odd').addClass('odd');
});

</script>
	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
    <li><a href="#">数据表</a></li>
    <li><a href="#">年级内容</a></li>
    </ul>
    </div>
    
    <div class="rightinfo">
    
    <div class="tools">
    	
    	<ul class="toolbar">
    	
        <li ><a href="/Spring/admin.php/Admin/Info/grade_add"><span><img src="/Spring/Public/admin/images/t01.png" /></span>添加</a></li>
        
        <li class="click"><a href="" id='update'><span><img src="/Spring/Public/admin/images/t02.png" /></span>修改</a></li>
            <li><a href="" id='delete'><span><img src="/Spring/Public/admin/images/t03.png" /></span>删除</a></li>
        </ul>

    </div>
    
    
    <table class="tablelist">
    	<thead>
    	<tr>
        <th>编号<i class="sort"><img src="/Spring/Public/admin/images/px.gif" /></i></th>
        <th>年级</th>
        <th>修改 | 删除</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($grade)): $i = 0; $__LIST__ = $grade;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gra): $mod = ($i % 2 );++$i;?><tr class="click2">
            <input type="hidden"  value="<?php echo ($gra["g_id"]); ?>" class="poid" />
        <td><?php echo ($gra["g_id"]); ?></td>
        <td><a href="/Spring/admin.php/Admin/Info/grade_add?g_id=<?php echo ($gra["g_id"]); ?>"><?php echo ($gra["g_name"]); ?>级</a></td>
        <td><a href="/Spring/admin.php/Admin/Info/grade_update?g_id=<?php echo ($gra["g_id"]); ?>">修改</a> | <a href="/Spring/admin.php/Admin/Info/gradeDel?id=<?php echo ($gra["g_id"]); ?>">删除</a></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    
   
    	<div class="page-next"><?php echo ($page); ?></div><div class="clear"></div></div></div>
        
    
    
    
    </div>
</div>