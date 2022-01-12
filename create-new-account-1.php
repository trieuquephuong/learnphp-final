<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>	
<body>
<section class="create-new-account">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<img src="github-icon.png">
				<h1>Create New Account</h1>
				<form action=".php" method="post"> <!--method: get -->
					<input type="text" name="your-fullname" placeholder="Họ và tên"><br>
					<input type="tel" name="your-telephone" placeholder="Số điện thoại"><br>
					<input type="email" name="your-email" placeholder="Email"><br>
					<input type="password" name="your-password" placeholder="Mật khẩu"><br>
					<input type="password" name="your-re-password" placeholder="Nhập lại mật khẩu"><br>
					<input type="date" name="your-birthday" placeholder="Ngày sinh"><br>
					<input type="radio" name="your-gender" placeholder="Giới tính"><br>
					<input type="submit" value="Create new account"><br>
				</form>
				<pre>------------------</pre>
				<button type="Sign In"><a href="sign-in.php">Sign In</a></button>	
			</div>	
		</div>	
	</div>
</section>

</body>
</html>
