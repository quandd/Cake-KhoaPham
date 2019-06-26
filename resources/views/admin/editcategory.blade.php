@extends('admin.master')

@section('title','Sửa danh mục ')

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
							Sửa danh mục
						</div>
						<div class="panel-body">
						@include('errors.note')
							<form method="post" action="{{asset('admin/category/edit/'.$cates->id)}}" enctype="multipart/form-data">
								@csrf
							<div class="form-group">
								<label>Tên danh mục:</label>
    							<input type="text" name="name" class="form-control" placeholder="Tên danh mục..." value="{{$cates->name}}">
							</div>
							<label>Mo ta:</label>
    							<input type="text" name="desc" class="form-control" placeholder="Mo ta danh muc..." value="{{$cates->description}}">    							
								</div>
							<div class="form-group" >
										<label>Ảnh sản phẩm</label>
										<input type="file" name="img" class="form-control">
										<img id="avatar" class="thumbnail" width="300px" src="image/product/{{$cates->image}}">
							</div>
							<div class="form-group">							
    							<input type="submit" name="submit" class="form-control btn btn-primary" placeholder="Tên danh mục..." value="Edit">
							</div>
							<div class="form-group">							
    							<a href="{{asset('admin/category')}}" class="form-control btn btn-danger">Huy bo</a>
							</div>
							</form>
						</div>
					</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
@endsection