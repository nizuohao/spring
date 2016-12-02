<?php
namespace Home\Model;
use Think\Model\RelationModel;
/**
 * Enter description here ...
 * @author 茂飞
 */
class StuModel extends RelationModel{
	/**
	 * 关联模型（学生和班级、年级）
	 * Enter description here ...
	 * @var unknown_type
	 */
	protected $_link = array(
			 	'Class'	=>	array(
			 		'mapping_type'		=>	self::BELONGS_TO,
					'class_name'			=>	'Class',						//要关联的模型类名
					'foreign_key'			=>	'c_id',						//关联的外键名称
					'as_fields'				=>	'c_id,c_name,c_gid'
			 ),
			 'Grade'		=>	array(
			 		'mapping_type'		=>	self::BELONGS_TO,
					'class_name'			=>	'Grade',						//要关联的模型类名
					'foreign_key'			=>	's_gid',						//关联的外键名称
					'as_fields'				=>	'g_id,g_name'
			 ),
			 'City'		=>	array(
			 		'mapping_type'		=>	self::BELONGS_TO,
					'class_name'			=>	'City',						//要关联的模型类名
					'foreign_key'			=>	'ci_id',						//关联的外键名称
					'as_fields'				=>	'ci_id,ci_name'
			 ),
			  'Sinfo'		=>	array(
			 		'mapping_type'		=>	self::HAS_ONE,
					'class_name'			=>	'Sinfo',						//要关联的模型类名
					'foreign_key'			=>	'si_sid',						//关联的外键名称
					
			 ),
			 'Resume'		=>	array(
			 		'mapping_type'		=>	self::HAS_ONE,
					'class_name'			=>	'Resume',						//要关联的模型类名
					'foreign_key'			=>	're_sid',						//关联的外键名称
					
			 )
		 );
}