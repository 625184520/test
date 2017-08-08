<?php 
use yii\widgets\ActiveForm;
use yii\helpers\Html;
$form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
    'action'=>'?r=demo/updateok',
    'method'=>'post',
])
 ?>
 <?= $form->field($model, 'id')->hiddenInput(['value'=>$res['id']]) ?>
 <?= $form->field($model, 'name')->textInput(['value'=>$res['name']]) ?>
 <?php $model->sex=$res['sex'] ?>
<?= $form->field($model, 'sex')->radioList([0=>'男',1=>'女']) ?>
 <?php $model->hobby=$res['hobby']; ?>
<?= $form->field($model, 'hobby')->checkboxList($data) ?>
 <?php $model->age=$res['age']; ?>
<?= $form->field($model, 'age')->dropDownList($age) ?>
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('提交', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>