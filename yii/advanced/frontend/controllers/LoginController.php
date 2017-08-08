<?php 
namespace frontend\controllers;
use yii;
use yii\web\Controller;
use frontend\models\Login;
use db; 

class LoginController extends Controller
{
    public function actions(){
		return [
             'captcha'=>[
                       'class'=>'yii\captcha\CaptchaAction',
                       // 'maxLength'=>5,
                       // 'minLength'=>5,
             ],
		];
    }	
	public function actionLogin()
	{
		$model=new Login();
		return $this->render('login',['model'=>$model]);
	}
	public function actionDologin()
	{
		$model=new Login();
		$post=yii::$app->request->post();
		$res=$model->dologin($post);
		// print_r($res);die;
		if($res){
			return $this->redirect('?r=form/index');
		}else{
			echo "<script>alert('登录失败')</script>";
		}
	}
}


 ?>