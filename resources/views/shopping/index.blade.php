@extends('layouts.app')
@section('content')
    <div class="our-product-area new-product">
        <div class="container">
            <div class="area-title">
                <h2>Giỏ hàng của bạn</h2>
            </div>
            <table class="table table-dark">
                <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Thành tiền</th>
                    <th scope="col">Thao tác</th>
                </tr>
                </thead>
                <tbody>
                <?php  $i  = 1;?>
                @foreach($products as $key => $product)
                <tr>
                    <th>#{{$i}}</th>
                    <th scope="row"><a href="">{{ $product->name }}</a></th>
                    <td><img height="80px" width="80px" src="{{ pare_url_file($product->options->avatar) }}"> </td>
                    <td>{{ number_format($product->price,0,',','.')  }}</td>
                    <td>{{ $product->qty }}</td>
                    <td>{{ number_format($product->qty * $product->price,0,',','.')  }} VMĐ</td>
                    <td>
                        <a href=""><i class="fa fa-pencil"></i> Edit  </a>&nbsp;&nbsp;
                        <a href="{{ route('delete.shopping.cart',$key) }}"><i class="fa fa-trash-o"></i> Delete</a>
                    </td>
                </tr>
                <?php $i++;?>
                @endforeach
            </table>

            <h5 class="pull-right">Tổng tiền cần thanh toán {{ \Cart::subtotal()}}  <a href="{{ route('get.form.pay') }}" class="btn btn-success">  Thanh toán</a></h5>

        </div>
    </div>

@stop
