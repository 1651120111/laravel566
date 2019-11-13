@extends('admin::layouts.master')

@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="#">Trang chủ</a></li>
            <li><a href="#">Đánh giá</a></li>
            <li class="active">Danh sách</li>
        </ol>
    </div>
    <div class="table-responsive">
        <h2 class="title-1">Quản lí đánh <giá></giá></h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Tên TV</th>
                <th>Sản phẩm</th>
                <th>Nội dung</th>
                <th>Rating</th>

            </tr>
            </thead>

            <tbody>
            @if(isset($ratings))
                <?php $stt = 1;?>
                @foreach($ratings as $rating)
                    <tr>
                        <td>{{ $stt++ }}</td>
                        <td>
                            {{ isset($rating->user->name) ? $rating->user->name : '[N\A]' }}
                        </td>
                        <td>
                            <a href="">{{ isset($rating->product->pro_name) ? $rating->product->pro_name : '[N\A]' }}</a>
                        </td>
                        <td>
                            {{ $rating->ra_content }}
                        </td>
                        <td>
                            {{ $rating->ra_number }}
                        </td>
                        <td></td>
                        <td>
                            <a style="padding: 5px 10px;border: 1px solid #eee" href="{{ route('admin.get.action.product',['delete',$rating->id]) }}"><i class="fas fa-trash">Xóa</i></a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>

@stop
