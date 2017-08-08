<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Demos */

$this->title = 'Create Demos';
$this->params['breadcrumbs'][] = ['label' => 'Demos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="demos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
