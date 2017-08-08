<?php 
namespace backend\models;

use yii;
use db;
use yii\base\Model;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

class Demo extends Model
{
	public $id;
	public $name;
	public $sex;
	public $hobby;
	public $age;
	public function rules()
	{
		return [];
	}
    public function attributeLabels(){
        return[
        	'id'=>'',
            'name'=>'用户名',
            'sex'=>'性别',
            'hobby'=>'爱好',
            'age'=>'年龄'
        ];
    }
    public function gethobby()
    {
    	return ['篮球'=>'篮球','足球'=>'足球','羽毛球'=>'羽毛球'];
    }
    public function getage($start,$end){
        $arr = array();
        for($i = $start;$i<=$end;$i++){
            $arr[$i] = $i;
        }
        return $arr;
    }
    public function getAdd($post)
    {
    	$name=$post['Demo']['name'];
    	$sex=$post['Demo']['sex'];
    	$hobby=$post['Demo']['hobby'];
    	$age=$post['Demo']['age'];
    	$hobby=implode(',',$hobby);
    	$sql="insert into demo values('','$name','$sex','$hobby','$age')";
  		return  Yii::$app->db->createCommand($sql)->execute();   	

    }
    public function getlist(){
    	$sql="select * from demo";
    	return Yii::$app->db->createCommand($sql)->queryAll();  
    }
    public function getDel($id)
    {
    	$sql="delete from demo where id=$id";
   		return  Yii::$app->db->createCommand($sql)->execute();     	
    }
    public function getUpdate($id)
    {
    	$sql="select * from demo where id=$id";
    	return Yii::$app->db->createCommand($sql)->queryOne(); 
    }
    public function getUpdateok($post)
    {
        $id=$post['Demo']['id'];
        $name=$post['Demo']['name'];
        $sex=$post['Demo']['sex'];
        $hobby=$post['Demo']['hobby'];
        $age=$post['Demo']['age'];
        $hobby=implode(',',$hobby);  
        $sql="update demo set name='$name',sex='$sex',hobby='$hobby',age='$age' where id=$id";
        return  Yii::$app->db->createCommand($sql)->execute(); 	
    }
}