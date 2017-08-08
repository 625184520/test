<?php 
namespace backend\controllers;

use yii;
use yii\web\Controller;
use backend\models\Newss;
use backend\models\Cates;
use yii\data\Pagination;

class NewssController extends Controller
{
	public function actionForm()
	{
		$model=new Newss();
		$models=new Cates();
		$arr=$models->getcatelist();
		return $this->render('form',['model'=>$model,'arr'=>$arr]);
	}
    public function actionIndex()
    {
    	$where='1=1';
    	$catelist='';
    	if(Yii::$app->request->get('Newss'))
    	{
    		$Newss=Yii::$app->request->get('Newss');
    		$catelist=$Newss['catelist'];
    		if(!empty($catelist))
    		{
    			$where.=" and newss.c_id=$catelist";
    		}
    	}
    	$model=new Newss();
    	$page=Yii::$app->request->get('page') ? Yii::$app->request->get('page') : 1;
    	$pageSize=3;
    	$count=$model->getCount($where);
    	$limit=($page-1)*$pageSize;
    	$list=$model->getList($limit,$pageSize,$where);
    	$pages = new Pagination(['totalCount' => $count,'pageSize'=>$pageSize]);
    	$model=new Newss();
    	$models=new Cates();
		$arr=$models->getcatelist();
    	return $this->render('index',['model'=>$model,'list'=>$list,'pages'=>$pages,'arr'=>$arr]);
    }
    public function actionAdd()
    {
    	$post=Yii::$app->request->post();
    	$model=new Newss();
    	$res=$model->getAdd($post);
    	if($res)
    	{
    		return $this->redirect('?r=newss/index');
    	}else{
     		return $this->redirect('?r=newss/form');   		
    	}    	
    }
    public function actionDel()
    {
    	$id=Yii::$app->request->get('id');
    	$model=new Newss();
    	$res=$model->getdel($id);
    	if($res)
    	{
    		return $this->redirect(Yii::$app->request->referrer);
    	}
    }    
    public function actionUpdate()
    {
    	$id=Yii::$app->request->get('id');
    	$model=new Newss();
    	$models=new Cates();
    	$res=$model->getUpdate($id);
    	$arr=$models->getcatelist();
    	return $this->render('update',['model'=>$model,'res'=>$res,'arr'=>$arr]);
    }
    public function actionUpdateok()
    {
    	$post=Yii::$app->request->post();
    	$model=new Newss();
    	$res=$model->getUpdateok($post);
    	if($res)
    	{
    		return $this->redirect('?r=newss/index');    		
    	}else{
    		return $this->redirect('?r=newss/update');     		
    	}
    }
    public function actionShow()
    {
    	$id=Yii::$app->request->get('id');
    	$model=new Newss();
    	$res=$model->getShow($id);
    	// print_r($res);die;
    	return $this->render('show',['res'=>$res]);    	
    }
}