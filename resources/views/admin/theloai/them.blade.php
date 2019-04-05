@extends('admin.master')
@section('tieude','Thêm Thể Loại')
@section('noidung')
	<div class="row">
		<div class="col-sm-12">
			<form class="myForm" style="margin-top: 20px" action="" method="POST">
				@csrf
				<div class="form-group">
				    <label>Loại tin cha</label>
				    <select class="form-control" name="sltloaitincha">
				      	<option value="0">Vui lòng nhập loại tin cha</option>
					    <?php loai_tin_cha($data, 0, "-", old('sltloaitincha')); ?>
				    </select>
			  	</div>
			  	<div class="form-group">
				  	<label>Tên loại tin</label>
				  	<input type="text" class="form-control" name="txtTypeName" placeholder="Vui lòng nhập tên thể loại" value="{!! old('txtTypeName') !!}">
			  	</div>
			  	<button type="submit" class="btn btn-primary">Thêm thể loại</button>
			  	<button type="reset" class="btn btn-danger">Làm mới</button>
			</form>
		</div>
	</div>
@endsection