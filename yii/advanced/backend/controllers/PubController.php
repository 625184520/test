<?php 
namespace backend\controllers;

use yii;
use yii\web\Controller;

class PubController extends Controller
{
	public $layout=false;
	public function actionHead()
	{
		return $this->render('head');
	}
	public function actionLeft()
	{
		return $this->render('left');
	}
	public function actionMain()
	{
		return $this->render('main');
	}		
}



 ?>