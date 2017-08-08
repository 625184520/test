<?php

namespace frontend\controllers;
use yii;
use yii\web\Controller;
use frontend\models\Form;
use frontend\models\Upload;
use db; 
use yii\web\UploadedFile;

header("content-type:text/html;charset=utf-8");
class FormController extends Controller
{
	//表单
	public function actionIndex()
	{
		$model= new Form();
		$models=new Upload();
		$age=Form::getage(18,60);
		// print_r($age);die;
		$sql="select id,title from news";
		$hobbys=Yii::$app->db->createCommand($sql)->queryAll();
		$hobby=$model->getHobby($hobbys);
		return $this->render('index',['model'=>$model,'age'=>$age,'hobby'=>$hobby,'models'=>$models]);
	}
	//添加：
	public function actionAdd()
	{
		$model= new Form();		
        $models = new Upload();
		$data=Yii::$app->request->post();
        if (Yii::$app->request->isPost) {
            $models->imageFile = UploadedFile::getInstances($models, 'imageFile');

		// echo "<pre>";
		// print_r($_FILES);die;
            // if ($models->upload()) {
            //     // 文件上传成功
            //    return ;
                
            // }
            $img=$models->upload();
        }		
		$arr=$data['Form'];
		
  //  		echo "<pre>";
		// print_r($arr);die;         
		// $res=$model->getAdd($arr,$img);
		// return $this->redirect('?r=form/show');
	}
	//展示：
	public function actionShow()
	{
		$model= new Form();			
		$list=$model->getShow();
		// echo "<pre>";		
		// print_r($list);die;
		return $this->render('show',['list'=>$list]);
	}


}