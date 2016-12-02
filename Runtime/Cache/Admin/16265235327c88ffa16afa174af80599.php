<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>无标题文档</title>

<link href="/Spring/Public/admin/css/style.css" rel="stylesheet" type="text/css" />

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

$(document).ready(function(){

 

$(".select1").uedSelect({

        width : 345           

    });

    $(".select2").uedSelect({

        width : 167  

    });

    $(".select3").uedSelect({

        width : 100

    });

    $("#checked").toggle(function(){

    if($("#checked :checked")){

        $("input[name='co_id[]']").attr("checked","checked");

    }

        },function(){

    if($("#checked :not(:checked)")){

        $("input[name='co_id[]']").removeAttr("checked","checked");

    }

        });

  

  function getclass(){



      var c=$("#grade").val();

     $.get('/Spring/admin.php/Common/getclass',{cid:c},function(data){

       $("#class").html(data);

     });



   };

    a='';

    $("#update").click(function(){

      if(a){

          $('#update').attr('href','/Spring/admin.php/Info/city_add?g_id='+a);

          return true;

      }else{

          alert('请选择需要修改的信息');

          return false;

      }

    });

    $("#delete").click(function(){

      if(a){

          if(confirm('确定删除么？')){

          $('#delete').attr('href',"/Spring/admin.php/Public/delete?table=City&id="+a+"&url=Info/city");

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

    $(".huifu_hid").hide();

    $(".huifu").toggle(function(){

        $(this).next(".huifu_hid").show(0);

        $(this).next(".huifu_hid").next(".huifu_hid").show(0);

    },function(){

        $(this).next(".huifu_hid").hide(0);

        $(this).next(".huifu_hid").next(".huifu_hid").hide(0);

    })

});



</script>

	<div class="place">

    <span>位置：</span>

    <ul class="placeul">

    <li><a href="#">首页</a></li>

    <li><a href="#">学生发布信息</a></li>

    </ul>

    </div>

    

    <div class="rightinfo">

    

    <div class="tools">

    	

    	<ul class="seachform">

    <form action="/Spring/admin.php/Admin/StuInfo/stuInfoSel" method="post">      

    

     <li ><label>标题</label><input name="si_title" type="text" class="scinput" /></li>

      <li ><label>内容</label><input name="si_content" type="text" class="scinput"/></li>

    <li><label>年级</label>  

    <div class="vocation">

     <select name="g_id" id="grade" class="select3" onchange="getclass()">

              <option value="">请选择</option>

            <?php if(is_array($s)): $i = 0; $__LIST__ = $s;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["g_id"]); ?>"><?php echo ($vo["g_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>

     </select>

    </div>

    </li>

    <li><label>审核</label>  

    <div class="vocation">

    <select class="select3" name="si_state">

     <option value="">请选择</option>

     <option value="0" >未审核</option>

     <option value="1">已通过</option>

     <option value="2" >不通过</option>

    </select>

    </div>

    </li>

    <li><label>&nbsp;</label><input name="sub" type="submit" class="scbtn" value="查询"/></li>

    

</form>

    

        </ul>



    </div>

    

    

    <table class="tablelist">

    	<thead>

    	<tr>

        <th>编号<i class="sort"><img src="/Spring/Public/admin/images/px.gif" /></i></th>

        <th>标题</th>

        <th>内容</th>

        <th>发布者</th>

        <th>审核状态</th>

        <th>查看</th>

        <th>操作</th>

        </tr>

        </thead>

        <tbody>

        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$si): $mod = ($i % 2 );++$i;?><tr class="click2" style="border-bottom:1px solid #ccc; border-top:1px solid #ccc;">

                <input type="hidden"  value="<?php echo ($si["si_id"]); ?>" class="poid" />

            <td><?php echo ($key+1); ?></td>

            <td><a href=""><?php echo ($si["si_title"]); ?></a><p>发布时间：<?php echo (date("Y-m-d h:i:s",$si["si_time"])); ?></p></td>

            <td><?php echo ($si["si_content"]); ?></td>

            <td><?php echo ($si["s_name"]); ?></td>

            <td><?php if($si["si_state"] == '0' ): ?><a href="/Spring/admin.php/Admin/StuInfo/StuInfo/stuInfoGo?si_id/<?php echo ($si["si_id"]); ?>"><font color="blue">通过</font></a> | <a href="/Spring/admin.php/Admin/StuInfo/state/si_id/<?php echo ($si["si_id"]); ?>/id/2"><font color="blue">不通过</font></a><?php elseif($si["si_state"] == 1 ): ?><font color="green">已通过</font><?php else: ?><font color="red">未通过</font><?php endif; ?></td>

            <td><?php echo ($si["ri_content"]); ?></td>

            <td><a href="/Spring/admin.php/StuInfo/stuInfoDel?id=<?php echo ($si["si_id"]); ?>" onClick="return confirm('您确定删除吗?')">删除</a></td>

            </tr><?php endforeach; endif; else: echo "" ;endif; ?>

        </tbody>

    </table>

    	<div class="page-next"><?php echo ($page); ?></div><div class="clear"></div></div></div>

        

    

    

    

    </div>

</div>