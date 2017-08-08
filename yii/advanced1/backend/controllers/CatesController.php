<?php 
namespace backend\controllers;

use yii;
use yii\web\Controller;
use backend\models\Cates;

class CatesController extends Controller
{
	public function actionForm()
	{
		$model=new Cates();
		return $this->render('form',['model'=>$model]);
	}
	public function actionAdd()
	{
		$post=Yii::$app->request->post();
		$model=new Cates();
		$res=$model->getAdd($post);
		if($res){
			return $this->redirect('?r=cates/index');
		}else{
			return $this->redirect('?r=cates/form');
		}
	}
	public function actionIndex()
	{
		$model=new Cates();
		$list=$model->getList();
		return $this->render('index',['list'=>$list]);
	}
	public function actionDel()
	{
		$id=Yii::$app->request->get('id');
		$model=new Cates();
		$res=$model->getDel($id);
		if($res)
		{
			return $this->redirect('?r=cates/index');			
		}

	}
	public function actionUpdate()
	{
		$id=Yii::$app->request->get('id');
		$model=new Cates();
		$res=$model->getUpdate($id);
		return $this->render('update',['model'=>$model,'res'=>$res]);
	}
	public function actionUpdateok()
	{
		$post=Yii::$app->request->post();
		$model=new Cates();
		$res=$model->getUpdateok($post);
		if($res){
			return $this->redirect('?r=cates/index');
		}else{
			return $this->redirect('?r=cates/update');
		}
	}
}


 ?>