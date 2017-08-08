<?php 
namespace frontend\controllers;

use yii;
use yii\web\Controller;

class SendController extends Controller
{
	public function actionIndex()
	{
		$mail= Yii::$app->mailer->compose();   
		$mail->setTo(['625184520@qq.com','593291641@qq.com','1690052005@qq.com','1345769201@qq.com']);  
		$mail->setSubject("The nine group");  
		//$mail->setTextBody('zheshisha ');   //发布纯文字文本
		$mail->setHtmlBody("<br>we are family");    //发布可以带html标签的文本
		if($mail->send())  
		    echo "success";  
		else  
		    echo "failse";   
		die(); 		
	}
}