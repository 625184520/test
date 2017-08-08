<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<center>
<?php $form = ActiveForm::begin(['id' => 'login-form','action'=>'?r=ar/updateok','method'=>'post']); ?>

    <?= $form->field($model, 'ids')->hiddenInput(['style'=>'width:300px;height:25px','value'=>$res['id']]) ?>
    <?= $form->field($model, 'titles')->textInput(['style'=>'width:300px;height:25px','value'=>$res['title']]) ?>
    <?php $model->catelist=$res['c_id'] ?>
    <?= $form->field($model, 'catelist')->dropDownList($arr,['style'=>'width:300px;height:25px']) ?>
    <?= $form->field($model, 'contents')->textarea(['rows'=>3,'cols'=>5,'style'=>'width:300px','value'=>$res['content']]) ?>

    <div class="form-group">
        <?= Html::submitButton('修改') ?>
        <?= Html::resetButton('取消') ?>
    </div>

<?php ActiveForm::end(); ?>
</center>