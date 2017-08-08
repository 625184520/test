<?php 

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal','enctype' => 'multipart/form-data'],
    'action'=>'?r=form/add',
    'method'=>'post',
]) ?>
    <?= $form->field($model, 'name') ?>
    <?= $form->field($model, 'pwd')->passwordInput() ?>
    <?php $model->sex = '1'; ?>
    <?= $form->field($model, 'sex')->radioList([0=>'男',1=>'女']) ?>
    <?php $model->hobby = [2,3]; ?>
    <?= $form->field($model, 'hobby')->checkboxList($hobby) ?>
    <?php $model->age = 56; ?>
    <?= $form->field($model, 'age')->dropDownList($age,['prompt'=>'请选择']) ?>
    <?= $form->field($model, 'introduction')->textarea(["rows"=>3]) ?>
     <?= $form->field($models, 'imageFile[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('提交', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>









 