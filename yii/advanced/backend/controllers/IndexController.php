<?php 
namespace backend\controllers;

use yii;
use yii\web\Controller;

class IndexController extends Controller
{
	public $layout=false;
	public function actionIndex()
	{
		return $this->render('index');
	}
}