<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Demos */

$this->title = 'Update Demos: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Demos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="demos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
