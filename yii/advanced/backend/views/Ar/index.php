<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ar展示</title>
</head>
<body>
	<center>
	<h1>新闻展示</h1>
		<input type="text" name="keywords" id="keywords"><a href="javascript:void(0);" class="s"><button>搜索</button></a>
		<a href="?r=ar/form"><button>添加</button></a>
		<table border="1" style="width:500px">
			<tr>
				<td>序号</td>
				<td>标题</td>
				<td>内容</td>
				<td>分类</td>
				<td>操作</td>
			</tr>
			<?php foreach($data as $k=>$v){ ?>
			<tr>
				<td><?= $v['id']; ?></td>
				<td><?= $v['title']; ?></td>
				<td><?= $v['content']; ?></td>
				<td><?= $v['c_name']; ?></td>
				<td><a href="?r=ar/del&id=<?= $v['id']; ?>">删除</a>||<a href="?r=ar/update&id=<?= $v['id']; ?>">修改</a></td>
			</tr>
			<?php } ?>
		</table>
	</center>
</body>
</html>
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script>
$('.s').click(function(){
	var keywords=$('#keywords').val();
	$.ajax({
		type:'post',
		url:'?r=ar/index',
		data:{keywords:keywords},
		success:function(data){
			location.href="?r=ar/index&keywords="+keywords;
		}
	})
})
</script>