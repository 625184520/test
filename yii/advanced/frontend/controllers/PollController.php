<?php 

namespace frontend\controllers;

use yii;
use yii\web\Controller;
use frontend\models\Poll;
header("content-type:text/html;charset=utf-8");

class PollController extends Controller
{
	public $layout=false;
	public function actionForm()
	{
		$model=new Poll();
		return $this->render('form',['model'=>$model]);
	}
}



 ?>