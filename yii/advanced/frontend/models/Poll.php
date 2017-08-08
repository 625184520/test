<?php 
namespace frontend\models;

use yii;
use yii\base\model;
header("content-type:text/html;charset=utf-8");

class Poll extends Model
{
	public $name;
	public function rules()
	{
		return [
		['name','required'],
		];
	}
	public function attributeLabels()
	{
		return [
			'name'=>'请选择你喜欢的篮球明星：',
		];
	}
}






 ?>