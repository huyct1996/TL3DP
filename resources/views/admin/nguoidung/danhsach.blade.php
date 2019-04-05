@extends('admin.master')
@section('tieude','Danh Sách Người Dùng')
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
		        		<th>Tên Người Dùng</th>
		        		<th>Email</th>
		        		<th>Quyền</th>
		        		<th>Thao Tác</th>
		      		</tr>
		    	</thead>
		    	<?php $stt = 0; ?>
		    	@foreach($nguoidung as $item)
		    		<?php $stt = $stt + 1; ?>
				    <tbody>
				      	<tr>
				      		<td>{!! $stt !!}</td>
					        <td>{!! $item['name'] !!}</td>
					        <td>{!! $item['email'] !!}</td>
					        <td>
					        	@if($item['level'] == 1 && $item['id'] != 1)
					  				<p style="color:#d5850f">Admin</p>
					  			@elseif($item['level'] == 0)
					  				<p style="color:#0b66db">Nhân viên</p>
					  			@elseif($item['level'] == 1 && $item['id'] == 1)
					  				<p style="color:#c21913">Admin Chính</p>
					  			@else
					  				<p>Người dùng</p>
					  			@endif
					        </td>
					        <td>
					        	<a class="btn btn-success action" href="{!! URL::route('admin.nguoidung.getSua', $item['id']) !!}"><i class="fa fa-edit"></i></a>
					        	<a onclick="return xacnhanxoa('Bạn Có Muốn Xóa Không!!')" class="btn btn-danger action" href="{!! URL::route('admin.nguoidung.getXoa', $item['id']) !!}"><i class="fa fa-trash-o"></i></a>
					        </td>
				      	</tr>
				    </tbody>
			    @endforeach
		  	</table>
		  	{{ $nguoidung->links() }}
		</div>
	</div>
</div>
@stop