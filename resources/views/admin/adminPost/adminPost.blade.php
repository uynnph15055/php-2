@extends('admin.layout.admin')
@section('title' , 'Quản lý tin tức')
@section('main_content')
<div class="container">
    <h4 class="text-center">DANH SÁCH TIN TỨC</h4>
    <a href="{{ route('tin-tuc.store') }}" class="btn btn-primary">Thêm bài viết</a>
    <table class="table table-bordered" style="margin-top:20px">
        <thead>
            <th width="80px">STT</th>
            <th width="200px">Tiêu đề </th>
            <th width="100px">Ảnh</th>
            <th width="300px">Giới thiệu</th>
            <th width="80px">Sửa</th>
            <th width="80px">Xóa</th>
        </thead>
        <tbody>
            <?php $index = 1;  ?>
            @foreach($post as $key)
            <tr>
                <td>{{$index++}}</td>
                <td>{{$key->title}}</td>
                <td><img width="70px" src="{{ asset('upload/'.$key->img) }}" alt=""></td>
                <td>{{$key->description}}</td>
                <td><a class="btn btn-warning" href="{{ route('tin-tuc.edit' , ['id' => $key->id]) }}"><i class="fas fa-trash"></i></a></td>
                <td><a class="btn btn-danger" onclick="return confirm('Bạn muốn xóa bài viết này ?')" href="{{ route('tin-tuc.delete' , ['id' => $key->id]) }}"><i class="fas fa-trash"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <nav style="float: right;">
        {{ $post->links(); }}
    </nav>
</div>
@endsection