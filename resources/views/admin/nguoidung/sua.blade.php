@extends('admin.master')
@section('tieude','Sửa Người Dùng')
@section('noidung')
	<div class="row">
		<div class="col-sm-12">
			<form class="myForm" style="margin-top: 20px" action="" method="POST">
				@csrf
			  	<div class="form-group">
				  	<label>Tên người dùng</label>
				  	<input type="text" class="form-control" name="txtName" placeholder="Vui lòng nhập tiêu đề tin tức" value="{!! old('txtName', isset($user) ? $user['name'] : null) !!}">
			  	</div>
			  	<div class="form-group">
				  	<label>Email</label>
				  	<input type="email" name="txtEmail" class="form-control"  value="{!! old('txtEmail', isset($user) ? $user['email'] : null) !!}" placeholder="Vui lòng nhập email" readonly="true">
			  	</div>
			  	<div class="form-group">
				  	<label>Mật khẩu</label>
				  	<input type="password" class="form-control" name="txtPassword" placeholder="Vui lòng nhập mật khẩu">
			  	</div>
			  	<div class="form-group">
				  	<label>Mật khẩu xác nhận</label>
				  	<input type="password" class="form-control" name="txtPasswordV" placeholder="Vui lòng nhập mật khẩu xác nhận">
			  	</div>
			  	@if(Auth::User()->level == 0 || $user['level'] == 2 || $user['id'] == 1)
			  	<div class="form-group">
				  	<label style="margin-right: 21px;">Quyền</label>
				  	<label class="radio-inline">
				  		<input style="margin-top: -6px;"  type="radio" name="rdLevel" value="0"
				  		disabled
				  		@if($user['level'] == 0)
				  		checked="checked"
				  		@endif
				  		readonly="true">Nhân viên
				  	</label>
					<label class="radio-inline">
						<input style="margin-top: -6px;"  type="radio" name="rdLevel" value="1" disabled 
						@if($user['level'] == 1)
				  		checked="checked"
				  		@endif
						>Admin
					</label>
			  	</div>
			  	@elseif(Auth::User()->level == 1)
			  	<div class="form-group">
				  	<label style="margin-right: 21px;">Quyền</label>
				  	<label class="radio-inline">
				  		<input style="margin-top: -6px;"  type="radio" name="rdLevel" value="0"
				  		@if($user['level'] == 0)
				  		checked="checked"
				  		@endif
				  		>Nhân viên
				  	</label>
					<label class="radio-inline">
						<input style="margin-top: -6px;"  type="radio" name="rdLevel" value="1" 
						@if($user['level'] == 1)
				  		checked="checked"
				  		@endif
						>Admin
					</label>
			  	</div>
			  	@endif
			  	<div class="form-group">
			  		<button type="submit" class="btn btn-primary">Sửa người dùng</button>
			  		<button type="reset" class="btn btn-danger">Làm mới</button>
			  	</div>
			</form>
		</div>
	</div>
</div>
@endsection