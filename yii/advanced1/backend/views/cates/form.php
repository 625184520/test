<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\db\ActiveRecord;

$form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
    'action'=>'index.php?r=cates/add','method'=>'post'
]) ?>

    <?= $form->field($model, 'c_names')->textInput(['style'=>'width:300px;height:30px']) ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('添加', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('取消', ['class' => 'btn btn-primary']) ?>            
        </div>
    </div>
   
<?php ActiveForm::end() ?>