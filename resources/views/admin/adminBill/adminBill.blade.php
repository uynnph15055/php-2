@extends('admin.layout.admin')
@section('title' , 'Quản lý hóa đơn')
@section('main_content')
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<div class="container">
    <h4 class="text-center">DANH SÁCH HÓA ĐƠN</h4>
    <table class="table table-bordered">
        <thead>
            <th>STT</th>
            <th>Tên</th>
            <th>SĐT</th>
            <th>Address</th>
            <th>Thanh toán</th>
            <th width="150px">Trang thái</th>
            <th width="80px">Chi tiết</th>
            <th width="80px">Xóa</th>
        </thead>
        <tbody id="tbody">
            <?php $index = 1;  ?>>
            @foreach($dataBill as $key)
            <tr>
                <td>{{$index++}}</td>
                <td>{{$key->name}}</td>
                <td>{{$key->phone}}</td>
                <td>{{$key->address}}</td>
                <td>
                    @if($key->type_pay == 0)
                    <span style="color:green">Tại nhà</span>
                    @else
                    <span style="color:green">Qua thẻ</span>
                    @endif
                </td>
                <td>
                    <select class="form-select" id="<?= 'change_status-' . $key->id ?>" style="width:150px" aria-label="Default select example">
                        @foreach($billStatus as $ky =>$value)
                        <option value="<?= $key->id . '-' . $ky ?>" <?php if ($key->status == $ky) {
                                                                        echo 'selected';
                                                                    } ?>>{{$value}}</option>
                        @endforeach
                    </select>
                </td>
                <td><a href="{{ route('hoa-don.detail' , ['id' => $key->id]) }}" class="btn btn-success"><i class="fas fa-eye"></i></a></td>
                <td><a class="btn btn-danger" href=""><i class="fas fa-trash"></i></a></td>
            </tr>
            <script>
             
            </script>
            @endforeach
        </tbody>
    </table>
    <nav style="float: right;">
        {{ $dataBill->links(); }}
    </nav>
</div>


@endsection