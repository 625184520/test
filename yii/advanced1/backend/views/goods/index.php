<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
</head>
<body>
	<center>
	<h1>商品展示</h1>
		<table border="1" style="width:500px">
			<tr  align="center">
				<td>序号</td>
				<td>商品名称</td>
				<td>商品价格</td>
				<td>操作</td>
			</tr>
			<?php foreach($list as $k=>$v){ ?>
			<tr  align="center">
				<td><input type="checkbox" name="box" value="<?= $v['g_id']; ?>"></td>
				<td><?= $v['g_name']; ?></td>
				<td><?= $v['g_price']; ?></td>
				<td><a href="index.php?r=goods/del&id=<?= $v['g_id']; ?>">删除</a>||<a href="index.php?r=goods/update&id=<?= $v['g_id']; ?>">修改</a></td>
			</tr>
			<?php } ?>
		</table>
		<button class="delall">批量删除</button>
	</center>
</body>
</html>
<script>
$(document).on('click','.delall',function(){
	if($('[name="box"]:checkbox:checked').size()==0){
		alert('请选择您要删除的选项');
		return	false;
	}
	var str='';		
	$('[name="box"]:checkbox:checked').each(function(){
		str+=','+$(this).val();
	})
	str=str.substr(1);
	$.ajax({
		type:'get',
		url:'?r=goods/dele',
		data:{id:str},
		success:function(data){
			console.log(data);
		}
	})
})
</script>