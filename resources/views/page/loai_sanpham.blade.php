@extends('master')
@section('content')
    <div class="inner-header">
        <div class="container">
            <div class="pull-left">
                <h6 class="inner-title">Sản phẩm {{$categories->name}}</h6>
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb font-large">
                    <a href="{{route('trang-chu')}}">Home</a> / <span>Loại sản phẩm</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="container">
        <div id="content" class="space-top-none">
            <div class="main-content">
                <div class="space60">&nbsp;</div>
                <div class="row">
                    <div class="col-sm-3">
                        <ul class="aside-menu">
                            @foreach($types as $type)
                                <li><a href="{{route('loaisanpham',$type->id)}}">{{$type->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-sm-9">
                        <div class="beta-products-list">
                            <h4>Sản phẩm mới</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">Tìm thấy sản phẩm </p>
                                <div class="clearfix"></div>
                            </div>

                            <div class="row">
                                @foreach($product_type as $product)
                                    <div class="col-sm-4">
                                        <div class="single-item">
                                            @if($product->promotion_price!=0)
                                                <div class="ribbon-wrapper">
                                                    <div class="ribbon sale">Sale</div>
                                                </div>
                                            @endif
                                            <div class="single-item-header">
                                                <a href="{{route('chitietsanpham',$product->id)}}"><img
                                                        src="source/image/product/{{$product->image}}" alt=""
                                                        style="height: 250px"></a>
                                            </div>
                                            <div class="single-item-body">
                                                <p class="single-item-title">{{$product->name}}</p>
                                                <p class="single-item-price"
                                                   style="font-size: 18px; margin-bottom: 10px">
                                                    @if($product->promotion_price !=0)
                                                        <span class="flash-del">{{number_format($product->unit_price)}} đồng</span>
                                                        <span class="flash-sale">{{number_format($product->promotion_price)}} đồng</span>
                                                    @else
                                                        <span>{{number_format($product->unit_price)}} đồng</span>
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="single-item-caption" style="margin-bottom: 30px">
                                                <a class="add-to-cart pull-left"
                                                   href="{{route('themgiohang',$product->id)}}"><i
                                                        class="fa fa-shopping-cart"></i></a>
                                                <a class="beta-btn primary"
                                                   href="{{route('chitietsanpham',$product->id)}}">Details <i
                                                        class="fa fa-chevron-right"></i></a>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div> <!-- .beta-products-list -->

                        <div class="space50">&nbsp;</div>

                        <div class="beta-products-list">
                            <h4>Sản phẩm khác</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">Tìm thấy {{count($product_other)}} sản phẩm khác</p>
                                <div class="clearfix"></div>
                            </div>
                            <div class="row">
                                <div class="row">
                                    @foreach($product_other as $otherproduct)
                                        <div class="col-sm-4">
                                            <div class="single-item">
                                                @if($otherproduct->promotion_price!=0)
                                                    <div class="ribbon-wrapper">
                                                        <div class="ribbon sale">Sale</div>
                                                    </div>
                                                @endif
                                                <div class="single-item-header">
                                                    <a href="{{route('chitietsanpham',$otherproduct->id)}}"><img
                                                            src="source/image/product/{{$otherproduct->image}}" alt=""
                                                            style="height: 250px"></a>
                                                </div>
                                                <div class="single-item-body">
                                                    <p class="single-item-title">{{$otherproduct->name}}</p>
                                                    <p class="single-item-price">
                                                        @if($otherproduct->promotion_price !=0)
                                                            <span class="flash-del">{{number_format($otherproduct->unit_price)}} đồng</span>
                                                            <span class="flash-sale">{{number_format($otherproduct->promotion_price)}} đồng</span>
                                                        @else
                                                            <span>{{number_format($otherproduct->unit_price)}} đồng</span>
                                                        @endif
                                                    </p>
                                                </div>
                                                <div class="single-item-caption" style="margin-bottom: 30px">
                                                    <a class="add-to-cart pull-left" href="shopping_cart.html"><i
                                                            class="fa fa-shopping-cart"></i></a>
                                                    <a class="beta-btn primary" href="product.html">Details <i
                                                            class="fa fa-chevron-right"></i></a>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="row">{{$product_other->links()}}</div>
                            </div>
                            <div class="space40">&nbsp;</div>

                        </div> <!-- .beta-products-list -->
                    </div>
                </div> <!-- end section with sidebar and main content -->


            </div> <!-- .main-content -->
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection
