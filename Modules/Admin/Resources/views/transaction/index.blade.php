@extends('admin::layouts.master')

@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="#">Trang chủ</a></li>
            <li><a href="#">Đơn hàng</a></li>
            <li class="active">Danh sách</li>
        </ol>
    </div>
    <div class="table-responsive">
        <h2 class="title-1">Quản lí đơn hàng</h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Tên khách hàng</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Ngày</th>
                <th>Thao tác</th>


            </tr>
            </thead>

            <tbody>
            @foreach($transaction as $trans)
                <tr>
                    <td>#{{ $trans->id }}</td>
                    <td>{{  isset($trans->tr_user_id) ? $trans->user->name : '[N\A]' }}</td>
                    <td>{{ $trans->tr_address }}</td>
                    <td>{{ $trans->tr_phone }}</td>
                    <td>{{ number_format($trans->tr_total,0,',','.') }}</td>
                    <td>
                        @if($trans->tr_status == 1)
                                <span  style="cursor: pointer" class="label {{$trans->getStatus($trans->tr_status)['class']}}
                                    ">{{$trans->getStatus($trans->tr_status)['name']}}</span>
                         @else
                        <a href="{{route('admin.get.action.transaction',[$trans->id])}}"
                           class="label {{$trans->getStatus($trans->tr_status)['class']}}
                               ">{{$trans->getStatus($trans->tr_status)['name']}}
                        </a>
                         @endif

                    </td>
                    <td>{{$trans->created_at}}</td>
                    <td>
                        <a href="{{ route('admin.get.action.product',['delete',$trans->id]) }}" class="btn_customer_action"><i class="fa fa-trash-o"></i> Xóa &nbsp;</a>
                        <a data-id="{{$trans->id}}" href="{{ route('admin.get.view.order',$trans->id) }}" class="btn_customer_action js_order_item"><i class="fa fa-eye"></i></a>

                    </td>
            @endforeach
            </tbody>
        </table>
    </div>



@stop
<div class="modal fade" id="myModalOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 70px">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <h4 class="modal-title" id="exampleModalLabel">Chi tiết mã đơn hàng  #<b class="transaction_id"></b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="md_content">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

@section('script')
    <script>
        $(function () {
                $(".js_order_item").click(function (event) {
                    event.preventDefault();
                    let $this = $(this);
                    let url = $this.attr('href');
                    $(".transaction_id").text($this.attr('data-id'));
                    $("#myModalOrder").modal('show');

                    $.ajax({
                        url:url,
                    }).done(function (result) {
                        console.log(result);
                        if(result){
                            $("#md_content").html('').append(result);
                        }
                    })


                });
        })
    </script>
@stop
