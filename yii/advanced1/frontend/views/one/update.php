<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>修改数据</title>
</head>
<body>
	<center>
		<form action="?r=one/do" method="post">
			<table>
				<tr>
					<td>标题</td>
					<td>
					<input type="hidden" name="id" value="<?php  echo $res['id']; ?>">
					<input type="text" name="title" value="<?php  echo $res['title']; ?>" ></td>
				</tr>
				<tr>
					<td>内容</td>
					<td><textarea name="content"  cols="20" rows="5"><?php  echo $res['content']; ?></textarea></td>
				</tr>
				<tr>
					<td><input type="submit" value="修改"></td>
					<td><input type="reset" value="取消"></td>
				</tr>
			</table>
		</form>
	</center>
</body>
</html>