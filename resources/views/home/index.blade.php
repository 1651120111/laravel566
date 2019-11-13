@extends('layouts.app')
@section('content')
    @include('components.slide')
    <!-- product section start -->
    <style>
        i.fa.fa-star.active{
            color: #ff9705;
        }
    </style>

    <div class="our-product-area new-product">
        <div class="container">
            <div class="area-title">
                <h2>Sản phẩm nổi bật</h2>
            </div>
            <!-- our-product area start -->
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="features-curosel">
                        @if(isset($productHot))
                            <!-- single-product start -->
                                @foreach($productHot as $proHOt)
                                    <div class="col-lg-12 col-md-12">

                                        <div class="single-product first-sale">

                                            <div class="product-img">
                                                @if($proHOt->pro_number ==0)

                                                    <span style="background-color: #d22525; border-radius: 5px;position: absolute;color: white;padding: 5px;"> Tạm hết hàng</span>
                                                @endif
                                                @if($proHOt->pro_sale >0 )

                                                    <span style="background-image: linear-gradient(-90deg,#ec1f1f 0%,#ff9c00 100%); border-radius: 5px;position: absolute;color: white;padding: 5px;right: 0"> {{$proHOt->pro_sale}} %</span>
                                                @endif
                                                <a href="{{ route('get.detail.product',[$proHOt->pro_slug,$proHOt->id]) }}">
                                                    <img class="primary-image" src="{{ pare_url_file($proHOt->pro_avatar) }}" alt="" />
                                                    <img class="secondary-image" src="{{ pare_url_file($proHOt->pro_avatar) }}" alt="" />
                                                </a>
                                                <div class="action-zoom">
                                                    <div class="add-to-cart">
                                                        <a href="{{ route('get.detail.product',[$proHOt->pro_slug,$proHOt->id]) }}" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                                    </div>
                                                </div>
                                                <div class="actions">
                                                    <div class="action-buttons">
                                                        <div class="add-to-links">
                                                            <div class="add-to-wishlist">
                                                                <a href="{{ route('get.detail.product',[$proHOt->pro_slug,$proHOt->id]) }}" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                            </div>
                                                            <div class="compare-button">
                                                                <a href="{{ route('add.shopping.cart',$proHOt->id) }}" title="Add to Cart"><i class="icon-bag"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="quickviewbtn">
                                                            <a href="{{ route('get.detail.product',[$proHOt->pro_slug,$proHOt->id]) }}" title="Add to Compare"><i class="fa fa-retweet"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="price-box">
                                                    <span class="new-price">{{ number_format($proHOt->pro_price) }} VNĐ</span>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h2 class="product-name"><a href="#">{{ $proHOt->pro_name }}</a></h2>
                                                <p>{{ $proHOt->pro_description }}</p>
                                            </div>

                                        </div>

                                    </div>
                            @endforeach
                        @endif

                        <!-- single-product end -->

                        </div>
                    </div>
                </div>
            </div>
            <!-- our-product area end -->
        </div>
    </div>

    <!-- product section end -->
    <div id="product_view">

    </div>
    <!-- latestpost area start -->
    @if(isset($articleNews))
    <div class="latest-post-area">
        <div class="container">
            <div class="area-title">
                <h2>Bài viết mới</h2>
            </div>
            <div class="row">
                <div class="all-singlepost">
                    <!-- single latestpost start -->
                    @foreach($articleNews as $articleNew)
                    <div class="col-md-4 col-sm-4 col-xs-12" style="max-height: 400px; margin-bottom: 30px">
                        <div class="single-post">
                            <div class="post-thumb">
                                <a href="#">
                                    <img height="280px" width="370px" src="{{ asset(pare_url_file($articleNew->a_avatar)) }}" alt="" />
                                </a>
                            </div>
                            <div class="post-thumb-info" style="max-height: 120px">
                                <div class="post-time"  style="overflow: hidden;height: 25px">
                                    <a href="#">{{ $articleNew->a_name }}</a>

                                </div>
                                <div class="postexcerpt">
                                    <p style="overflow: hidden;height: 25px">{{ $articleNew->a_description }}</p>
                                    <a href="#" class="read-more">Xem thêm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <!-- single latestpost end -->
            </div>
        </div>
        </div>
    </div>
    @endif
    <!-- latestpost area end -->
    <!-- block category area start -->
    <div class="block-category">
        <div class="container">
            <div class="row">
                @if(isset($categoriesHome))
                    @foreach($categoriesHome as $cateHome)
                <!-- featured block start -->
                <div class="col-md-4">
                    <!-- block title start -->
                    <div class="block-title">
                        <h2>{{$cateHome->c_name}}</h2>
                    </div>
                    <!-- block title end -->
                    <!-- block carousel start -->
                    @if(isset($cateHome->products))
                    <div class="block-carousel">
                        @foreach($cateHome->products as $product)
                        <div class="block-content">
                            <!-- single block start -->
                            <div class="single-block">
                                <div class="block-image pull-left">
                                    <a href="product-details.html"><img width="170px" height="210px" src="{{pare_url_file($product->pro_avatar)}}" alt="" /></a>
                                </div>
                                <div class="category-info">
                                    <h3><a href="product-details.html">{{$product->pro_name}}</a></h3>
                                    <p>{{$product->pro_description}}</p>
                                    <div class="cat-price">{{number_format($product->pro_price*(100 - $product->pro_sale)/100,0,',','.')}}<span class="old-price">{{number_format($product->pro_price,0,',','.')}}</span></div>
                                    @php
                                    $ageDetail = 0;
                                    if( $product->pro_total > 0 )
                                        $ageDetail = round($product->pro_total_number/$product->pro_total,1);

                                    @endphp
                                    <div class="cat-rating">
                                    @for($i=1;$i<=5;$i++)
                                        <a href="#"> <i class="fa fa-star {{ $i <= $ageDetail ? ' active' : ' ' }}"></i></a>
                                    @endfor
                                    </div>
                                </div>
                            </div>
                            <!-- single block end -->

                        </div>
                        @endforeach
                    </div>
                    @endif
                    <!-- block carousel end -->
                </div>
                <!-- featured block end -->
                    @endforeach
                @endif

            </div>
        </div>
    </div>
    <!-- block category area end -->
    <!-- testimonial area start -->
    <div class="testimonial-area lap-ruffel">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="crusial-carousel">
                        <div class="crusial-content">
                            <p>“Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat."</p>
                            <span>BootExperts</span>
                        </div>
                        <div class="crusial-content">
                            <p>“Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat."</p>
                            <span>Lavoro Store!</span>
                        </div>
                        <div class="crusial-content">
                            <p>“Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat."</p>
                            <span>MR Selim Rana</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- testimonial area end -->
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
    <!-- Brand Logo Area End -->
        </div>

@stop
@section('script')
    <script>
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN' :$('meta[name="csrf-token"]').attr('content')
            }
        });
        $(function () {


            let routeRenderProductView = '{{route('post.product.view')}}';
            checkRenderProduct = false;
        $(document).on('scroll',function () {
            if($(window).scrollTop() > 400 && checkRenderProduct == false){
                console.log('log');
                checkRenderProduct = true;
                let products = localStorage.getItem('products');
                products = $.parseJSON(products);
                if(products.length >0 ){
                    $.ajax({
                        url:routeRenderProductView,
                        method:"POST",
                        data: {id:products},
                        success:function (result) {

                            $('#product_view').html('').append(result.data);
                        }

                    });
                }
        }
        });
        })
    </script>


@stop
