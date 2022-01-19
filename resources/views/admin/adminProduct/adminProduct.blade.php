@extends('admin.layout.admin')
@section('title' , 'Quản trị danh mục')
@section('main_content')
<div class="container">
    <h4 class="text-center">DANH SÁCH SẢN PHẨM</h4>
    <a href="{{ route('san-pham.pageAdd') }}" class="btn btn-primary" style="margin-bottom: 20px;">Thêm sản phẩm</a>
    <span style="font-style: italic;float:right">Tổng <?php echo count($products); ?> sản phẩm</span>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tên</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">SL</th>
                <th scope="col">Size</th>
                <th scope="col">Danh mục</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Sửa</th>
                <th scope="col">Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php $index = 1; ?>
            @foreach($products as $key)
            <tr>
                <td>{{ $index++ }}</td>
                <td>{{ $key->name }}</td>
                <td><img width="70px" src="{{ asset('upload/'.$key->img) }}" alt=""></td>
                <td>{{ $key->quantity }}</td>
                <td>{{ $key->size }}</td>
                <td>{{ $key->category->name }}</td>
                <td>
                    <?php if ($key->status == 0) {
                        echo '<span style="color: green">Còn hàng</span>';
                    } else {
                        echo '<span style="color:green">Hết hàng</span>';
                    } ?>
                </td>
                <td><a class="btn btn-warning" href="{{ route('san-pham.pageEdit' , ['id' => $key->id]) }}">Sửa</a></td>
                <td><a onclick="return confirm('Bạn có muốn xóa sản phẩm này ?')" href="{{ route('san-pham.destroy' , ['id' => $key->id]) }}" class="btn btn-danger" href="">Xóa</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <nav style="float: right;">
        {{ $products->links(); }}
    </nav>
</div>
@endsection