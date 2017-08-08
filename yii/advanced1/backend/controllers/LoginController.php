<?php 
namespace backend\controllers;

use yii;
use yii\web\Controller;



class LoginController extends Controller
{
	public $layout=false;
	public $enableCsrfValidation=false;
	public function actionForm()
	{
		return $this->render('form');
	}
	public function actionDologin()
	{
		include "../../config.inc.php";
		include "../../uc_client/client.php";		
		$post=Yii::$app->request->post();
		$username=$post['username'];
		$password=$post['password'];
		if($data = uc_get_user($username)) {
		list($uid, $username, $email) = $data;
		} else {
			echo '用户不存在';
		}
		list($uid, $username, $password, $email) = uc_user_login($username, $password);
		if($uid > 0) {
			echo '登录成功';
		} elseif($uid == -1) {
			echo '用户不存在,或者被删除';
		} elseif($uid == -2) {
			echo '密码错';
		} else {
			echo '未定义';
		}		

	}
}