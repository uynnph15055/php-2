@extends('admin.layout.admin')
@section('title' , 'Chi tiết hóa đơn')
@section('main_content')
<div class="container">
    <h4 class="text-center">HÓA ĐƠN CHI TIẾT</h4>
    <div class="row">
        <div class="col-4">
            <form action="{{ route('hoa-don.update' , ['id' => $inforCus->id]) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Họ và tên</label>
                    <br>
                    <input type="text" name="name" value="{{$inforCus->name}}" placeholder="Số lượt views" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Số điện thoại</label>
                    <br>
                    <input type="text" name="phone" value="{{$inforCus->phone}}" placeholder="Số lượt views" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Địa chỉ</label>
                    <br>
                    <input type="text" name="address" value="{{$inforCus->address}}" placeholder="Số lượt views" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Kiểu thanh toán :</label>
                    @if($inforCus->type_pay = 0)
                    <span style="color: #c0392b;">Tại nhà</span>
                    @else
                    <span style="color: #c0392b;">Qua thẻ</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Trạng thái :</label>
                    @if($inforCus->type_pay = 0)
                    <span style="color:red;">Chưa thanh toán</span>
                    @elseif($inforCus->type_pay = 1)
                    <span style="color: green">Đã thanh toán</span>
                    @else
                    <span style="color: #d35400;">Đang giao</span>
                    @endif
                </div>
                <button class="btn btn-success">Thay đổi</button>
            </form>
        </div>
        <div class="col-8">
            <table class="table table-bordered" style="margin-top: 30px;">
                <thead>
                    <tr>
                        <th width="50px">STT</th>
                        <th width="370px">Sản phẩm</th>
                        <th>Size</th>
                        <th>Giá</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $index = 1;
                    $sum_money = 0 ?>
                    @foreach($billDetail as $key)
                    <?php $sum_money += $key->product->priceSale * $key->quantity; ?>
                    <tr>
                        <td>{{$index++}}</td>
                        <td>
                            <img width="70px" src="{{ asset('upload/'.$key->product->img ) }}" alt="">
                            {{$key->product->name}}
                        </td>
                        <td>
                            <?php
                            $detail = explode(',', $key->size);
                            ?>
                            @foreach($detail as $ky =>$value)
                            <p>{{$value}}</p>
                            @endforeach
                        </td>
                        <td><?= number_format($key->product->priceSale, 0, ",", "."); ?>₫</td>
                    </tr>
                    @endforeach
                    <td colspan="3">
                        <h5 style="color:#8E0007" class="text-center">Tổng tiền</h5>
                    </td>
                    <td colspan="1">
                        <h6 style="color:#8E0007"><?= number_format($key->product->priceSale, 0, ",", "."); ?>₫</h6>
                    </td>
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection