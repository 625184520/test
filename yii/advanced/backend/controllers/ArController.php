<?php 
namespace backend\controllers;

use yii;
use db;
use backend\models\News;
use backend\models\Cate;
use yii\web\Controller;
header("content-type:text/html;;charset=utf-8");

class ArController extends Controller
{
	public $layout=false;
	// 表单
	public function actionForm()
	{
		$model=new News();
		$models=new Cate();
        $arr=$models->getcatelist();
		return $this->render('form',['model'=>$model,'models'=>$models,'arr' => $arr]);
	}
	//添加：
	public function actionAdd()
	{
		$post=Yii::$app->request->post();
		$model=new News();
		$res=$model->getAdd($post);
		if($res){
			return $this->redirect('?r=ar/index');
		}else{
			return $this->redirect('?r=ar/form');
		}
	}
	//展示：
	public function actionIndex()
	{
		$keywords=Yii::$app->request->post('keywords');
        $model = new News(); 
        $data=$model->getlist($keywords);
		// print_r($data);
        return $this->render('index', [  
            'data' => $data,
        ]); 
	}
	//删除：
	public function actionDel()
	{
		$id=Yii::$app->request->get('id');
		$model= new News();
		$res=$model->getDel($id);
		if($res){
			return $this->redirect('?r=ar/index');
		}
	}
	//修改（查询）
	public function actionUpdate()
	{
		$id=Yii::$app->request->get('id');
		$model=new news();
		$res=$model->findOne($id);
		$models=new Cate();
        $arr=$models->getcatelist();
		return $this->render('update',['model'=>$model,'models'=>$models,'arr'=>$arr,'res'=>$res]);
	}
	//修改（执行）
	public function actionUpdateok()
	{
		$post=Yii::$app->request->post();
		// print_r($post);die;
		$model=new News();
		$res=$model->getUpdateok($post);
		if($res){
			return $this->redirect('?r=ar/index');
		}else{
			return $this->redirect('?r=ar/update');
		}		
	}
}

 ?>