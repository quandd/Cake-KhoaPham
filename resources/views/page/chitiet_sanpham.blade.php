@extends('master')
@section('content')
    <div class="inner-header">
        <div class="container">
            <div class="pull-left">
                <h6 class="inner-title">Sản phẩm {{$products->name}}</h6>
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb font-large">
                    <a href="{{route('trang-chu')}}">Trang chủ</a> / <span>Thông tin chi tiết sản phẩm</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="container">
        <div id="content">
            <div class="row">
                <div class="col-sm-9">

                    <div class="row">
                        <div class="col-sm-4">
                            <img src="source/image/product/{{$products->image}}" alt="">
                        </div>
                        <div class="col-sm-8">
                            <div class="single-item-body">
                                <p class="single-item-title">
                                <h2>{{$products->name}}</h2></p>
                                <p class="single-item-price">
                                    @if($products->promotion_price==0)
                                        <span class="flash-sale">{{$products->unit_price}} đồng</span>
                                    @else
                                        <span class="flash-del">{{$products->unit_price}} đồng</span>
                                        <span class="flash-sale">{{$products->promotion_price}} đồng</span>
                                    @endif
                                </p>
                            </div>

                            <div class="clearfix"></div>
                            <div class="space20">&nbsp;</div>

                            <div class="single-item-desc">
                                <p>{{$products->description}}</p>
                            </div>
                            <div class="space20">&nbsp;</div>

                            <p>Số lượng:</p>
                            <div class="single-item-options">

                                <select class="wc-select" name="color">
                                    <option>Số lượng</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>

                                <a class="add-to-cart" href="{{route('themgiohang',$products->id)}}"><i
                                        class="fa fa-shopping-cart"></i></a>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                    <div class="space40">&nbsp;</div>
                    <div class="woocommerce-tabs">
                        <ul class="tabs">
                            <li><a href="#tab-description">Mô tả</a></li>

                        </ul>

                        <div class="panel" id="tab-description">
                            <p>{{$products->description}}</p>
                        </div>

                    </div>
                    <div class="space50">&nbsp;</div>
                    <div class="beta-products-list">
                        <h4 style="margin-bottom: 30px">Sản phẩm tương tự</h4>

                        <div class="row">
                            @foreach($products_same as $sameproduct)
                                <div class="col-sm-4">
                                    <div class="single-item">
                                        @if($sameproduct->promotion_price!=0)
                                            <div class="ribbon-wrapper">
                                                <div class="ribbon sale">Sale</div>
                                            </div>
                                        @endif
                                        <div class="single-item-header">
                                            <a href="{{route('chitietsanpham',$sameproduct->id)}}"><img
                                                    src="source/image/product/{{$sameproduct->image}}" alt=""
                                                    style="height: 250px"></a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title">{{$sameproduct->name}}</p>
                                            <p class="single-item-price">
                                                @if($sameproduct->promotion_price !=0)
                                                    <span class="flash-del">{{$sameproduct->unit_price}} đồng</span>
                                                    <span
                                                        class="flash-sale">{{$sameproduct->promotion_price}} đồng</span>
                                                @else
                                                    <span>{{$sameproduct->unit_price}} đồng</span>
                                                @endif
                                            </p>
                                        </div>
                                        <div class="single-item-caption" style="margin-bottom: 30px">
                                            <a class="add-to-cart pull-left"
                                               href="{{route('themgiohang',$sameproduct->id)}}"><i
                                                    class="fa fa-shopping-cart"></i></a>
                                            <a class="beta-btn primary" href="product.html">Details <i
                                                    class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row">{{$products_same->links()}}</div>
                    </div> <!-- .beta-products-list -->
                </div>
                <div class="col-sm-3 aside">
                    <div class="widget">
                        <h3 class="widget-title">Best Sellers</h3>
                        <div class="widget-body">
                            <div class="beta-sales beta-lists">
                                <div class="media beta-sales-item">
                                    <a class="pull-left" href="product.html"><img
                                            src="source/assets/dest/images/products/sales/1.png" alt=""></a>
                                    <div class="media-body">
                                        Sample Woman Top
                                        <span class="beta-sales-price">$34.55</span>
                                    </div>
                                </div>
                                <div class="media beta-sales-item">
                                    <a class="pull-left" href="product.html"><img
                                            src="source/assets/dest/images/products/sales/2.png" alt=""></a>
                                    <div class="media-body">
                                        Sample Woman Top
                                        <span class="beta-sales-price">$34.55</span>
                                    </div>
                                </div>
                                <div class="media beta-sales-item">
                                    <a class="pull-left" href="product.html"><img
                                            src="source/assets/dest/images/products/sales/3.png" alt=""></a>
                                    <div class="media-body">
                                        Sample Woman Top
                                        <span class="beta-sales-price">$34.55</span>
                                    </div>
                                </div>
                                <div class="media beta-sales-item">
                                    <a class="pull-left" href="product.html"><img
                                            src="source/assets/dest/images/products/sales/4.png" alt=""></a>
                                    <div class="media-body">
                                        Sample Woman Top
                                        <span class="beta-sales-price">$34.55</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- best sellers widget -->
                    <div class="widget">
                        <h3 class="widget-title">New Products</h3>
                        <div class="widget-body">
                            <div class="beta-sales beta-lists">
                                <div class="media beta-sales-item">
                                    <a class="pull-left" href="product.html"><img
                                            src="source/assets/dest/images/products/sales/1.png" alt=""></a>
                                    <div class="media-body">
                                        Sample Woman Top
                                        <span class="beta-sales-price">$34.55</span>
                                    </div>
                                </div>
                                <div class="media beta-sales-item">
                                    <a class="pull-left" href="product.html"><img
                                            src="source/assets/dest/images/products/sales/2.png" alt=""></a>
                                    <div class="media-body">
                                        Sample Woman Top
                                        <span class="beta-sales-price">$34.55</span>
                                    </div>
                                </div>
                                <div class="media beta-sales-item">
                                    <a class="pull-left" href="product.html"><img
                                            src="source/assets/dest/images/products/sales/3.png" alt=""></a>
                                    <div class="media-body">
                                        Sample Woman Top
                                        <span class="beta-sales-price">$34.55</span>
                                    </div>
                                </div>
                                <div class="media beta-sales-item">
                                    <a class="pull-left" href="product.html"><img
                                            src="source/assets/dest/images/products/sales/4.png" alt=""></a>
                                    <div class="media-body">
                                        Sample Woman Top
                                        <span class="beta-sales-price">$34.55</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- best sellers widget -->
                </div>
            </div>
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection
