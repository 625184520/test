<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\db\ActiveRecord;

$form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
    'action'=>'index.php?r=newss/updateok','method'=>'post'
]) ?>

    <?= $form->field($model, 'n_ids')->hiddenInput(['style'=>'width:300px;height:30px','value'=>$res['id']]) ?>
    <?= $form->field($model, 'n_titles')->textInput(['style'=>'width:300px;height:30px','value'=>$res['n_title']]) ?>
    <?php $model->catelist=$res['c_id'] ?>
    <?= $form->field($model, 'catelist')->dropDownlist($arr,['style'=>'width:300px;height:30px']) ?>
    <?= $form->field($model, 'n_contents')->textarea(['cols'=>5,'value'=>$res['n_content']]) ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('修改', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('取消', ['class' => 'btn btn-primary']) ?>            
        </div>
    </div>
   
<?php ActiveForm::end() ?>