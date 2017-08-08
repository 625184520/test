<?php 
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
    'action'=>'?r=ar/add',
    'method'=>'post',
]) ?>
<center>
	<h1>新闻添加</h1>
<?= $form->field($model, 'title1')->textInput(['style'=>'width:300px']) ?>
<?= $form->field($model, 'catelist')->dropDownList($arr,['style'=>'width:300px']) ?>
<?= $form->field($model, 'content1')->textarea(['rows'=>3,'cols'=>5,'style'=>'width:300px']) ?>
    <div class="form-group">	
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('提交', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('取消', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>
</center>