<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
	<h1>商品添加</h1>
<?php $form = ActiveForm::begin([
		'id' => 'login-form',
		'action'=>'?r=goods/updateok',
		'method'=>'post',
		]); 
?>
<div class="div">
    <?= $form->field($model, 'g_id')->hiddenInput(['value'=>$res['g_id']]) ?>
    <?= $form->field($model, 'g_name')->textInput(['style'=>'width:300px','value'=>$res['g_name']]) ?>

    <?= $form->field($model, 'g_price')->textInput(['style'=>'width:300px','value'=>$res['g_price']]) ?>
</div>
    <div class="form-group">
        <?= Html::submitButton('修改') ?>
    </div>

<?php ActiveForm::end(); ?>