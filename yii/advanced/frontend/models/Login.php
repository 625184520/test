<?php 
namespace frontend\models;

use yii;
use yii\base\model;
header("content-type:text/html;charset=utf-8");

class Login extends Model
{
	public $username;
	public $password;
	public $verifycode;
	public function rules()
	{
		return [
            [['username','password','verifycode'],'required'],
            ['verifycode', 'captcha'],
		];
	}
	public function attributeLabels()
	{
		return [
			'username'=>'用户名',
			'password'=>'密码',
			'verifycode'=>'验证码',
		];
	}
	public function dologin($post)
	{
		$username=$post['Login']['username'];
		$password=$post['Login']['password'];
		$sql="select * from uuser where username='$username' and password ='$password'";
		return yii::$app->db->createCommand($sql)->queryOne();
	}

}