<?php 
namespace backend\controllers;

use yii;
use yii\web\Controller;
use backend\models\Goods;

class GoodsController extends Controller
{
	// 表单
	public function actionForm()
	{
		$model=new Goods();
		return $this->render('form',['model'=>$model]);
	}
	//添加
	public function actionAdd()
	{
		$model=new Goods();
		$post=Yii::$app->request->post();

		$data=$post['Goods'];
		$ids = $model->doAdd($data);
		return $this->redirect('?r=goods/index');	
	}
	// 展示
	public function actionIndex()
	{

		$model=new Goods();
		$list=$model->getList();
		return $this->render('index',['list'=>$list]);
	}
	// 删除
	public function actionDel()
	{
		$model=new Goods();
		$id=Yii::$app->request->get('id');
		$model->doDel($id);
		return $this->redirect('?r=goods/index');
	}
	// 批量删除
	public function actionDele()
	{
		$model=new Goods();
		$id=Yii::$app->request->get('id');
		$model->doDele($id);
		return $this->redirect('?r=goods/index');		
	}
	//修改查询
	public function actionUpdate()
	{
		$model=new Goods();
		$id=Yii::$app->request->get('id');
		$res=$model->getone($id);
		return $this->render('update',['model'=>$model,'res'=>$res]);
	}
	//执行修改：
	public function actionUpdateok()
	{
		$model=new Goods();
		$post=Yii::$app->request->post();
		$model->updateok($post);
		return $this->redirect('?r=goods/index');
	}
}