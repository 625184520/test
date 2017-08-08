<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<center>
		<form action="?r=news/add" method="post">
			<table>
				<tr>
					<td>标题：</td>
					<td><input type="text" name="title"></td>
				</tr>			
				<tr>
					<td>内容：</td>
					<td><textarea name="content" cols="20" rows="5"></textarea></td>
				</tr>
				<tr>
					<td><input type="submit" value="提交"></td>
					<td><input type="reset" value="取消"></td>
				</tr>
			</table>
		</form>
	</center>
</body>
</html>