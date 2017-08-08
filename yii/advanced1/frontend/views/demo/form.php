<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>表单验证</title>
	<script type="text/javascript" src="../web/js/jquery-1.9.1.min.js"></script>
</head>
<body>
	<center>
		<form action="?r=demo/add" method="post">
			<table>
				<tr>
					<td>用户名：</td>
					<td><input type="text" name="uname" id="uname"><span id="spuname"></span></td>
				</tr>
				<tr>
					<td>密码：</td>
					<td><input type="text" name="pwd" id="pwd"><span id="sppwd"></span></td>
				</tr>
				<tr>
					<td>昵称：</td>
					<td><input type="text" name="username" id="username"><span id="spusername"></span></td>
				</tr>
				<tr>
					<td>真实姓名：</td>
					<td><input type="text" name="truename" id="truename"></td>
				</tr>
				<tr>
					<td>年龄：</td>
					<td><input type="text" name="age" id="age"></td>
				</tr>
				<tr>
					<td>性别：</td>
					<td><input type="radio" name="sex" id="sex" value="0">男
						<input type="radio" name="sex" id="sex" value="1">女<span></span>
					</td>
				</tr>
				<tr>
					<td>地址：</td>
					<td><input type="text" name="address" id="address"></td>
				</tr>
				<tr>
					<td>电话：</td>
					<td><input type="text" name="phone" id="phone"><span id="spphone"></span></td>
				</tr>
				<tr>
					<td>邮箱：</td>
					<td><input type="text" name="email" id="email"><span id="uname"></span></td>
				</tr>
				<tr>
					<td>QQ:</td>
					<td><input type="text" name="qq" id="qq"></td>
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
<script type="text/javascript">
	$(function(){
		var check={
			'checkUname':false,
			'checkPwd':false,
			'checkUsername':false,
			'checkPhone':false,
			'checkEmail':false
		};
		//验证用户名：
		$('#uname').blur(function(){
			var uname=$('#uname').val();
			var preg=/^[^0-9]\w{2,}$/;
			if(uname==''){
				$('#spuname').html("<font color='red'>用户名不能为空</font>");
					check.checkUname=false;
					return ;
			}
			if(preg.test(uname)){
				$('#spuname').html("<font color='green'>√</font>");check.checkUname=true;	
			}else{
				$('#spuname').html("<font color='red'>数字字母下划线且不能以数字组成</font>");
					check.checkUname=false;
					return ;				
			}
		})
		// 验证密码
		$('#pwd').blur(function(){
			var pwd=$('#pwd').val();
			var preg=pwd.length;
			// alert(preg);
			if(pwd==''){
				$('#sppwd').html("<font color='red'>密码不能为空</font>");
					check.checkPwd=false;
					return ;
			}
			if(preg>=6){
				$('#sppwd').html("<font color='green'>√</font>");check.checkPwd=true;
			}else{
				$('#sppwd').html("<font color='red'>6位以上组成</font>");
					check.checkPwd=false;
					return ;				
			}
		})
		// 验证昵称：
		$('#username').blur(function(){
			var username=$('#username').val();
			var preg=/^[\u4e00-\u9fa5]{2,5}$/;
			if(username==''){
				$('#spusername').html("<font color='red'>昵称不能为空</font>");
					check.checkUsername=false;
					return ;
			}
			if(preg.test(username)){
				$('#spusername').html("<font color='green'>√</font>");
					check.checkUsername=true;			
			}else{
				$('#spusername').html("<font color='red'>必须是中文</font>");
					check.checkUsername=false;
					return ;				
			}
		})
		//验证电话：
		$('#phone').blur(function(){
			$(this).next().remove();
			var phone=$('#phone').val();
			var preg=/^1[3,5,7,9][\d]{9}$/;
			if(phone==''){
				$('#phone').after("<font color='red'>电话不能为空</font>");
					check.checkPhone=false;
					return ;
			}
			if(preg.test(phone)){
				$('#phone').after("<font color='green'>√</font>");check.checkPhone=true;
			}else{
				$('#phone').after("<font color='red'>不符合规范</font>");
					check.checkPhone=false;
					return ;				
			}
		})	
		//验证邮箱：
		$('#email').blur(function(){
			$(this).next().remove();
			var email=$('#email').val();
			var preg=/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
			if(email==''){
				$('#email').after("<font color='red'>邮箱不能为空</font>");
					check.checkEmail=false;
					return ;
			}
			if(preg.test(email)){
				$('#email').after("<font color='green'>√</font>");check.checkEmail=true;
			}else{
				$('#email').after("<font color='red'>不符合邮箱规范</font>");
					check.checkEmail=false;
					return ;				
			}
		})	
		//验证提交：			
		$('form').submit(function(){
			// 验证性别：
			$("input[name=sex]").eq(1).next().next().remove();
			var man=$("input[name=sex]").eq(0).prop('checked');
			var woman=$("input[name=sex]").eq(1).prop('checked');
			if(!(man || woman)){
				$("input[name=sex]").eq(1).next().after("<font color='red'>请选择</font>");
				return false;
			}else{
				$("input[name=sex]").eq(1).next().after("<font color='green'>√</font>");				
			}
			$('#uname').trigger('blur');
			$('#pwd').trigger('blur');
			$('#username').trigger('blur');
			$('#phone').trigger('blur');
			$('#email').trigger('blur');
			return check.checkUname && check.checkPwd &&check.checkUsername && check.checkPhone && check.checkEmail;
		})
	})
</script>