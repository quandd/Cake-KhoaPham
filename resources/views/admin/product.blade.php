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
                        @if(Session::has('note'))
                            <p class="alert alert-danger">{{Session::get('note')}}</p>
                        @endif
						@if(Session::has('notification'))
								<p class="alert alert-success">{{Session::get('notification')}}</p>
                        @endif
						<div class="bootstrap-table">
							<div class="table-responsive">
								<a class="btn btn-primary add-modal">Thêm sản phẩm</a>
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
									<tbody id="newtr">
										@foreach($products as $product)
										<tr id="{{$product->id}}">
											<td>{{$product->id}}</td>
											<td>{{$product->name}}</td>
											<td>{{number_format($product->unit_price)}} đồng</td>
											@if($product->promotion_price==0)
											<td>Khong khuyen mai</td>
											@else
											<td>{{number_format($product->promotion_price)}} đồng</td>
											@endif
											<td>
												<img width="100%" src="image/product/{{$product->image}}">
											</td>
											<td>{{$product->id_type}}</td>
											<td>{{$product->description}}</td>
											<td>
												<a  class="btn btn-warning edit-modal"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
												<button  class="deleteproduct btn btn-danger" onclick="delproduct({{$product->id}})"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</button>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
								<div class="row">{{$products->links()}}</div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->

{{--    Modal form to add product--}}
    <div id="addModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form method="post"
                          {{--action="{{asset('admin/product/add')}}"--}} enctype="multipart/form-data"
                          class='formId '>
                        @csrf
                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input required type="text" id="name" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Miêu tả</label>
                            <textarea required name="desc" id="desc"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Giá sản phẩm</label>
                            <input required type="text" id="u_price" name="u_price" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Giá khuyen mai</label>
                            <input required type="text" id="p_price" name="p_price" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Don vi</label>
                            <select required name="unit" id="unit" class="form-control">
                                <option value="Cai">Cai</option>
                                <option value="Hop">Hop</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tinh trang</label>
                            <select required name="new" id="new" class="form-control">
                                <option value="1">New</option>
                                <option value="0">Like New</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Danh mục</label>
                            <select required name="cate" id="cate" class="form-control">
                                @foreach($catelist as $cates)
                                    <option value="{{$cates->id}}">{{$cates->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Ảnh sản phẩm</label>
                            <input type="file" name="img" id="img" class="form-control">
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success add" data-dismiss="modal">
                            <span id="" class='glyphicon glyphicon-check'></span> Add
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal form to edit a form -->
    <div id="editModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id">ID:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id_edit" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="title">Name:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name_edit" autofocus>
                                <p class="errorTitle text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="title">Gia thuong:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="uPrice_edit" autofocus>
                                <p class="errorTitle text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="title">Gia khuyen mai:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="pPrice_edit" autofocus>
                                <p class="errorTitle text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="content">Content:</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="content_edit" cols="40" rows="5"></textarea>
                                <p class="errorContent text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary edit" data-dismiss="modal">
                            <span class='glyphicon glyphicon-check'></span> Edit
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

    <!-- Bootstrap JavaScript -->
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.1/js/bootstrap.min.js"></script>

    <!-- toastr notifications -->
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <!-- icheck checkboxes -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>

    <!-- Delay table load until everything else is loaded -->
    <script>
        $(window).load(function(){
            $('#postTable').removeAttr('style');
        })
    </script>

    <!-- AJAX CRUD operations -->
    <script type="text/javascript">
        // add a new product
        $(document).on('click', '.add-modal', function() {
            $('.modal-title').text('Add Product');
            $('#addModal').modal('show');
        });
        $('.modal-footer').on('click', '.add', function() {
            event.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var form = $('.formId')[0];
            var formData = new FormData(form);
            for (var [key, value] of formData.entries()) {
                console.log(key, value);
            }
            $.ajax({
                url: "{{asset('admin/product/add')}}",
                type: 'POST',
                enctype: 'multipart/form-data',
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) {
                    console.log(response);
                    let promotion='';
                    if(response.promotion_price==0)
                    {
                        promotion='<td>Khong khuyen mai</td>';
                    }
                    else {
                        promotion='<td>'+response.promotion_price+'</td>';
                    }
                    $('#newtr').prepend('<tr>'+
                        '<td>'+response.id +'</td>'+
                        '<td>'+response.name +'</td>'+
                        '<td>'+response.unit_price +'</td>'+

                        promotion+
                        '<td><img style="max-width: 100%" alt=""  src="image/product/'+response.image +'"' +'></td>'+
                        '<td>'+response.id_type +'</td>'+
                        '<td>'+response.description +'</td>'+
                        '<td>'+
                        '<a class="btn btn-warning edit-modal">'+'<i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>'+
                    '<button  class="deleteproduct btn btn-danger" onclick="delproduct({{$product->id}})"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</button>'+
                    '</td>'+
                    '</tr>');
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            })
        })
        // Edit a post
        $(document).on('click', '.edit-modal', function() {
            $('.modal-title').text('Edit');
            $('#id_edit').val($(this).data('id'));
            $('#name_edit').val($(this).data('name'));
            $('#uPrice_edit').val($(this).data('unit_price'));
            $('#pPrice_edit').val($(this).data('promotion_price'));
            $('#content_edit').val($(this).data('desc'));
            id = $('#id_edit').val();
            $('#editModal').modal('show');
        });
        $('.modal-footer').on('click', '.edit', function() {
            $.ajax({
                type: 'PUT',
                url: "{{asset('admin/product/edit')}}" + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': $("#id_edit").val(),
                    'title': $('#name_edit').val(),
                    'content': $('#content_edit').val()
                },
                success: function(data) {
                    $('.errorTitle').addClass('hidden');
                    $('.errorContent').addClass('hidden');

                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#editModal').modal('show');
                            toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                        }, 500);

                        if (data.errors.title) {
                            $('.errorTitle').removeClass('hidden');
                            $('.errorTitle').text(data.errors.title);
                        }
                        if (data.errors.content) {
                            $('.errorContent').removeClass('hidden');
                            $('.errorContent').text(data.errors.content);
                        }
                    } else {
                        toastr.success('Successfully updated Post!', 'Success Alert', {timeOut: 5000});
                        $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.title + "</td><td>" + data.content + "</td><td class='text-center'><input type='checkbox' class='edit_published' data-id='" + data.id + "'></td><td>Right now</td><td><button class='show-modal btn btn-success' data-id='" + data.id + "' data-title='" + data.title + "' data-content='" + data.content + "'><span class='glyphicon glyphicon-eye-open'></span> Show</button> <button class='edit-modal btn btn-info' data-id='" + data.id + "' data-title='" + data.title + "' data-content='" + data.content + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-title='" + data.title + "' data-content='" + data.content + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");

                        if (data.is_published) {
                            $('.edit_published').prop('checked', true);
                            $('.edit_published').closest('tr').addClass('warning');
                        }
                        $('.edit_published').iCheck({
                            checkboxClass: 'icheckbox_square-yellow',
                            radioClass: 'iradio_square-yellow',
                            increaseArea: '20%'
                        });
                        $('.edit_published').on('ifToggled', function(event) {
                            $(this).closest('tr').toggleClass('warning');
                        });

                    }
                }
            });
        });
        //xoa product
      function delproduct (id) {
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          $.ajax({
              url: "http://localhost/admin/product/delete/"+id,
              type: 'get',
              dataType:'json',
              success: function (response) {
                  $('#'+id).remove();
              },
              error: function (data) {
                  console.log('Error:', data);
              }
          })

        }
    </script>
@endsection
