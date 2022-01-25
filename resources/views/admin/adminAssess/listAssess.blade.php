@extends('admin.layout.admin')
@section('title' , 'Quản trị đánh giá')
@section('main_content')
<style>
    img {
        border-radius: 50px;
        width: 50px;
    }
</style>
<div class="container">
    <h4 class="text-center">DANH SÁCH ĐÁNH GIÁ</h4>
    <table class="table table-bordered" style="margin-top:30px">
        <thead>
            <th>STT</th>
            <th>Khách hàng</th>
            <th>Số sao</th>
            <th width="300px">Nội dung</th>
            <th>Trạng thái</th>
            <th width="80px">Sửa</th>
            <th width="80px">Xóa</th>
        </thead>
        <tbody>
            @foreach($dataAssess as $key)
            <tr>
                <td class="assess_id">{{$key->id}}</td>
                <td>
                    <img src="{{ asset('upload/'.$key->customer->img ) }}" alt="">
                    {{$key->customer->name}}
                </td>
                <td>{{$key->number_star}}</td>
                <td>{{$key->content}}</td>
                <td>
                    @if($key->status == 1)
                    <span style="color:#8E0007">Ẩn đi</span>
                    @else
                    <span style="color:green">Hiển thị</span>
                    @endif
                </td>
                <td><a data-id="{{$key->id}}" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-success assess_status" href=""><i class="fas fa-eye"></i></a>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Sửa trạng thái</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method='POST' action='{{route("danh-gia.update")}}'>
                                        @csrf
                                        <input hidden value='{{$key->id}}' name='assess_id' type='text'>
                                        <div class='mb-3'>
                                            <select class="form-select" name="status" aria-label="Default select example">
                                                <option value="1">Ẩn Đi</option>
                                                <option value="0">Hiển thị</option>
                                            </select>
                                        </div>
                                        <button type='submit' class='btn btn-success'>Cập nhật</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td><a onclick="return confirm('Bạn có muốn xóa đánh giá này ?')" href="{{ route('danh-gia.delete' ,['id' => $key->id]) }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection