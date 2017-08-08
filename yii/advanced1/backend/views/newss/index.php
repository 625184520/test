<?php 
use yii\widgets\LinkPager;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
    'action'=>'index.php?r=newss/index','method'=>'get'
]) ?>
<center>
    <?= $form->field($model, 'catelist')->dropDownlist($arr,['style'=>'width:300px;height:30px']) ?> 
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>           
        </div>
    </div> 
</center>    
<?php ActiveForm::end() ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<center>
		<table border="1">
			<tr>
				<td>ID</td>
				<td>新闻标题</td>
				<td>新闻分类</td>
				<td>新闻内容</td>
				<td>操作</td>
			</tr>
			<?php foreach($list as $k=>$v){ ?>
			<tr>
				<td><?= $v['id']?></td>
				<td><?= $v['n_title']?></td>
				<td><?= $v['c_name']?></td>
				<td><?= $v['n_content']?></td>
				<td><a href="?r=newss/del&id=<?= $v['id']?>">删除</a> || <a href="?r=newss/update&id=<?= $v['id']?>">修改</a>|| <a href="?r=newss/show&id=<?= $v['id']?>">查看详情</a></td>
			</tr>
			<?php } ?>
		</table>
		<?= LinkPager::widget(['pagination' => $pages]);  ?>
	</center>
</body>
</html>