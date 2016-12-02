<?php
namespace Home\Model;
use Think\Model\RelationModel;
class ApplyModel extends RelationModel{
	protected $_link	=	array(
		'Student'	=>	array(
			 		'mapping_type'		=>	BELONGS_TO,
					'class_name'			=>	'Student',						//要关联的模型类名
					'foreign_key'			=>	's_id',						//关联的外键名称
					'as_fields'				=>	's_id,s_name,s_head,s_birthday,s_sex'
					)
		);
		
		public function tm()
		{
		 	return date("Y/m/d");
		}

		protected $_auto = array (
		 	array('a_time','tm',1,'callback'),
		);
}