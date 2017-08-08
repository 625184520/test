<?php 
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use \yii\widgets\LinkPager;
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
	td{
		text-align: center;
	}
	</style>
</head>
<body>
	<center>
	<h1>商品列表</h1>
<?php $form = ActiveForm::begin(['id' => 'login-form','action'=>'index.php?r=ar/index','method'=>'get']); ?>
 <?= $form->field($model, 'keywords')->textInput(['style'=>'width:300px;height:30px','placeholder'=>'请输入标题','value'=>$keywords]) ?>
 <?php $model->keywords1=$keywords1; ?>
 <?= $form->field($model, 'keywords1')->dropDownlist($arr,['style'=>'width:300px;height:35px','prompt'=>'全部分类']) ?>
     <div class="form-group">
        <?= Html::submitButton('查询',['style'=>'width:300px;height:25px']) ?>
    </div>
<?php ActiveForm::end(); ?>
		<table border="1">
			<tr>
				<td>ID</td>
				<td>标题</td>
				<td>分类</td>
				<td>内容</td>
				<td>操作</td>
			</tr>
			<?php foreach($list as $k=>$v){  ?>
			<tr>
				<td><?= $v['id']; ?></td>
				<td><?php echo str_replace($keywords,"<font color='red'>$keywords</font>",$v['title']); ?></td>
				<td><?= $v['c_name']; ?></td>
				<td><?= $v['content']; ?></td>
				<td><a href="?r=ar/del&id=<?= $v['id']; ?>">删除</a>||<a href="?r=ar/update&id=<?= $v['id']; ?>">修改</a></td>
			</tr>
			<?php }  ?>
		</table>
		<?= LinkPager::widget(['pagination'=>$pages]); ?>
	</center>
</body>
</html>