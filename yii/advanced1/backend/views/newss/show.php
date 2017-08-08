<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		.div1{
			width: 600px;
		}
	</style>
</head>
<body>
	<center>
		<div class="div1">
			<h2><?= $res['n_title']; ?></h2><br />
				所属分类：<?= $res['c_name']; ?> <br />
				<?= $res['n_content']; ?>
		</div>
	</center>
</body>
</html>