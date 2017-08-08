<?php 
namespace frontend\models;
use yii;
use yii\base\Model;
// use yii\widgets\ActiveForm;
// use yii\helpers\Html;
header("content-type:text/html;charset=utf-8");
class Form extends Model
{
	public $name;
	public $pwd;
	public $sex;
	public $hobby;
	public $age;
	public $introduction;

	public function rules()
	{
		return [
			// ['name','email'],
			// [['name','pwd','sex','hobby','age','introduction'],'required'],
		];
	}

	public function attributeLabels()
	{
		return [
			'name'=>'用户名',
			'pwd'=>'密码',
			'sex'=>'性别',
			'hobby'=>'爱好',
			'age'=>'年龄',
			'introduction'=>'简介',
		];
	}
	static public function getage($start,$end)
	{
		$arr=array();
		for($i=$start;$i<=$end;$i++){
			$arr[$i]=$i;
		}
		return $arr;
	}
	public function getHobby($hobbys)
	{
		$arr=array();
		foreach($hobbys as $k=>$v)
		{
			$arr[$v['id']]=$v['title'];
		}		
		return $arr;
	}
	public function getAdd($arr,$img)
	{
		$name=$arr['name'];
		$pwd=$arr['pwd'];
		$sex=$arr['sex'];
		$hobby=implode(',',$arr['hobby']);
		$age=$arr['age'];
		$introduction=$arr['introduction'];
		$sql="insert into forms values('','$name','$pwd','$sex','$hobby','$age','$introduction','$img')";
		return Yii::$app->db->createCommand($sql)->execute();
	}
	public function getShow()
	{
		$sql="select * from forms";
		$data=Yii::$app->db->createCommand($sql)->queryAll();
		return $data;
	}

}




 ?>