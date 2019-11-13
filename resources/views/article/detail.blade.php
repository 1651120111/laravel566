@extends('layouts.app')
@section('content')
    <style>
        .article_content img{
            margin:0 auto;
            display: block;
            max-width: 100%;
        }
    </style>
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="{{route('home')}}">Home</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="home">
                                <a href="{{route('get.list.article')}}">Bài viết</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3    "><span>{{$articleDetail -> a_name}}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->
    <!-- contact-details start -->
    <div class="main-contact-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                   <div class="article_content" style="margin-bottom: 30px">
                       <h1>{{$articleDetail->a_name}}</h1>
                       <p style="font-weight: bold"> {{$articleDetail->a_description}}</p>
                       <div>{!! $articleDetail->a_content !!}</div>
                   </div>
                    <h4>BÀI VIẾT KHÁC</h4>
                    @include('components.article')
                </div>

                <div class="col-sm-4">
                    Right
                </div>
            </div>
        </div>
    </div>
@stop
