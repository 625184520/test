<style>
	.form-control{
		width:300px;
	}
</style>
<?php 
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\captcha\Captcha;

$form = ActiveForm::begin(['id' => 'login-form','action'=>'?r=login/dologin','method'=>'post']); ?>

    <?= $form->field($model, 'username')->textInput(['style'=>'width:300px']) ?>

    <?= $form->field($model, 'password')->passwordInput(['style'=>'width:300px']) ?>
	<?= $form->field($model, 'verifycode')->widget(Captcha::className()) ?>
    <div class="form-group">
        <?= Html::submitButton('登录') ?>
    </div>
<span id="qqLoginBtn"></span>
<?php ActiveForm::end(); ?>
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://qzonestyle.gtimg.cn/qzone/openapi/qc_loader.js" data-appid="101353491" data-redirecturi="http://www.stone.com/qq/example/oauth/callback.php" charset="utf-8"></script>
<script type="text/javascript">
    QC.Login({
       btnId:"qqLoginBtn"    //插入按钮的节点id
});
</script>