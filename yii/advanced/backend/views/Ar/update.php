<?php 
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

$form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
    'action'=>'?r=ar/updateok',
    'method'=>'post',
]) ?>
<center>
    <h1>新闻修改</h1>
<?= $form->field($model, 'id1')->hiddenInput(['style'=>'width:300px','value'=>$res['id']]) ?>
<?= $form->field($model, 'title1')->textInput(['style'=>'width:300px','value'=>$res['title']]) ?>
<?php $model->catelist=$res['c_id'] ?>
<?= $form->field($model, 'catelist')->dropDownList($arr,['style'=>'width:300px']) ?>
<?= $form->field($model, 'content1')->textarea(['rows'=>3,'cols'=>5,'style'=>'width:300px','value'=>$res['content']]) ?>
    <div class="form-group">	
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('修改', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('取消', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>
</center>