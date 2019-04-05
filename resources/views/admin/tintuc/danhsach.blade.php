@extends('admin.master')
@section('tieude','Danh Sách Tin Tức')
@section('noidung')

<div class="row">
	<div class="col-sm-12">
		@if(Session::has('thongbao'))
			<div class="alert alert-{!! Session::get('thongbao_mau') !!}">
				{!! Session::get('thongbao') !!}
			</div>
		@endif
	</div>
	<div class="col-sm-12">
		<div class="table-cate table-responsive">           
			<table class="table table-bordered table-hover">
		    	<thead>
		      		<tr>
		      			<th>ID</th>
		        		<th>Tiêu đề</th>
		        		<th>Tin Nổi Bật</th>
		        		<th>Lượt Xem</th>
		        		<th>Loại Tin</th>
		        		<th>Ngày Đăng</th>
		        		<th>Thao Tác</th>
		      		</tr>
		    	</thead>
		    	<?php $stt = 0; ?>
		    	@foreach($data as $item)
		    		<?php $stt = $stt + 1; ?>
				    <tbody>
				      	<tr>
				      		<td>{!! $stt !!}</td>
					        <td>{!! $item['title'] !!}</td>
					        <td>
					        	@if($item['highlights'] == 1)
					  				Tin nổi bật
					  			@else
					  				Tin bình thường
					  			@endif
					        </td>
					        <td>{!! $item['views'] !!}</td>
					        <td>
					        	<?php $loaitin = DB::table('type_news')->where('id',$item["type_news_id"])->first(); ?>
				                @if(!empty($loaitin->name)) 
				                    {!! $loaitin->name !!}
				                @endif
					        </td>
					        <td>{!! date("d-m-Y H:i:m", strtotime($item['created_at'])) !!}</td>
					        <td>
					        	<a class="btn btn-success action" href="{!! URL::route('admin.tintuc.getSua', $item['id']) !!}"><i class="fa fa-edit"></i></a>
					        	<a onclick="return xacnhanxoa('Bạn Có Muốn Xóa Không!!')" class="btn btn-danger action" href="{!! URL::route('admin.tintuc.getXoa', $item['id']) !!}"><i class="fa fa-trash-o"></i></a>
					        </td>
				      	</tr>
				    </tbody>
			    @endforeach
		  	</table>
		  	{{ $data->links() }}
		</div>
	</div>
</div>
@stop