<?php 
namespace backend\models;

use yii\db\ActiveRecord;

class Cates extends ActiveRecord
{
	public $c_ids;
	public $c_names;
	public function rules()
	{
		return [];
	}
	public function attributeLabels()
	{
		return [
			'c_ids'=>'',
			'c_names'=>'分类名称'
		];
	}
	public static function  tableName()
	{
		return "cates";
	}
	public function getAdd($post)
	{
		$c_names=$post['Cates']['c_names'];
		$model=new Cates();
		$model->c_name=$c_names;
		return $model->save();
	}
	public function getList()
	{
		$list=Cates::find()
					->asArray()
					->all();
	    return $list;
	}
	public function getDel($id)
	{
		$list=Cates::findOne($id);
		return $list->delete();
	}
	public function getUpdate($id)
	{
		$list=Cates::findOne($id);
		return $list;
	}
	public function getUpdateok($post)
	{
		$c_ids=$post['Cates']['c_ids'];
		$c_names=$post['Cates']['c_names'];
		$model=Cates::findOne($c_ids);		
		$model->c_name=$c_names;
		return $model->save();
	}
	public function getcatelist()
	{
		$list=Cates::find()
					->asArray()
					->all();
		$arr=array();
		foreach($list as $k=>$v)
		{
			$arr[$v['c_id']]=$v['c_name'];
		}
	    return $arr;		
	}
}



 ?>