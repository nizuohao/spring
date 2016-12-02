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

    $("#delete").click(function(){
      if(a){
          if(confirm('确定删除么？')){
          $('#delete').attr('href',"/Spring/admin.php/Public/delete?table=Info&id="+a+"&url=Info/info");
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
    KE.show({
        id : 'content7',
        cssPath : './index.css'
    });
        $(".select1").uedSelect({
        width : 345           
    });
    $(".select2").uedSelect({
        width : 100  
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
    <li><a href="#">合作企业</a></li>
    </ul>
    </div>
    
    <div class="rightinfo overflow">
    
    <div class="tools">
    	<ul class="toolbar overflow" style="float:left;">
        <li><a href="/Spring/admin.php/Hezuo/hezuoAdd" target="rightFrame"><span><img src="/Spring/Public/admin/images/t01.png" /></span>添加</a></li>
       
            <li><a href="" id='delete'><span><img src="/Spring/Public/admin/images/t03.png" /></span>删除</a></li>
        </ul>
      
        <div id="tab2" class="" style="float:right"> 
          <form action="/Spring/admin.php/Hezuo/hezuoSel" method="post">
          <ul class="seachform">
            <li><label>企业姓名</label><input name="hz_name" type="text" class="scinput" /></li>
             <li><label>企业简介</label><input name="hz_content" type="text" class="scinput" /></li>
             <li><label>企业链接</label><input name="hz_url" type="text" class="scinput" /></li>
            <li><label>&nbsp;</label><input name="sub" type="submit" class="scbtn" value="查询"/></li>
          </ul>
          </form>
        </div>
      </div>
    <table class="imgtable">
    
    <thead>
    <tr>
    <th width="220">合作企业</th>
    <th width="*">简介</th>
    <th width="180">图片</th>
    <th width="180">企业链接</th>
    <th width="120">操作</th>
    </tr>
    </thead>
    
    <tbody style="">
    <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$info): $mod = ($i % 2 );++$i;?><tr height="30" class="click2">
            <input type="hidden" value="<?php echo ($info["hz_id"]); ?>" class="poid" />
        <td><a href="/Spring/admin.php/Hezuo/add/hz_id/<?php echo ($info["hz_id"]); ?>" style="font-weight:bold; font-size:20px"><?php echo ($info["hz_name"]); ?></a><p>添加时间：<?php echo (date("Y-m-d H:i:s",$info["hz_time"])); ?></p></td>
        <td><?php echo ($info["hz_content"]); ?></td>
        <td><image src="/Spring/Public/Uploads/Hezuo/<?php echo ($info["hz_logo"]); ?>" width="100" /></td>
        <td><a href="<?php echo ($info["hz_url"]); ?>" target="_top"><?php echo ($info["hz_url"]); ?></a></td>
<!--            <?php if($si["si_state"] == 0): ?><a href="/Spring/admin.php/StuInfo/state?id=<?php echo ($si["si_id"]); ?>" style="color:#f00;" onclick="return confirm('确定通过审核么？')" >未审核</a><?php else: ?><font color="#0f0">已审核</font><?php endif; ?>-->
        <td><a href="/Spring/index.php/Admin/Hezuo/hezuoUpde?hz_id=<?php echo ($info["hz_id"]); ?>">修改 </a>| <a href="/Spring/index.php/Admin/Hezuo/hezuoDel?id=<?php echo ($info["hz_id"]); ?>" onClick="return confirm('您确定删除吗?')">删除</a></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </tbody>
    
    </table>
<div class="page-next"><?php echo ($page); ?></div><div class="clear"></div>
</div>