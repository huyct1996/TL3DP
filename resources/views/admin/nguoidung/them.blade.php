@extends('admin.master')
@section('tieude','Thêm Người Dùng')
@section('noidung')
	<div class="row">
		<div class="col-sm-12">
			<form class="myForm" style="margin-top: 20px" action="" method="POST">
				<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
			  	<div class="form-group">
				  	<label>Tên người dùng</label>
				  	<input type="text" class="form-control" name="txtName" placeholder="Vui lòng nhập tên người dùng" value="{!! old('txtName') !!}">
			  	</div>
			  	<div class="form-group">
				  	<label>Email</label>
				  	<input type="email" class="form-control" name="txtEmail" placeholder="Vui lòng nhập email" value="{!! old('txtEmail') !!}">
			  	</div>
			  	<div class="form-group">
				  	<label>Mật khẩu</label>
				  	<input type="password" class="form-control" name="txtPassword" placeholder="Vui lòng nhập mật khẩu">
			  	</div>
			  	<div class="form-group">
				  	<label>Mật khẩu xác nhận</label>
				  	<input type="password" class="form-control" name="txtPasswordV" placeholder="Vui lòng nhập mật khẩu xác nhận">
			  	</div>
			  	<div class="form-group">
				  	<label style="margin-right: 21px;">Nổi bật</label>
				  	<label class="radio-inline">
				  		<input style="margin-top: -6px;"  type="radio" name="rdLevel" value="0"
						@if(old('rdLevel') == 0)
				  		checked
				  		@endif
				  		>Nhân Viên
				  	</label>
					<label class="radio-inline">
						<input style="margin-top: -6px;"  type="radio" name="rdLevel" value="1"
						@if(old('rdLevel') == 1)
				  		checked
				  		@endif
				  		>Admin
					</label>
			  	</div>
			  	<div class="form-group">
			  		<button type="submit" class="btn btn-primary">Thêm người dùng</button>
			  		<button type="reset" class="btn btn-danger">Làm mới</button>
			  	</div>
			</form>
		</div>
	</div>
@endsection