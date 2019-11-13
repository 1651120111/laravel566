@extends('layouts.app')
@section('content')
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
                            <li class="category3">
                                <a href=""> <span>Bài viết</span></a>
                            </li>
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
                   @include('components.article')
                </div>
                <div class="col-sm-4">
                   Right
                </div>
            </div>
        </div>
    </div>
@stop
