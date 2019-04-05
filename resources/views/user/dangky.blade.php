@extends('user.master')
@section('title', 'Đăng ký')
@section('noidung')
	<section class="container content">
		<div class="row">
			<div class="col-sm-9">
				<!-- Form dang ky -->
				<div class="login-form">
					<div class="category-title">
						<div class="right-title">
							<h2>Đăng Ký</h2>
						</div>
						<div style="border-bottom: 25px solid white;border-left: 20px solid transparent;height: auto;overflow: auto;"></div>
					</div>
					<p></p>
					@if(count($errors) > 0)
						<div class="alert alert-danger">
							<ul style="padding: 0;">
								@foreach($errors->all() as $error)
									<li style="list-style: none;">{!! $error !!}</li>
								@endforeach
							</ul>
						</div>
					@endif
					@if(Session::has('thongbao'))
						<div class="alert alert-{!! Session::get('thongbao_mau') !!}">
							{!! Session::get('thongbao') !!}
						</div>
					@endif
					<div class="signup-posts">
						<form action="{!! url('dangky', [$id, $alias]) !!}" method="POST">
							<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
							<div class="form-group">
						    	<label for="name" style="">Tên Người Dùng:</label>
						    	<input type="text" name="txtName" class="form-control" value="{!! old('txtName') !!}">
						  	</div>
						  	<div class="form-group">
						    	<label for="email" style="">Email:</label>
						    	<input type="text" name="txtEmail" class="form-control" id="email" value="{!! old('txtEmail') !!}">
						  	</div>
						  	<div class="form-group">
						    	<label for="pwd">Mật Khẩu:</label>
						    	<input type="password" name="txtPassword" class="form-control" id="pwd">
						  	</div>
						  	<div class="form-group">
						    	<label for="pwd">Mật Khẩu:</label>
						    	<input type="password" name="txtPasswordV" class="form-control" id="pwd">
						  	</div>
						  	<button type="submit" class="signlgup btn btn-primary">Đăng Ký</button>
						  	<a href="{!! url('trolai', [$id, $alias]) !!}" class="signlgup btn btn-success">Trở Lại</a>
						</form>
					</div>
				</div>
				<!-- end form dang ky -->
			</div>
			<aside class="col-sm-3">
				@include('user.aside')
			</aside>
		</div>
	</section>
@endsection