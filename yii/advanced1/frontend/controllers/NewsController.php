<?php 
namespace frontend\controllers;

use yii\web\Controller;
use frontend\models\News;

class NewsController extends Controller
{
	public function actionIndex()
	{
		$model=new News();
		//添加：
		// $model->id="6";
		// $model->title="《激战》";
		// $model->content="《激战》";
		// $model->save();
		//展示：
		// $list=News::find()->asarray()->all();//全部
		// $res=News::find()->where(['id'=>6])->asarray()->one();// 单条
		//删除：(删除首先要查询)
		// $res=News::findOne(6);
		// $res->delete();
		// 修改：
		$res=News::findOne(5);
		$res->id="5";
		$res->title="《激战》";
		$res->content="《激战》";
		$res->save();
		// echo "<pre>";
		// print_r($res);
	}
}












 ?>