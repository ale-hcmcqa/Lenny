<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<base href="<?php echo base_url()?>">
	<head>
		<!-- Meta -->
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<!-- End of Meta -->
		
		<!-- Page title -->
		<title>Login</title>
		<!-- End of Page title -->
		
		<!-- Libraries -->
		<link type="text/css" href="css/hpbackend_login.css" rel="stylesheet" />	
		<link type="text/css" href="css/smoothness/jquery-ui-1.7.2.custom.css" rel="stylesheet" />	
		<link rel="shortcut icon" href="assets/logo_icon.png" />
		<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
		<script type="text/javascript" src="js/easyTooltip.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.7.2.custom.min.js"></script>
		<!-- End of Libraries -->	
	</head>
	<body>
	<div id="container">
		<div class="logo">
			<a href=""><img src="assets/logo.png" alt="" /></a>
		</div>
		<div id="box">
			<form action="<?php echo site_url()?>/adminhp/doLogin" method="POST">
			<p class="main">
				<label>Tài khoản: </label>
				<input name="username" value="username" onfocus="this.value=''" /> 
				<label>Mật khẩu: </label>
				<input type="password" name="password" value="asdf1234" onfocus="this.value=''">	
			</p>

			<p class="space">
				<span><input type="checkbox" />Ghi nhớ!</span>
				<input type="submit" value="Đăng nhập" class="login" />
			</p>
			</form>
		</div>
	</div>

	</body>
</html>