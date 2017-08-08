<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
	<h1>商品添加</h1>
<?php $form = ActiveForm::begin([
		'id' => 'login-form',
		'action'=>'?r=goods/add',
		'method'=>'post',
		]); 
?>
<div class="div">
    <?= $form->field($model, 'g_name[]')->textInput(['style'=>'width:300px']) ?>

    <?= $form->field($model, 'g_price[]')->textInput(['style'=>'width:300px']) ?>
</div>
    <div class="form-group">
        <?= Html::Button('+',['class'=>'add']) ?>   
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <?= Html::submitButton('提交') ?>
    </div>

<?php ActiveForm::end(); ?>
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script>
	$(document).on('click','.add',function(){
		var obj=$('.div').html();
		$('.div').after(obj);
	})
</script>