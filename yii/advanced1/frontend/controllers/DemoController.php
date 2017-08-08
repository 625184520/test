<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
header("content-type:text/html;charset=utf-8");
class DemoController extends Controller
{
	public $enableCsrfValidation=false;
	public $layout=false;
	public function actionForm()
	{
		return $this->render('form');
	}
	public function actionAdd()
	{
		$data=Yii::$app->request->post();
		// print_r($data);die;
		$uname=$data['uname'];	 	
		$pwd=$data['pwd'];	 	
		$username=$data['username'];	 	
		$truename=$data['truename'];	 	
		$age=$data['age'];	 	
		$sex=$data['sex'];	 	
		$address=$data['address'];	 	
		$phone=$data['phone'];	 	
		$email=$data['email'];	 	
		$qq=$data['qq'];	 	
		$sql="insert into useinfo values ('','$uname','$pwd','$username','$truename','$age','$sex','$address','$phone','$email','$qq')";
		Yii::$app->db->createCommand($sql)->execute();
		return $this->redirect('?r=demo/index');
	}

}