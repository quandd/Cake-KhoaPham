@extends('admin.master')

@section('title','San pham ')

@section('main')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Sản phẩm</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				
				<div class="panel panel-primary">
					<div class="panel-heading">Danh sách sản phẩm</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								<a href="#" class="btn btn-primary">Thêm sản phẩm</a>
								<table class="table table-bordered" style="margin-top:20px;">				
									<thead>
										<tr class="bg-primary">
											<th>ID</th>
											<th width="30%">Tên Sản phẩm</th>
											<th>Gia thuong</th>
											<th>Gia khuyen mai</th>
											<th width="20%">Ảnh sản phẩm</th>
											<th>Loai san pham</th>
											<th>Mo ta</th>
											
											<th>Tùy chọn</th>
										</tr>
									</thead>
									<tbody>
										@foreach($products as $product)
										<tr>
											<td>{{$product->id}}</td>
											<td>{{$product->name}}</td>
											<td>{{number_format($product->unit_price)}} đồng</td>
											<td>{{number_format($product->promotion_price)}} đồng</td>
											<td>
												<img width="263px" height="215px" src="image/product/{{$product->image}}">
											</td>
											<td>{{$product->id_type}}</td>
											<td>{{$product->description}}</td>
											<td>
												<a href="#" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
												<a href="#" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>							
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
@endsection
