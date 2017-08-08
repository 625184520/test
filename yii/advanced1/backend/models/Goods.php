<?php 
namespace backend\models;

use yii;
use db;
use yii\base\Model;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
header("content-type:text/html;charset=utf-8");
class Goods extends Model
{
	public $g_id;
	public $g_name;
	public $g_price;
	public function getSessionUsername(){
		$username=Yii::$app->session['username'];
		return $username;
	}
	public function rules()
	{
		return [];
	}
	public function attributeLabels()
	{
		return [
			'g_id'=>'',
			'g_name'=>'商品名',
			'g_price'=>'价格',
		];
	}
	public function getList()
	{
		$sql="select * from goods";
		return Yii::$app->db->createCommand($sql)->queryAll();
	}
	public function doDel($id)
	{
		$sql="delete from goods where g_id=$id";
 		$res=Yii::$app->db->createCommand($sql)->execute();
 		if($res){
	 		 $username=$this->getSessionUsername();
	 		 $time=time();
	 		 $sql="insert into blog values('','$username','删除ID为".$id."的数据','$time')";
	  		 return  Yii::$app->db->createCommand($sql)->execute();		
 		}
 		
	}
	public function doDele($id)
	{
		$sql="delete from goods where g_id in ($id)";
 		Yii::$app->db->createCommand($sql)->execute();
		 $username=$this->getSessionUsername();
 		 $time=time();
 		 $sql="insert into blog values('','$username','删除ID为".$id."的数据','$time')";
  		 return  Yii::$app->db->createCommand($sql)->execute(); 		
	}
	public function doAdd($data)
	{
		$g_name=$data['g_name'];
		$g_price=$data['g_price'];
        $ids = array();
		foreach($g_name as $k => $v){
            $goods_name = $v;
            $goods_price = $g_price[$k];
            Yii::$app->db->createCommand()->insert('goods', ['g_name'=>$goods_name, 'g_price'=>$goods_price])->execute();
		   $ids[] = Yii::$app->db->getLastInsertId();
		}
		 $ids=implode(",", $ids);
		 $username=$this->getSessionUsername();
 		 $time=time();
 		 $sql="insert into blog values('','$username','添加ID为".$ids."的数据','$time')";
  		 return  Yii::$app->db->createCommand($sql)->execute();

/*		$arr=array();
		foreach($data['g_name'] as $k=>$v)
		{
			$arr[]=[$v,$data['g_price'][$k]];
		}
			// print_r($arr);die;
		Yii::$app->db->createCommand()->batchInsert('goods', ['g_name', 'g_price'],$arr)->execute();*/
/*		$datas= array_combine($g_name, $g_price);
		print_r($datas);die;
		$arr=array();
		foreach($datas as $k=>$v)
		{
			$arr[]=[$k,$v];
		}
		return Yii::$app->db->createCommand()->batchInsert('goods', ['g_name', 'g_price'],$arr)->execute();*/
	}
	public function getone($id)
	{
		$sql="select * from goods where g_id=$id";
		return Yii::$app->db->createCommand($sql)->queryOne();	
	}
	public function updateok($post)
	{
		$g_id=$post['Goods']['g_id'];
		$g_name=$post['Goods']['g_name'];
		$g_price=$post['Goods']['g_price'];
		$sql="update goods set g_name='$g_name',g_price='$g_price' where g_id=$g_id";
        Yii::$app->db->createCommand($sql)->execute();
		 $username=$this->getSessionUsername();
 		 $time=time();
 		 $sql="insert into blog values('','$username','修改ID为".$g_id."的数据','$time')";
  		 return  Yii::$app->db->createCommand($sql)->execute();	   	
	}
}




 ?>