<?php
namespace Admin\Model;
use Think\Model;
class AdminModel extends Model{
    protected $_auto = array (
       //array('status','1'),  // 新增的时候把status字段设置为1
       array('ad_pwd','md5',3,'function') , // 对password字段在新增和编辑的时候使md5函数处理         
       //array('name','getName',3,'callback'), // 对name字段在新增和编辑的时候回调getName方法         
       //array('ad_time','time',3,'function'), // 对update_time字段在更新的时候写入当前时间戳     
       );
}