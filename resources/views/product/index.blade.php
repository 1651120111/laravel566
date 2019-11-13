@extends('layouts.app')
@section('content')
    <style>
        .sidebar-content .active{
            color:#c2a476;
        }
    </style>
    <!-- breadcrumbs area start -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="{{ route('home') }}">Trang chủ</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>Tên danh mục</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->
    <!-- shop-with-sidebar Start -->
    <div class="shop-with-sidebar">
        <div class="container">
            <div class="row">
                <!-- left sidebar start -->
                <div class="col-md-3 col-sm-12 col-xs-12 text-left">
                    <div class="topbar-left">
                        <aside class="widge-topbar">
                            <div class="bar-title">
                                <div class="bar-ping"><img src="{{ asset('img/bar-ping.png') }}" alt=""></div>
                                <h2>Lọc điều kiện</h2>
                            </div>
                        </aside>
                        <aside class="sidebar-content">
                            <div class="sidebar-title">
                                <h6>Khoảng giá</h6>
                            </div>
                            <ul>
                                <li ><a class="{{Request::get('price') == '1' ?"active": "" }}" href="{{ request()->fullUrlWithQuery(['price'=>1])}}">Dưới 1 triệu</a></li>
                                <li ><a class="{{Request::get('price') == '3' ?"active": "" }}" href="{{ request()->fullUrlWithQuery(['price'=>3])}}">1.000.000 - 3.000.000</a></li>
                                <li ><a class="{{Request::get('price') == '5' ?"active": "" }}" href="{{ request()->fullUrlWithQuery(['price'=>5])}}">3.000.000 - 5.000.000</a></li>
                                <li ><a class="{{Request::get('price') == '7' ?"active": "" }}" href="{{ request()->fullUrlWithQuery(['price'=>7])}}">5.000.000 - 7.000.000</a></li>
                                <li ><a class="{{Request::get('price') == '10' ?"active": "" }}" href="{{ request()->fullUrlWithQuery(['price'=>10])}}">Trên 10 triệu</a></li>
                            </ul>
                        </aside>


                        <aside class="widge-topbar">
                            <div class="bar-title">
                                <div class="bar-ping"><img src="img/bar-ping.png" alt=""></div>
                                <h2>Tags</h2>
                            </div>
                            <div class="exp-tags">
                                <div class="tags">
                                    <a href="#">Nokia</a>
                                    <a href="#">Iphone</a>
                                    <a href="#">Giá rẻ</a>
                                    <a href="#">Hàng cũ</a>
                                    <a href="#">Đồ gia dụng</a>
                                    <a href="#">Đồ cũ</a>

                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
                <!-- left sidebar end -->
                <!-- right sidebar start -->
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <!-- shop toolbar start -->
                    <div class="shop-content-area">
                        <div class="shop-toolbar">
                            <div class="col-xs-12 nopadding-left text-left ">
                                <form class="tree-most" method="get" id="form-order">
                                    <div class="orderby-wrapper pull-right">
                                        <label>Sắp xếp</label>

                                        <select name="orderBy" class="orderby">
                                            <option {{Request::get('orderBy') == 'md'|| !Request::get('orderBy')  ? "selected='selected'": "" }} value="md"" >Mặc định</option>
                                            <option {{Request::get('orderBy') == 'desc' ? "selected='selected'": "" }} value="desc">Mới nhất</option>
                                            <option  {{Request::get('orderBy') == 'asc' ? "selected='selected'": "" }} value="asc">Sản phẩm cũ</option>
                                            <option  {{Request::get('orderBy') == 'price_asc' ? "selected='selected'": "" }} value="price_asc">Giá tăng dần</option>
                                            <option  {{Request::get('orderBy') == 'price_desc' ? "selected='selected'": "" }} value="price_desc">Giá giảm dần</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- shop toolbar end -->
                    <!-- product-row start -->
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="shop-grid-tab">
                            @if(isset($products))
                            <div class="row">
                                @foreach($products as $product)
                                <div class="shop-product-tab first-sale">

                                    <div class="col-lg-4 col-md-4 col-sm-4">


                                                <div class="two-product">
                                            <!-- single-product start -->

                                                    <div class="single-product">
                                                        @if($product->pro_sale >0 )

                                                            <span style="background-image: linear-gradient(-90deg,#ec1f1f 0%,#ff9c00 100%); border-radius: 5px;position: absolute;color: white;padding: 5px;right: 0"> {{$product->pro_sale}} %</span>
                                                        @endif

                                                <div class="product-img">
                                                    <a href="{{ route('get.detail.product',[$product->pro_slug,$product->id]) }}">
                                                        <img class="primary-image" src="{{ pare_url_file($product->pro_avatar) }}" alt="" />
                                                        <img class="secondary-image" src="{{ pare_url_file($product->pro_avatar) }}" alt="" />
                                                    </a>
                                                    <div class="action-zoom">
                                                        <div class="add-to-cart">
                                                            <a href="{{ route('get.detail.product',[$product->pro_slug,$product->id]) }}" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="actions">
                                                        <div class="action-buttons">
                                                            <div class="add-to-links">
                                                                <div class="add-to-wishlist">
                                                                    <a href="{{ route('get.detail.product',[$product->pro_slug,$product->id]) }}" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                                </div>
                                                                <div class="compare-button">
                                                                    <a href="{{ route('add.shopping.cart',$product->id) }}" title="Add to Cart"><i class="icon-bag"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="quickviewbtn">
                                                                <a href="{{ route('get.detail.product',[$product->pro_slug,$product->id]) }}" title="Add to Compare"><i class="fa fa-retweet"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="price-box">
                                                        <span class="new-price">{{ number_format( $product->pro_price)." VNĐ" }}</span>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h2 class="product-name"><a href="{{ route('get.detail.product',[$product->pro_slug,$product->id]) }}">{{ $product->pro_name }}</a></h2>
                                                    <p>{{ $product->pro_description }}</p>
                                                </div>
                                            </div>

                                                </div>
                                            <!-- single-product end -->




                                    </div>


                                </div>
                                @endforeach
                            </div>
                        @endif
                            <!-- product-row end -->
                            <!-- product-row start -->

                        </div>
                        <!-- list view -->
                        <div class="tab-pane fade" id="shop-list-tab">
                            <div class="list-view">
                                <!-- single-product start -->
                                <div class="product-list-wrapper">
                                    <div class="single-product">
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="product-img">
                                                <a href="#">
                                                    <img class="primary-image" src="img/products/product-7.jpg" alt="" />
                                                    <img class="secondary-image" src="img/products/product-2.jpg" alt="" />
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <div class="product-content">
                                                <h2 class="product-name"><a href="#">Cras neque metus</a></h2>
                                                <div class="rating-price">
                                                    <div class="pro-rating">
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                    </div>
                                                    <div class="price-boxes">
                                                        <span class="new-price">$110.00</span>
                                                    </div>
                                                </div>
                                                <div class="product-desc">
                                                    <p>Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Viva</p>
                                                </div>
                                                <div class="actions-e">
                                                    <div class="action-buttons">
                                                        <div class="add-to-cart">
                                                            <a href="#">Add to cart</a>
                                                        </div>
                                                        <div class="add-to-links">
                                                            <div class="add-to-wishlist">
                                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                            </div>
                                                            <div class="compare-button">
                                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Compare"><i class="fa fa-refresh"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product end -->
                                <!-- single-product start -->
                                <div class="product-list-wrapper">
                                    <div class="single-product">
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="product-img">
                                                <a href="#">
                                                    <img class="primary-image" src="img/products/product-7.jpg" alt="" />
                                                    <img class="secondary-image" src="img/products/product-8.jpg" alt="" />
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <div class="product-content">
                                                <h2 class="product-name"><a href="#">Donec non est</a></h2>
                                                <div class="rating-price">
                                                    <div class="pro-rating">
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                    </div>
                                                    <div class="price-boxes">
                                                        <span class="new-price">$450.00</span>
                                                    </div>
                                                </div>
                                                <div class="product-desc">
                                                    <p>Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Viva</p>
                                                </div>
                                                <div class="actions-e">
                                                    <div class="action-buttons">
                                                        <div class="add-to-cart">
                                                            <a href="#">Add to cart</a>
                                                        </div>
                                                        <div class="add-to-links">
                                                            <div class="add-to-wishlist">
                                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                            </div>
                                                            <div class="compare-button">
                                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Compare"><i class="fa fa-refresh"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product end -->
                                <!-- single-product start -->
                                <div class="product-list-wrapper">
                                    <div class="single-product">
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="product-img">
                                                <a href="#">
                                                    <img class="primary-image" src="img/products/product-5.jpg" alt="" />
                                                    <img class="secondary-image" src="img/products/product-6.jpg" alt="" />
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <div class="product-content">
                                                <h2 class="product-name"><a href="#">Occaecati cupiditate</a></h2>
                                                <div class="rating-price">
                                                    <div class="pro-rating">
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                    </div>
                                                    <div class="price-boxes">
                                                        <span class="new-price">$380.00</span>
                                                    </div>
                                                </div>
                                                <div class="product-desc">
                                                    <p>Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Viva</p>
                                                </div>
                                                <div class="actions-e">
                                                    <div class="action-buttons">
                                                        <div class="add-to-cart">
                                                            <a href="#">Add to cart</a>
                                                        </div>
                                                        <div class="add-to-links">
                                                            <div class="add-to-wishlist">
                                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                            </div>
                                                            <div class="compare-button">
                                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Compare"><i class="fa fa-refresh"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product end -->
                                <!-- single-product start -->
                                <div class="product-list-wrapper">
                                    <div class="single-product">
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="product-img">
                                                <a href="#">
                                                    <img class="primary-image" src="img/products/product-11.jpg" alt="" />
                                                    <img class="secondary-image" src="img/products/product-12.jpg" alt="" />
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <div class="product-content">
                                                <h2 class="product-name"><a href="#">Cras neque metus</a></h2>
                                                <div class="rating-price">
                                                    <div class="pro-rating">
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                    </div>
                                                    <div class="price-boxes">
                                                        <span class="new-price">$340.00</span>
                                                    </div>
                                                </div>
                                                <div class="product-desc">
                                                    <p>Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Viva</p>
                                                </div>
                                                <div class="actions-e">
                                                    <div class="action-buttons">
                                                        <div class="add-to-cart">
                                                            <a href="#">Add to cart</a>
                                                        </div>
                                                        <div class="add-to-links">
                                                            <div class="add-to-wishlist">
                                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                            </div>
                                                            <div class="compare-button">
                                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Compare"><i class="fa fa-refresh"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product end -->
                                <!-- single-product start -->
                                <div class="product-list-wrapper">
                                    <div class="single-product">
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="product-img">
                                                <a href="#">
                                                    <img class="primary-image" src="img/products/product-9.jpg" alt="" />
                                                    <img class="secondary-image" src="img/products/product-10.jpg" alt="" />
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <div class="product-content">
                                                <h2 class="product-name"><a href="#">Voluptas nulla</a></h2>
                                                <div class="rating-price">
                                                    <div class="pro-rating">
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                    </div>
                                                    <div class="price-boxes">
                                                        <span class="new-price">$400.00</span>
                                                    </div>
                                                </div>
                                                <div class="product-desc">
                                                    <p>Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Viva</p>
                                                </div>
                                                <div class="actions-e">
                                                    <div class="action-buttons">
                                                        <div class="add-to-cart">
                                                            <a href="#">Add to cart</a>
                                                        </div>
                                                        <div class="add-to-links">
                                                            <div class="add-to-wishlist">
                                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                            </div>
                                                            <div class="compare-button">
                                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Compare"><i class="fa fa-refresh"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product end -->
                                <!-- single-product start -->
                                <div class="product-list-wrapper">
                                    <div class="single-product">
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="product-img">
                                                <a href="#">
                                                    <img class="primary-image" src="img/products/product-6.jpg" alt="" />
                                                    <img class="secondary-image" src="img/products/product-7.jpg" alt="" />
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <div class="product-content">
                                                <h2 class="product-name"><a href="#">Primis in faucibus</a></h2>
                                                <div class="rating-price">
                                                    <div class="pro-rating">
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                    </div>
                                                    <div class="price-boxes">
                                                        <span class="new-price">$200.00</span>
                                                    </div>
                                                </div>
                                                <div class="product-desc">
                                                    <p>Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Viva</p>
                                                </div>
                                                <div class="actions-e">
                                                    <div class="action-buttons">
                                                        <div class="add-to-cart">
                                                            <a href="#">Add to cart</a>
                                                        </div>
                                                        <div class="add-to-links">
                                                            <div class="add-to-wishlist">
                                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                            </div>
                                                            <div class="compare-button">
                                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Compare"><i class="fa fa-refresh"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product end -->
                                <!-- single-product start -->
                                <div class="product-list-wrapper">
                                    <div class="single-product">
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="product-img">
                                                <a href="#">
                                                    <img class="primary-image" src="img/products/product-4.jpg" alt="" />
                                                    <img class="secondary-image" src="img/products/product-5.jpg" alt="" />
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <div class="product-content">
                                                <h2 class="product-name"><a href="#">Quisque in arcu</a></h2>
                                                <div class="rating-price">
                                                    <div class="pro-rating">
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                    </div>
                                                    <div class="price-boxes">
                                                        <span class="new-price">$440.00</span>
                                                    </div>
                                                </div>
                                                <div class="product-desc">
                                                    <p>Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Viva</p>
                                                </div>
                                                <div class="actions-e">
                                                    <div class="action-buttons">
                                                        <div class="add-to-cart">
                                                            <a href="#">Add to cart</a>
                                                        </div>
                                                        <div class="add-to-links">
                                                            <div class="add-to-wishlist">
                                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                            </div>
                                                            <div class="compare-button">
                                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Compare"><i class="fa fa-refresh"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product end -->
                                <!-- single-product start -->
                                <div class="product-list-wrapper">
                                    <div class="single-product">
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="product-img">
                                                <a href="#">
                                                    <img class="primary-image" src="img/products/product-2.jpg" alt="" />
                                                    <img class="secondary-image" src="img/products/product-3.jpg" alt="" />
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <div class="product-content">
                                                <h2 class="product-name"><a href="#">Imperial Consequences</a></h2>
                                                <div class="rating-price">
                                                    <div class="pro-rating">
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                    </div>
                                                    <div class="price-boxes">
                                                        <span class="new-price">$334.00</span>
                                                    </div>
                                                </div>
                                                <div class="product-desc">
                                                    <p>Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Viva</p>
                                                </div>
                                                <div class="actions-e">
                                                    <div class="action-buttons">
                                                        <div class="add-to-cart">
                                                            <a href="#">Add to cart</a>
                                                        </div>
                                                        <div class="add-to-links">
                                                            <div class="add-to-wishlist">
                                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                            </div>
                                                            <div class="compare-button">
                                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Compare"><i class="fa fa-refresh"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product end -->
                                <!-- single-product start -->
                                <div class="product-list-wrapper">
                                    <div class="single-product">
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="product-img">
                                                <a href="#">
                                                    <img class="primary-image" src="img/products/product-4.jpg" alt="" />
                                                    <img class="secondary-image" src="img/products/product-2.jpg" alt="" />
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <div class="product-content">
                                                <h2 class="product-name"><a href="#">Consequences</a></h2>
                                                <div class="rating-price">
                                                    <div class="pro-rating">
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                    </div>
                                                    <div class="price-boxes">
                                                        <span class="new-price">$220.00</span>
                                                    </div>
                                                </div>
                                                <div class="product-desc">
                                                    <p>Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Viva</p>
                                                </div>
                                                <div class="actions-e">
                                                    <div class="action-buttons">
                                                        <div class="add-to-cart">
                                                            <a href="#">Add to cart</a>
                                                        </div>
                                                        <div class="add-to-links">
                                                            <div class="add-to-wishlist">
                                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                            </div>
                                                            <div class="compare-button">
                                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Compare"><i class="fa fa-refresh"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product end -->
                                <!-- single-product start -->
                                <div class="product-list-wrapper">
                                    <div class="single-product">
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="product-img">
                                                <a href="#">
                                                    <img class="primary-image" src="img/products/product-1.jpg" alt="" />
                                                    <img class="secondary-image" src="img/products/product-1.jpg" alt="" />
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <div class="product-content">
                                                <h2 class="product-name"><a href="#">Proin lectus ipsum</a></h2>
                                                <div class="rating-price">
                                                    <div class="pro-rating">
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                    </div>
                                                    <div class="price-boxes">
                                                        <span class="new-price">$230.00</span>
                                                    </div>
                                                </div>
                                                <div class="product-desc">
                                                    <p>Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Viva</p>
                                                </div>
                                                <div class="actions-e">
                                                    <div class="action-buttons">
                                                        <div class="add-to-cart">
                                                            <a href="#">Add to cart</a>
                                                        </div>
                                                        <div class="add-to-links">
                                                            <div class="add-to-wishlist">
                                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                            </div>
                                                            <div class="compare-button">
                                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Compare"><i class="fa fa-refresh"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product end -->
                            </div>
                        </div>
                        <!-- shop toolbar start -->
                        <div class="shop-content-bottom">
                            <div class="shop-toolbar btn-tlbr">
                                <div class="col-md-4 col-sm-4 col-xs-12 hidden-xs nopadding-left text-left">

                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                                    <div class="pages">
                                        {{$products->links()}}
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- shop toolbar end -->
                    </div>
                </div>
                <!-- right sidebar end -->
            </div>
        </div>
    </div>
    <!-- shop-with-sidebar end -->
    <!-- Brand Logo Area Start -->
    <div class="brand-area">
        <div class="container">
            <div class="row">
                <div class="brand-carousel">
                    <div class="brand-item"><a href="#"><img src="img/brand/bg1-brand.jpg" alt="" /></a></div>
                    <div class="brand-item"><a href="#"><img src="img/brand/bg2-brand.jpg" alt="" /></a></div>
                    <div class="brand-item"><a href="#"><img src="img/brand/bg3-brand.jpg" alt="" /></a></div>
                    <div class="brand-item"><a href="#"><img src="img/brand/bg4-brand.jpg" alt="" /></a></div>
                    <div class="brand-item"><a href="#"><img src="img/brand/bg5-brand.jpg" alt="" /></a></div>
                    <div class="brand-item"><a href="#"><img src="img/brand/bg2-brand.jpg" alt="" /></a></div>
                    <div class="brand-item"><a href="#"><img src="img/brand/bg3-brand.jpg" alt="" /></a></div>
                    <div class="brand-item"><a href="#"><img src="img/brand/bg4-brand.jpg" alt="" /></a></div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script>
        $(function () {
            $('.orderby').change(function(){
                $('#form-order').submit();
            })
        })
    </script>

@stop
