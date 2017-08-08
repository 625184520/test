<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<center>
		<table>
			<tr>
				<td>ID</td>
				<td>姓名</td>
				<td>性别</td>
				<td>爱好</td>
				<td>年龄</td>
				<td>操作</td>
			</tr>
			<?php foreach($list as $k=>$v){ ?>
			<tr>
				<td><?= $v['id']; ?></td>
				<td><?= $v['name']; ?></td>
				<td><?= $v['sex'] ? '女' : '男' ?></td>
				<td><?= $v['hobby']; ?></td>
				<td><?= $v['age']; ?></td>
				<td><a href="?r=demo
				/del&id=<?= $v['id']; ?>">删除</a> || <a href="?r=demo/update&id=<?= $v['id']; ?>">修改</a> </td>
			</tr>
			<?php } ?>
		</table>
	</center>
</body>
</html>