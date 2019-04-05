<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="{{ url('public/admin/css/login-style.css') }}">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Vollkorn" rel="stylesheet"> 
	<title>Đăng Nhập</title>
</head>
<body>
	<div class="loginbox">
		<img class="avatar" src="/TL3/public/admin/img/dangnhap/avatar.png" alt="hình đại diện">
			<h1>Đăng Nhập</h1>
			<form action="" method="POST">
				@csrf
				@if(Session::has('thongbao'))
					<div class="alert alert-{!! Session::get('thongbao_mau') !!}">
						{!! Session::get('thongbao') !!}
					</div>
				@endif
				<p>Tên tài khoản</p>
				<input type="email" name="txtUsername" placeholder="Vui lòng nhập email đăng nhập">
				<p>Mật khẩu</p>
				<input type="password" name="txtPassword" placeholder="Vui lòng nhập mật khẩu">
				<input type="submit" value="Đăng Nhập">
				<a href="{{ route('password.request') }}">Quên mật khẩu?</a><br>
			</form>
	</div>
</body>
<script src="{{ url('public/admin/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ url('public/admin/js/admin-style.js') }}"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>