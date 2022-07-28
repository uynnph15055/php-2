@extends('admin.layout.admin')
@section('title' , 'Quản lý nhân viên')
@section('main_content')
<div class="container">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal">
        Thêm nhân viên
    </button>

    <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div style="text-align: center;" class="modal-header">
                    <h5 style="text-align: center;" class="modal-title" id="exampleModalLabel">Thêm nhân viên</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('nhan-vien.create') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Họ Tên</label>
                                <input placeholder="Thêm nhân viên" type="text" name="name" class="form-control" id="exampleInputl1" aria-describedby="emailHelp">

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Ảnh</label>
                                <br>
                                <input type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" name="img">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input placeholder="Email nhân viên" type="text" required name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Địa chỉ</label>
                                <input placeholder="Email nhân viên" type="text" required name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Phone</label>
                                <input type="text" placeholder="Số điện thoại" name="phone" class="form-control" aria-describedby="emailHelp">

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" placeholder="Nhập password" name="password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm admin</button>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <h4 class="text-center">Danh sách admin</h4>
    <div class="header__list">
    </div>
    <span style="float:right;font-style:italic"></span>
    <table class="table table-bordered" style="margin-top: 20px;">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Ảnh</th>
                <th>Địa chỉ</th>
                <th>Email</th>
                <th>Phone</th>
                <th width="78px">Sửa</th>
                <th width="78px">Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $index = 1;
            ?>
            @foreach($dataStaff as $key)
            <tr>
                <td><?= $index++ ?></td>

                <td>{{$key->name}}</td>
                <td>
                    <img style="border-radius: 50px;" width="70px" src="{{ asset('upload/'.$key->img) }}" alt="">
                </td>
                <!-- <td>{{$key['cate_name']}}</td> -->
                <td>{{$key->address}}</td>
                <td>{{$key->email}}
                </td>
                <td>{{$key->phone}}</td>
                <td><a class="btn btn-warning" href=""><i class="fas fa-edit"></i></a></td>
                <td><a class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không')" href="{{ route('nhan-vien.delete' , ['id' => $key->id]) }}"><i class="fas fa-trash"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <nav style="float: right;" aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>


</div>
@endsection