@extends('admin.master')
@section('tieude','Thêm Tin Tức')
@section('noidung')
	<div class="row">
		<div class="col-sm-12">
			<form class="myForm" style="margin-top: 20px" action="" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
				    <label>Loại tin tức</label>
				    <select class="form-control" name="sltloaitincha">
				      	<option value="0">Vui lòng nhập loại tin cha</option>
				      	<?php loai_tin_cha($data, 0, "-", old('sltloaitincha')); ?>
				    </select>
			  	</div>
			  	<div class="form-group">
				  	<label>Tiêu đề</label>
				  	<input type="text" class="form-control" name="txtTitle" placeholder="Vui lòng nhập tiêu đề tin tức" value="{!! old('txtTitle') !!}">
			  	</div>
			  	<div class="form-group">
				  	<label>Hình ảnh</label>
				  	<input style="height: 30px !important;" type="file" name="fImages" class="form-control-file"  value="{!! old('fImages') !!}">
			  	</div>
			  	<div class="form-group">
				  	<label>Tóm tắt</label>
				  	<textarea type="text" id="editor" name="txtSummary" placeholder="Vui lòng nhập tên tin tức">{!! old('txtSummary') !!}</textarea>
			  	</div>
			  	<div class="form-group">
				  	<label>Nội dung</label>
				  	<textarea type="text" id="editorND" name="txtContent">{!! old('txtContent') !!}</textarea>
			  	</div>
			  	<div class="form-group">
				  	<label style="margin-right: 21px;">Nổi bật</label>
				  	<label class="radio-inline">
				  		<input style="margin-top: -6px;"  type="radio" name="rdHighlights" value="1"
						@if(old('rdHighlights') == 1)
				  		checked
				  		@endif
				  		>Có
				  	</label>
					<label class="radio-inline">
						<input style="margin-top: -6px;"  type="radio" name="rdHighlights" value="0"
						@if(old('rdHighlights') == 0)
				  		checked
				  		@endif
				  		>Không
					</label>
			  	</div>
			  	<div class="form-group">
			  		<button type="submit" class="btn btn-primary">Thêm tin tức</button>
			  		<button type="reset" class="btn btn-danger">Làm mới</button>
			  	</div>
			</form>
		</div>
	</div>
@endsection