<?php 
namespace backend\controllers;

use yii;
use yii\web\Controller;
use backend\models\Demo;

class DemoController extends Controller{
	public function actionForm()
	{
		$model=new Demo();
		$data=$model->gethobby();
		$age=$model->getage(18,80);
		return $this->render('form',['model'=>$model,'data'=>$data,'age'=>$age]);
	}
	public function actionAdd(){
		$post=Yii::$app->request->post();
		// print_r($post);die;
		$model=new Demo();
		$res=$model->getAdd($post);
		if($res)
		{
			return $this->redirect('?r=demo/index');
		}
	}
	public function actionIndex()
	{
		$model=new Demo();
		$list=$model->getlist();
		return $this->render('index',['list'=>$list]);
	}
	public function actionDel()
	{
		$id=Yii::$app->request->get('id');
		$model=new Demo();
		$res=$model->getDel($id);
		if($res){
			return $this->redirect('?r=demo/index');
		}
	}
	public function actionUpdate(){
		$id=Yii::$app->request->get('id');
		$model=new Demo();
		$res=$model->getUpdate($id);
		$res['hobby']=explode(',', $res['hobby']);
		// $aa=$res['hobby'];
		// print_r($aa);die;
		$data=$model->gethobby();
		$age=$model->getage(18,80);
		return $this->render('update',['model'=>$model
			,'res'=>$res,'data'=>$data,'age'=>$age]);		
	}
	public function actionUpdateok()
	{
		$post=Yii::$app->request->post();
		$model=new Demo();
		$res=$model->getUpdateok($post);
		if($res)
		{
			return $this->redirect('?r=demo/index');
		}
	}
}


 ?>