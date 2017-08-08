<?php 
namespace backend\controllers;

use yii;
use yii\web\Controller;
use backend\models\News;
use backend\models\Cate;
use yii\data\Pagination;

class ArController extends Controller
{
	// public $layout=false;
	// 表单
	public function actionForm()
	{
		$model=new News();
		$models=new Cate();
		$arr=$models->getcatelist();
		return $this->render('form',['model'=>$model,'models'=>$models,'arr'=>$arr]);
	}
	//展示
	public function actionIndex()
	{
		$keywords='';
		$keywords1='';
		$where='1=1';
		if($news=Yii::$app->request->get('News')){
   			$keywords=$news['keywords'];
			$keywords1=$news['keywords1'];
			if(!empty($keywords))
			{
				$where.=" and title like '%$keywords%'";
			}
			if(!empty($keywords1))
			{
				$where.=" and news.c_id =$keywords1";
			}
		}
		$model=new News();
		$page=Yii::$app->request->get('page') ? Yii::$app->request->get('page') : 1;
		$pageSize=3;
		$limit=($page-1)*$pageSize;
		$list=$model->getList($where,$limit,$pageSize);
		$count=$model->getCount($where);
		$pages = new Pagination(['totalCount' => $count,'pageSize'=>$pageSize]);
		$models=new Cate();
		$arr=$models->getcatelist();
		return $this->render('index',['model'=>$model,'list'=>$list,'keywords'=>$keywords,'keywords1'=>$keywords1,'arr'=>$arr,'pages'=>$pages]);
	}
	//添加
	public function actionAdd()
	{
		$model=new News();
		$post=Yii::$app->request->post();
		$res=$model->getAdd($post);
		if($res) 
		{
			return $this->redirect('index.php?r=ar/index');
		}
	}
	//删除
	public function actionDel()
	{
		$id=Yii::$app->request->get('id');
		$model=new News();
		$res=$model->getDel($id);
		if($res){
			return $this->redirect(Yii::$app->request->getReferrer());	
		}
	}
	//修改查询
	public function actionUpdate()
	{
		$id=Yii::$app->request->get('id');
		$model=new News();
		$res=$model->getUpdate($id);
		$models=new Cate();
		$arr=$models->getcatelist();
		// print_r($res);die;
		return $this->render('update',['model'=>$model,'res'=>$res,'arr'=>$arr]);
	}
	//执行修改
	public function actionUpdateok()
	{
		$post=Yii::$app->request->post();
		$model=new News();
		$res=$model->getUpdateok($post);
		if($res){
			return $this->redirect('index.php?r=ar/index');
		}
	}
}











 ?>