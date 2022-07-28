@extends('admin.layout.admin')
@section('title' , 'Trang chủ')
@section('main_content')
<div class="container">
    <h4 class="text-center">DANH SÁCH KHÁCH HÀNG</h4>
    <table class="table table-bordered" style="margin-top:30px">
        <thead>
            <th>STT</th>
            <th>Tên</th>
            <th width="100px">Ảnh</th>
            <th width="300px">Email</th>
            <th>Số điện thoại</th>
            <th width="80px">Xóa</th>
        </thead>
        <tbody>
            <?php $index = 1;  ?>
            @foreach($customer as $key)
            <tr>
                <td>{{$index++}}</td>
                <td>{{$key->name}}</td>
                <td><img width="70px" style="border-radius: 50px;" src="{{ asset('upload/'.$key->img) }}" alt=""></td>
                <td>{{$key->email}}</td>
                <td>{{$key->phone}}</td>
                <td><a class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa khách hàng này ?')" href="{{ route('khach-hang.delete' , ['id' => $key->id]) }}"><i class="fas fa-trash-alt"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection