<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\db\ActiveRecord;

$form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
    'action'=>'index.php?r=cates/updateok','method'=>'post'
]) ?>

    <?= $form->field($model, 'c_ids')->hiddenInput(['style'=>'width:300px;height:30px','value'=>$res['c_id']]) ?>
    <?= $form->field($model, 'c_names')->textInput(['style'=>'width:300px;height:30px','value'=>$res['c_name']]) ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('修改', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('取消', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
   
<?php ActiveForm::end() ?>