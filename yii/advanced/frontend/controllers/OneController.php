<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
header('content-type:text/html;charset=utf-8');
class OneController extends Controller
{
	public $layout=false;
	public $enableCsrfValidation=false;
    public function actionForm()
    {
    	return $this->render('form');
    }
    public function actionAdd()
    {
    	$data=Yii::$app->request->post();
    	$title=$data['title'];
    	$content=$data['content'];
    	$sql="insert into news values ('','$title','$content')";
    	Yii::$app->db->createCommand($sql)->execute();
    	return $this->redirect('?r=one/index');
    }
    public function actionIndex()
    {
    	$sql="select * from news ";
    	$list=Yii::$app->db->createCommand($sql)->queryAll();
    	return $this->render('index',array('list'=>$list));
    }
    public function actionDel()
    {
    	$id=Yii::$app->request->get('id');
    	$sql="delete from news where id=$id";
    	Yii::$app->db->createCommand($sql)->execute();
    	return $this->redirect('?r=one/index');
    }
    public function actionUpdate()
    {
    	$id=Yii::$app->request->get('id');
    	$sql="select * from news where id=$id";
    	$res=Yii::$app->db->createCommand($sql)->queryOne();
    	return $this->render('update',array('res'=>$res));
    }
    public function actionDo()
    {
    	$data=Yii::$app->request->post();
    	$id=$data['id'];
    	$title=$data['title'];
    	$content=$data['content'];
    	Yii::$app->db->createCommand("update news set title='$title',content='$content' where id='$id'")->execute();
    	return $this->redirect('?r=one/index');   	
    }
    public function actionShow()
    {
    	$id=Yii::$app->request->get('id');
    	$sql="select title from news where id='$id'";
    	$res=Yii::$app->db->createCommand($sql)->queryColumn();
    	print_r($res);
    }
    // public function actionCreat()
    // {
    	

    // }
}