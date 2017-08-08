<?php 
namespace frontend\controllers;

use yii;
use yii\web\controller;
header("content-type:text/html;charset=utf-8");
class BlogsController extends controller
{
	public $layout=false;
	public $enableCsrfValidation=false;
	public function actionForm()
	{
		return $this->render('form');
	}
}



 ?>