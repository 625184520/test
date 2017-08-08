<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;

class NewsController extends Controller
{
	// public $layout=false; 
	public $enableCsrfValidation=false;
    public function actionForms()
    {
        return $this->render('forms');
    }
    // 添加
    public function actionAdd()
    {
    	$data=Yii::$app->request->post();
    	$title=$data['title'];
    	$content=$data['content'];
    	$sql="insert into news values('','$title','$content')";
    	Yii::$app->db->createCommand($sql)->execute();
    	return $this->redirect(['news/index']);
    }
    // 展示
    public function actionIndex()
    {
    	$sql="select * from news";
    	$list=Yii::$app->db->createCommand($sql)->queryAll();
    	return $this->render('index',array('list'=>$list));
    }
    // 删除
    public function actionDel()
    {
    	$id=Yii::$app->request->get('id');
    	$sql="delete from news where id=$id";
    	Yii::$app->db->createCommand($sql)->execute();
    	// return $this->redirect(['news/index']);
    	return $this->redirect('?r=news/index');
    }
    //修改查询
    public function actionUpdate()
    {
    	$id=Yii::$app->request->get('id');
    	$sql="select * from news where id=$id";
    	$res=Yii::$app->db->createCommand($sql)->queryOne();
    	return $this->render('update',array('res'=>$res));
    }
    //执行修改
    public function actionUpdateok()
    {
    	$id=Yii::$app->request->post('id');
    	$title=Yii::$app->request->post('title');
    	$content=Yii::$app->request->post('content');
    	$sql="update news set title='$title',content='$content' where id=$id";
    	Yii::$app->db->createCommand($sql)->execute();
    	return $this->redirect(['news/index']);
    }
    public function actionSearch()
    {
        $keywords=Yii::$app->request->post('keywords');
        $sql="select * from news where title like '%$keywords%'";
        $res=Yii::$app->db->createCommand($sql)->queryAll();
        return $this->render('index',array('list'=>$res,'keywords'=>$keywords));
    }
}