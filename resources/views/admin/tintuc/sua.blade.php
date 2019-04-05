@extends('admin.master')
@section('tieude','Sửa Tin Tức')
@section('noidung')
	<div class="row">
		<div class="col-sm-12">
			<form class="myForm" style="margin-top: 20px" action="" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
				    <label>Loại tin tức</label>
				    <select class="form-control" name="sltloaitincha">
				      	<option value="0">Vui lòng nhập loại tin cha</option>
				      	<?php loai_tin_cha($loai_tin_cha, 0, "-", $news['type_news_id']); ?>
				    </select>
			  	</div>
			  	<div class="form-group">
				  	<label>Tiêu đề</label>
				  	<input type="text" class="form-control" name="txtTitle" placeholder="Vui lòng nhập tiêu đề tin tức" value="{!! old('txtTitle', isset($news) ? $news['title'] : null) !!}">
			  	</div>
			  	<div class="form-group">
		            <label style="width: 100%">Hình Ảnh Hiện Tại</label>
		            <img style="width:200px; height: 180px;" src="{!! asset('public/admin/uploads/'.$news['image']) !!}" class="img_current">
		            <input type="hidden" name="img_current" value="{!! $news['image'] !!}">
		        </div>
			  	<div class="form-group">
				  	<label>Hình ảnh</label>
				  	<input style="height: 30px !important;" type="file" name="fImages" class="form-control-file"  value="{!! old('fImages') !!}">
			  	</div>
			  	<div class="form-group">
				  	<label>Tóm tắt</label>
				  	<textarea type="text" id="editor" name="txtSummary" placeholder="Vui lòng nhập tên tin tức">{!! old('txtSummary', isset($news) ? $news['summary'] : null) !!}</textarea>
			  	</div>
			  	<div class="form-group">
				  	<label>Nội dung</label>
				  	<textarea type="text" id="editorND" name="txtContent">{!! old('txtContent', isset($news) ? $news['content'] : null) !!}</textarea>
			  	</div>
			  	<div class="form-group">
				  	<label style="margin-right: 21px;">Nổi bật</label>
				  	<label class="radio-inline">
				  		<input style="margin-top: -6px;"  type="radio" name="rdHighlights" value="1"
				  		@if($news['highlights'] == 1)
				  		checked="checked"
				  		@endif
				  		>Có
				  	</label>
					<label class="radio-inline">
						<input style="margin-top: -6px;"  type="radio" name="rdHighlights" value="0"
						@if($news['highlights'] == 0)
				  		checked="checked"
				  		@endif
						>Không
					</label>
			  	</div>
			  	<div class="form-group">
			  		<button type="submit" class="btn btn-primary">Sửa tin tức</button>
			  		<button type="reset" class="btn btn-danger">Làm mới</button>
			  	</div>
			</form>
		</div>
	</div>
	<h2 style="color:#162b86; font-size: 2.5vw;">Bình Luận</h2>
	@if(count($news->comment) != 0)
	<div class="row">
		<div class="col-sm-12">
			<div class="table-cate table-responsive">           
				<table class="table table-bordered table-hover">
			    	<thead>
			      		<tr>
			      			<th>ID</th>
			        		<th>Người Dùng</th>
			        		<th>Nội Dung</th>
			        		<th>Ngày Bình Luận</th>
			        		<th>Thao Tác</th>
			      		</tr>
			    	</thead>
			    	<?php $stt = 0; ?>
			    	@foreach($comment as $itemCM)
			    		<?php $stt = $stt + 1; ?>
					    <tbody>
					      	<tr>
					      		<td>{!! $stt !!}</td>
						        <td>
						        	<?php $nguoidung = DB::table('users')->where("id",$itemCM["users_id"])->first(); ?>
					                @if(!empty($nguoidung->name)) 
					                    {!! $nguoidung->name !!}
					                @endif
						        </td>
						        <td>{!! $itemCM['content'] !!}</td>
						        <td>{!! date("d-m-Y H:i:m", strtotime($itemCM['created_at'])) !!}</td>
						        <td>
						        	<a onclick="return xacnhanxoa('Bạn Có Muốn Xóa Không!!')" class="btn btn-danger" href="{!! URL::route('admin.tintuc.getXoaCM', [$itemCM['id'], $news['id']] ) !!}"><i class="fa fa-trash-o"></i></a>
						        </td>
					      	</tr>
					    </tbody>
				    @endforeach
			  	</table>
			  	{{ $comment->links() }}
			</div>
		</div>
	</div>
	@else
		<div>Không Có Bình Luận</div>
	@endif
</div>
@endsection