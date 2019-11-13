@extends('layouts.app')
@section('content')
    <style>
        .product-tab-content{
            overflow: hidden;
        }
        .product-tab-content h2{
            font-size: 24px !important;
        }
        .product-tab-content h3{
            font-size: 20px !important;
        }
        .product-tab-content h4{
            font-size: 18px !important;
        }
        .product-tab-content img{
            margin: 0 auto;
            text-align: center;
            max-width: 100%;
            display: block;
        }
        .list_star:hover{
            cursor: pointer;
        }
        .list_text{
            display: inline-block;
            margin-left: 10px;
            position: relative;
            background: #52b858;
            color: #fff;
            padding: 2px 8px;
            box-sizing: border-box;
            font-size: 12px;
            border-radius: 2px;
            display: none;
        }
        .list_text:after{
            right: 100%;
            top: 50%;
            border: solid transparent;
            content: "";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
            border-color: rgba(82,184,88,0);
            border-right-color: #52b858;
            border-width: 6px;
            margin-top: -6px;
        }
        .list_star .rating-active{
            color: #ff9705  ;
        }
        .rating-price .pro-rating .active{
            color: #ff9705;
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
                            <li class="category3"><span>Shop List</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->
    <!-- product-details Area Start -->
    <div class="product-details-area">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-5 col-xs-12">
                    <div class="zoomWrapper">
                        <div id="img-1" class="zoomWrapper single-zoom">
                            <a href="#">
                                <img id="zoom1" src="{{ pare_url_file($productDetail->pro_avatar) }}" data-zoom-image="{{asset("img/product-details/ex-big-1-1.jpg") }}" alt="big-1">
                            </a>
                        </div>
                        <div class="single-zoom-thumb">
                            <ul class="bxslider" id="gallery_01">
                                <li>
                                    <a href="#" class="elevatezoom-gallery active" data-update="" data-image="img/product-details/big-1-1.jpg" data-zoom-image="img/product-details/ex-big-1-1.jpg"><img src="{{ URL::asset('img/product-details/th-1') }}-1.jpg" alt="zo-th-1" /></a>
                                </li>
                                <li class="">
                                    <a href="#" class="elevatezoom-gallery" data-image="img/product-details/big-1-2.jpg" data-zoom-image="img/product-details/ex-big-1-2.jpg"><img src="{{ URL::asset('img/product-details/th-1-2.jpg') }}" alt="zo-th-2"></a>
                                </li>
                                <li class="">
                                    <a href="#" class="elevatezoom-gallery" data-image="img/product-details/big-1-3.jpg" data-zoom-image="img/product-details/ex-big-1-3.jpg"><img src="{{ URL::asset('img/product-details/th-1-3.jpg') }}" alt="ex-big-3" /></a>
                                </li>
                                <li class="">
                                    <a href="#" class="elevatezoom-gallery" data-image="img/product-details/big-4.jpg" data-zoom-image="img/product-details/ex-big-4.jpg"><img src="{{ URL::asset('img/product-details/th-4.jpg') }}" alt="zo-th-4"></a>
                                </li>
                                <li class="">
                                    <a href="#" class="elevatezoom-gallery" data-image="img/product-details/big-5.jpg" data-zoom-image="img/product-details/ex-big-5.jpg"><img src="{{ URL::asset('img/product-details/th-5.jpg') }}" alt="zo-th-5" /></a>
                                </li>
                                <li class="">
                                    <a href="#" class="elevatezoom-gallery" data-image="img/product-details/big-6.jpg" data-zoom-image="img/product-details/ex-big-6.jpg"><img src="{{ URL::asset('img/product-details/th-6.jpg') }}" alt="ex-big-3" /></a>
                                </li>
                                <li class="">
                                    <a href="#" class="elevatezoom-gallery" data-image="img/product-details/big-7.jpg" data-zoom-image="img/product-details/ex-big-7.jpg"><img src="{{ URL::asset('img/product-details/th-7.jpg') }}" alt="ex-big-3" /></a>
                                </li>
                                <li class="">
                                    <a href="#" class="elevatezoom-gallery" data-image="img/product-details/big-8.jpg" data-zoom-image="img/product-details/ex-big-8.jpg"><img src="{{ URL::asset('img/product-details/th-8.jpg') }} " alt="ex-big-3" /></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-sm-7 col-xs-12">
                    <div class="product-list-wrapper">
                        <div class="single-product">
                            <div class="product-content">
                                <h1 class="product-name"><a href="#">{{ $productDetail->pro_name }}</a></h1>
                                <div class="rating-price">
                                    <?php
                                    $ageDetail = 0;
                                    ?>
                                    @if( $productDetail->pro_total > 0 ){
                                    $ageDetail = round($productDetail->pro_total_number/$productDetail->pro_total,2);
                                    }
                                    @endif

                                    <div class="pro-rating">
                                        @for($i=1;$i<=5;$i++)
                                            <a href="#"> <i class="fa fa-star {{ $i <= $ageDetail ? ' active' : ' ' }}"></i></a>
                                        @endfor
                                    </div>
                                    <div class="price-boxes">
                                        <span class="new-price">$110.00</span>
                                    </div>
                                </div>
                                <div class="product-desc">
                                    <p>{{  $productDetail->pro_description }}</p>
                                </div>
                                <p class="availability in-stock">Hàng: <span>Trong kho</span></p>
                                <div class="actions-e">
                                    <div class="action-buttons-single">
                                        <div class="inputx-content">
                                            <label for="qty">Số lượng:</label>
                                            <input type="text" name="qty" id="qty" maxlength="12" value="1" title="Qty" class="input-text qty">
                                        </div>
                                        <div class="add-to-cart">
                                            <a href="#">Thêm vào giỏ hàng</a>
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
                                <div class="singl-share">
                                    <a href="#"><img src="{{ URL::asset('img/single-share.png' ) }}" alt =""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="single-product-tab">
                    <!-- Nav tabs -->
                    <ul class="details-tab">
                        <li class="active"><a href="#home" data-toggle="tab">Mô tả</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            <div class="product-tab-content">
                                <p>{!!  $productDetail->pro_content !!} </p>
                            </div>
                        </div>
                        <div class="component_rating" style="margin-bottom: 20px;">
                            <h3>ĐÁNH GIÁ SẢN PHẨM</h3>
                            <div class="component-rating-content" style="display: flex;font-size:15px;align-items: center;display: flex;align-items: center;border: 1px solid #dedede;border-radius: 5px">
                                <div class="rating-item" style="width: 20%;text-align: center;position: relative">
                                    <div><span class="fa  fa fa-star" style="font-size: 100px;color: #ff9705;"></span>
                                        <b style="position: absolute;top: 50%;left: 50%;transform: translateX(-50%) translateY(-50%);color: white;font-size: 25px   ">2.5</b></div>
                                </div>
                                <div class="list_rating" style="width: 60%;padding: 15px">
                                    @for($i = 1 ;$i<=5;$i++)
                                        <div class="item_rating" style="display: flex;align-items: center">

                                            <div style="width: 10%;font-size: 14px">
                                                {{ $i }} <span class="fa fa-star"></span>
                                            </div>
                                            <div style="width: 70%;margin:0 20px">
                                                <span style="width: 100%;height: 8px;display: block;border: 1px solid#dedede"><b style="width: 30%;background-color: red;border-radius: 5px;display: block;height: 100%"></b></span>
                                            </div>
                                            <div style="width: 20%">
                                                <a href="">290 đánh giá</a>
                                            </div>

                                        </div>
                                    @endfor
                                </div>
                                <div style="width: 20%;">
                                    <a href=""style="background: #288ad6;padding: 10px;color: white;border-radius: 5px" class="js_rating_action">Gửi đánh giá của bạn</a>
                                </div>
                            </div>
                            <?php
                            $listRatingText = [
                                1 => "Không thích",
                                2 => "Tạm được",
                                3 => "Tốt",
                                4 => "Rất tốt",
                                5 => "Tuyệt vời quá",
                            ];
                            ?>

                            <div class="form_rating hide" >
                                <div style="display: flex;margin-top: 15px">
                                    <p style="margin-bottom: 0">Chọn đánh giá của bạn</p>
                                    <span style="margin: 0 15px" class="list_star">
                                @for($i=1;$i<=5;$i++)
                                            <i class="fa fa-star" data-key ="{{ $i }}"></i>
                                        @endfor
                            </span>
                                    <span class="list_text"></span>
                                    <input type="hidden" value="" class="number_rating">
                                </div>
                                <div style="margin-top: 15px">
                                    <textarea name="" class="form-control" cols="30" rows="3" id="ra_content"></textarea>
                                </div>
                                <div style="margin-top: 15px">
                                    <a href="{{ route('post.rating.product',$productDetail) }}" class="js_rating_product" style="background: #288ad6;padding: 5px 10px; color: white;border-radius: 5px;">Gửi đánh giá</a>
                                </div>
                            </div>
                        </div>
                        <div class="component_list_rating" >
                            <div class="rating_item">
                                <div>
                                    <span>Thien Nhan</span>
                                    <a href="">Đã mua hang tai website</a>
                                </div>
                                <p>
                                <span >
                                    @for($i=1;$i<=5;$i++)
                                        <i class="fa fa-star"></i>
                                    @endfor
                                </span>
                                    Hôm 1/4 tôi có mua ở TDGG NGUYỄN Thái Bình một chiếc điện thoãi, cảm nhận bin máy quá trâu
                                </p>
                                <div >
                                    <span><i class="fa fa-clock-o"></i>3 ngày trước </span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product-details Area end -->
    <!-- product section start -->

    <!-- product section end -->

@stop
@section('script')
    <script>
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN' :$('meta[name="csrf-token"]').attr('content')
            }
        });
        $(function () {

            let listStar = $(".list_star .fa");

            listRatingText = {
                1 : "Không thích",
                2 : "Tạm được",
                3 : "Tốt",
                4 : "Rất tốt",
                5 : "Tuyệt vời quá",
            }
            listStar.mouseover(function(){
                let $this =$(this);
                let number = $this.attr('data-key');
                listStar.removeClass('rating-active');
                $(".number_rating").val(number);
                $.each(listStar,function (key,value) {
                    if (key + 1 <= number){
                        $(this).addClass('rating-active');
                    }
                })
                $(".list_text").text('').text(listRatingText[$this.attr('data-key')]).show();

            });
            $(".js_rating_action").click(function (event) {
                event.preventDefault();
                if ($(".form_rating").hasClass('hide')){
                    $(".form_rating").addClass('active').removeClass('hide');
                }else{
                    $(".form_rating").addClass('hide').removeClass('active');
                }
            });
            $(".js_rating_product").click(function (event) {
                event.preventDefault();
                let content = $("#ra_content").val();
                let number = $(".number_rating").val();
                let url = $(this).attr('href');
                if(content && number){
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data :{
                            number : number,
                            r_content:content
                        }
                    }).done(function (result) {
                        if(result.code == 1){
                            alert("Gửi đánh giá thành công");
                            location.reload();
                        }

                    });
                }
            })
        });
    </script>

@stop
