<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<center>
	<form action="?r=news/search" method="post">
		<input type="text" name="keywords" value="<?php if(isset($keywords)){ echo $keywords; }?>">
		<input type="submit" value="搜索">
	</form>
		<table border="1">
			<tr>
				<td>ID</td>
				<td>标题</td>
				<td>内容</td>
				<td>操作</td>
			</tr>
			<?php foreach($list as $k=>$v){ ?>
			<tr>
				<td><?= $v['id'] ?></td>
				<td>
					<?php 
					if(isset($keywords)){
						echo str_replace("$keywords", "<font color='red'>$keywords</font>",$v['title']);
					}else{echo $v['title']; }
					?>
				</td>
				<td><?= $v['content'] ?></td>
				<td>
				<a href="?r=news/del&id=<?= $v['id'] ?>">删除</a>
				<a href="?r=news/update&id=<?= $v['id'] ?>">修改</a>
				</td>
			</tr>
			<?php } ?>
		</table>
	</center>
</body>
</html>