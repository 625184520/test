<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>展示</title>
</head>
<body>
	<center>
		<table border="1">
			<tr>
				<td>ID</td>
				<td>用户名</td>
				<td>密码</td>
				<td>性别</td>
				<td>爱好</td>
				<td>年龄</td>
				<td>描述</td>
				<td>操作</td>
			</tr>
			<?php foreach($list as $k=>$v){  ?>
			<tr>
				<td><?= $v['id']?></td>
				<td><?= $v['username']?></td>
				<td><?= $v['pwd']?></td>
				<td><?= $v['sex']?></td>
				<td><?= $v['hobby']?></td>
				<td><?= $v['age']?></td>
				<td><?= $v['introduction']?></td>
				<td><a href="">删除</a>|| <a href="">修改</a></td>
			</tr>
			<?php }  ?>			
		</table>
	</center>
</body>
</html>