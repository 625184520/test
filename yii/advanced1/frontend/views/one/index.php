<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>列表</title>
</head>
<body>
	<center>
		<table border="1">
			<tr>
				<td>ID</td>
				<td>标题</td>
				<td>内容</td>
				<td>操作</td>
			</tr>
			<?php foreach($list as $k=>$v){ ?>
			<tr>
				<td><?= $v['id']; ?></td>
				<td><?= $v['title']; ?></td>
				<td><?= $v['content']; ?></td>
				<td><a href="?r=one/del&id=<?= $v['id']; ?>">删除</a>|| <a href="?r=one/update&id=<?= $v['id']; ?>">修改</a>|| <a href="?r=one/show&id=<?= $v['id']; ?>">查看</a></td>
			</tr>
			<?php }  ?>
		</table>
	</center>
</body>
</html>