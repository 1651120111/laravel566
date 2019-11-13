@extends('admin::layouts.master')

@section('content')
    <style>
        i.fa.fa-star.active {
            color: #ecba22;
        }

    </style>
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
            <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <form class="form-inline" style="margin-bottom:20px" action="">
                <div class="form-group">
                    <input type="text" class="form-control" value="{{\Request::get('name')}}"
                           placeholder="Tên sản phẩm..." name="name">
                </div>

                <div class="form-group">
                    <select name="cate" class="form-control" id="">
                        <option value="">Danh mục</option>
                        @if (isset($categories))
                            @foreach($categories as $category)
                                <option
                                    value="{{$category->id}}" {{\Request::get('cate')==$category->id ? "selected='selected'":""}}>{{$category->c_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
    <div class="table-responsive">
        <h2>Quản lý sản phẩm <a href="{{route('admin.get.create.product')}}" class="pull-right"><i
                    class="fas fa-plus-circle"></i></a></h2>

        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>#</th>
                <th>Tên sản phẩm</th>
                <th>Loại sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Trạng thái</th>
                <th>Nổi bật</th>
                <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($products))
                <?php
                $age = 0;
                ?>

                @foreach($products as $product)
                    @if( $product->pro_total > 0 )
                         {{$age = round($product->pro_total_number/$product->pro_total,2)}}
                    @endif

                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->pro_name}}
                            <ul style="padding-left:15px;">
                                <li><span><i class="fas fa-dollar-sign"></i><span></span>{{number_format($product->pro_price,0,',','.')}}</span></li>
                                <li><span><i class="fas fa-dollar-sign"></i><span></span>{{$product->pro_sale}}%</span></li>
                                <li><span>Đánh giá: </span>
                                    <span class="rating">
                                        @for($i = 1;$i<=5;$i++)
                                            <i class="fa fa-star {{$i <= $age ? 'active' :'' }}"></i>

                                        @endfor
                                    </span>
                                    <span>{{$age}}</span>
                                </li>
                                <li><span>Số lượng: </span><span>{{$product->pro_number}} sản phẩm</span></li>

                            </ul>
                        </td>
                        <td>{{isset($product->category->c_name) ? $product->category->c_name : '[N\A]'}}</td>
                        <td>
                            <img src="{{pare_url_file($product->pro_avatar)}}" alt="" class="img-fluid"
                                 style="width: 80px; height: 80px;">

                        </td>
                        <td>
                            <a href="{{route('admin.get.action.product',['active',$product->id])}}"
                               class="label {{$product->getStatus($product->pro_active)['class']}}
                                   ">{{$product->getStatus($product->pro_active)['name']}}</a>
                        </td>
                        <td>
                            <a href="{{route('admin.get.action.product',['hot',$product->id])}}"
                               class="label {{$product->getHot($product->pro_hot)['class']}}">{{$product->getHot($product->pro_hot)['name']}}</a>
                        </td>
                        <td>
                            <a style="padding: 5px 10px;border: 1px solid #999; font-size:12px"
                               href="{{route('admin.get.edit.product',$product->id)}}"><i class="fas fa-pencil-alt"
                                                                                          style="font-size:11px">Cập
                                    nhật</i></a>
                            <a style="padding: 5px 10px;border: 1px solid #999; font-size:12px"
                               href="{{route('admin.get.action.product',['delete',$product->id])}}"><i
                                    class="fas fa-trash-alt" style="font-size:11px">Xoá</i></a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>

@stop
