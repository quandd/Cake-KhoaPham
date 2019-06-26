@extends('admin.master')

@section('title','Danh mục sản phẩm ')

@section('main')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh mục sản phẩm</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-5 col-lg-5">
					<div class="panel panel-primary">
						<div class="panel-heading">
							Thêm danh mục
						</div>
						<div class="panel-body">
							@include('errors.note')
							@if(Session::has('notification'))
								<p class="alert alert-success">{{Session::get('notification')}}</p>
							@endif
							<form method="post" action="{{asset('admin/category/add')}}" enctype="multipart/form-data">
								@csrf
								<div class="form-group">
								<label>Tên danh mục:</label>
    							<input type="text" name="name" class="form-control" placeholder="Tên danh mục...">
								</div>
								<div class="form-group">
								<label>Mo ta:</label>
    							<input type="text" name="desc" class="form-control" placeholder="Mo ta danh muc...">
								</div>
								<div class="form-group" >
										<label>Ảnh sản phẩm</label>
										<input type="file" name="img" class="form-control" required="">
								</div>
								<div class="form-group">							
    							<input type="submit" name="submit" class="form-control btn btn-primary" placeholder="Tên danh mục..." value="Them moi">
								</div>
							</form>
						</div>
					</div>
			</div>
			<div class="col-xs-12 col-md-7 col-lg-7">
				<div class="panel panel-primary">
					<div class="panel-heading">Danh sách danh mục</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<table class="table table-bordered">
				              	<thead>
					                <tr class="bg-primary">
					                  <th>Tên danh mục</th>
					                  <th>Mo ta</th>
					                  <th>Image</th>
					                  <th style="width:30%">Tùy chọn</th>
					                </tr>
				              	</thead>
				              	<tbody>
				              	@foreach($cates as $cate)
								<tr>
									<td>{{$cate->name}}</td>
									<td>{{$cate->description}}</td>
									<td>
												<img width="263px" height="215px" src="image/product/{{$cate->image}}">
											</td>
									<td>
			                    		<a href="{{asset('admin/category/edit/'.$cate->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Sửa</a>
			                    		<a href="{{asset('admin/category/delete/'.$cate->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa</a>
			                  		</td>
			                  	</tr>
			                  	@endforeach
				                </tbody>

				            </table>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
@endsection