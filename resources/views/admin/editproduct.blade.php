@extends('admin.master')
@section('title','Sua San pham ')
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
					<div class="panel-heading">Sửa sản phẩm</div>
					<div class="panel-body">
						@include('errors.note')
						@if(Session::has('notification'))
								<p class="alert alert-success">{{Session::get('notification')}}</p>
							@endif
							<form method="post" action="{{asset('admin/product/edit/'.$products->id)}}" enctype="multipart/form-data">
								@csrf
							<div class="form-group">
								<label>Tên danh mục:</label>
    							<input type="text" name="name" class="form-control" placeholder="Tên danh mục..." value="{{$products->name}}">
							</div>
							<div class="form-group">
							<label>Mo ta:</label>
    							<input type="text" name="desc" class="form-control" placeholder="Mo ta danh muc..." value="{{$products->description}}">    							
							</div>
							<div class="form-group">
							<label>Gia san pham:</label>
    							<input type="text" name="u_price" class="form-control" placeholder="Mo ta danh muc..." value="{{$products->unit_price}}">
							</div>
							<div class="form-group">
							<label>Gia khuyen mai:</label>
    							<input type="text" name="p_price" class="form-control" placeholder="Mo ta danh muc..." value="{{$products->promotion_price}}">
							</div>
							<div class="form-group">
							<label>Don vi:</label>
    							<input type="text" name="unit" class="form-control" placeholder="Mo ta danh muc..." value="{{$products->unit}}">
							</div>
							<div class="form-group" >
										<label>Tinh trang</label>
										<select required name="new" class="form-control">
											<option value="{{$products->new==1}}">New</option>
											<option value="{{$products->new==0}}">Like New</option>
					                    </select>
							</div>
							<div class="form-group" >
										<label>Danh mục</label>
										<select required name="cate" class="form-control">
											@foreach($catelist as $cates)
                                                @if($products->id_type == $cates->id)
											<option value="{{$cates->id}}" selected>{{$cates->name}}</option>
                                                @else
                                                    <option value="{{$cates->id}}">{{$cates->name}}</option>
                                                    @endif
											@endforeach
					                    </select>
							</div>


							<div class="form-group" >
										<label>Ảnh sản phẩm</label>
										<input type="file" name="img" class="form-control">
										<img id="avatar" class="thumbnail" width="300px" src="image/product/{{$products->image}}">
							</div>
							<div class="form-group">							
    							<input type="submit" name="submit" class="form-control btn btn-primary" placeholder="Tên danh mục..." value="Edit">
							</div>
							<div class="form-group">							
    							<a href="{{asset('admin/product')}}" class="form-control btn btn-danger">Huy bo</a>
							</div>
							</form>
						</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
@endsection
