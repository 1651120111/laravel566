@if($orders)
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
        @foreach($orders as $key => $order)
            <tr>
                <th>#{{$i}}</th>
                <th scope="row"><a target="_blank" href="{{route('get.detail.product',[str_slug($order->product->pro_name),$order->or_product_id])}}">{{isset($order->product->pro_name) ? $order->product->pro_name   :''}}</a></th>
                <td><img height="80px" width="80px" src="{{isset($order->product->pro_avatar) ? pare_url_file($order->product->pro_avatar):''}}"> </td>
                <td>{{ number_format($order->or_price,0,',','.')  }}</td>
                <td>{{ $order->or_qty }}</td>
                <td>{{ number_format($order->or_qty * $order->or_price,0,',','.')  }} VMĐ</td>
                <td>
                    <a href=""><i class="fa fa-trash-o"></i> Delete</a>
                </td>
            </tr>
        <?php $i++;?>
        @endforeach
    </table>

@endif
