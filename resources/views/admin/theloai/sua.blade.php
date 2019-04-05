@extends('admin.master')
@section('tieude','Sửa Thể Loại')
@section('noidung')
	<div class="row">
		<div class="col-sm-12">
			<form style="margin-top: 20px" action="" method="POST">
				@csrf
				<div class="form-group">
				    <label>Loại tin cha</label>
				    <select class="form-control" name="sltloaitincha">
				      	<option value="0">Vui lòng nhập loại tin cha</option>
					    <?php loai_tin_cha($loai_tin_cha, 0, "-", $data['type_news_id']); ?>
				    </select>
			  	</div>
			  	<div class="form-group">
				  	<label>Tên loại tin</label>
				  	<input type="text" class="form-control" name="txtTypeName" placeholder="Vui lòng nhập tên thể loại" value="{!! old('txtTypeName', isset($data) ? $data['name'] : null) !!}">
			  	</div>
			  	<button type="submit" class="btn btn-primary">Sửa thể loại</button>
			  	<button type="reset" class="btn btn-danger">Làm mới</button>
			</form>
		</div>
	</div>
@endsection