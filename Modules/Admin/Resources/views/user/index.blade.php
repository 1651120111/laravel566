@extends('admin::layouts.master')

@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="#">Trang chủ</a></li>
            <li><a href="#">Thành viên</a></li>
            <li class="active">Danh sách</li>
        </ol>
    </div>
    <div class="table-responsive">
        <h2 class="title-1">Quản lí thành viên</h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Tên hiển thị</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Hình ảnh</th>
                <th>Thao tác</th>


            </tr>
            </thead>

            <tbody>
                @if(isset($users))
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>
                                {{ $user->name }}
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td>
                                {{ $user->phone }}
                            </td>
                            <td></td>
                            <td>
                                <a style="padding: 5px 10px;border: 1px solid #eee" href="{{ route('admin.get.edit.product',$user->id ) }}"><i class="fas fa-edit">Cập nhật</i></a>
                                <a style="padding: 5px 10px;border: 1px solid #eee" href="{{ route('admin.get.action.product',['delete',$user->id]) }}"><i class="fas fa-trash">Xóa</i></a>
                            </td>
                        </tr>
                    @endforeach
                    @endif
            </tbody>
        </table>
    </div>

@stop
