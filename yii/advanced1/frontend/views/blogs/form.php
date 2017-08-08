<?php 

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
	<table>
		<tr>
			<td>发送消息</td>
			<td>
				<input type="text" name="content" onblur="th()" id="content" class="blog">
			</td>
		</tr>
	</table>
</center>
</body>
</html>
<script>
	// $(document).on('blur','.blog',function(){
	// 	var content=$(this).val();
	// 	var date=new Date();
	// 	var mytime=date.toLocaleString(); 
	// 	var minute=60;
	// 	var endtime=strtotime(mytime)+minute;
	// })
	// var index = setInterval("thisFunction",3);
</script>