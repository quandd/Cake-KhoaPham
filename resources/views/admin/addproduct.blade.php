@extends('admin.master')

@section('title','Them San pham ')

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
                    <div class="panel-heading">Thêm sản phẩm</div>
                    <div class="panel-body">
                        @include('errors.note')
                        @if(Session::has('notification'))
                            <p class="alert alert-success">{{Session::get('notification')}}</p>
                        @endif
                        <form method="post"
                              {{--action="{{asset('admin/product/add')}}"--}} enctype="multipart/form-data"
                              class='formId'>
                            @csrf
                            <div class="row" style="margin-bottom:40px">
                                <div class="col-xs-8">
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

                                    <a href="{{asset('admin/product')}}" class="btn btn-danger">Hủy bỏ</a>
                                </div>
                            </div>
                            <input type="submit" id="addproduct" value="Thêm" class="btn btn-primary">
                        </form>

                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>    <!--/.main-->
    <script>
        $('#addproduct').on('click', function (event) {
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
                success: function (data) {
                    console.log(data);
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            })
        })
    </script>
@endsection

