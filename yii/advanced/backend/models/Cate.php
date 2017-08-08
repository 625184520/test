<?php 
namespace backend\models;

use yii\db\ActiveRecord;

class Cate extends ActiveRecord
{
	public static function tableName()
	{
		return "cate";
	}
	public function getcatelist(){
        $catelist=Cate::find()
        		->asArray()
        		->all();
        $arr=array();
        foreach($catelist as $k=>$v){
        	$arr[$v['c_id']]=$v['c_name'];
        }
        return $arr;		
	}
}



 ?>