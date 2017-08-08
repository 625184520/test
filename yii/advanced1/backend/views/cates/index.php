<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<center>
		<table border="1">
			<tr>
				<td>ID</td>
				<td>分类名称</td>
				<td>操作</td>
			</tr>
			<?php foreach($list as $k=>$v){ ?>
			<tr>
				<td><?= $v['c_id']?></td>
				<td><?= $v['c_name']?></td>
				<td><a href="?r=cates/del&id=<?= $v['c_id']?>">删除</a>|| <a href="?r=cates/update&id=<?= $v['c_id']?>">修改</a></td>
			</tr>
			<?php } ?>
		</table>
	</center>
</body>
</html>