@extends('admin.layout.admin')
@section('title' , 'Trang chủ')
@section('main_content')
<div class="container">
    <h4 class="text-center">DANH SÁCH DANH MỤC</h4>
    <div class="row">
        @if(isset($dataRow))
        <div class="col-4">
            <h5>Sửa danh mục</h5>
            <form action="{{ route('danh-muc.update' , ['id' => $dataRow->id]) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tên danh mục</label>
                    <input type="text" value="{{$dataRow->name}}" class="form-control" onkeyup="ChangeToSlug()" placeholder="Tên danh mục" name="name" id="slug" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Slug</label>
                    <input type="text" value="{{$dataRow->slug}}" class="form-control" id="convert_slug" name="slug" placeholder="Slug danh mục">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Thuộc lớp</label>
                    <select style="color: #666" class="form-select" name="parent_id" aria-label="Default select example">
                        <option selected value="0">--------Danh mục--------</option>
                        @foreach($dataParent as $key)
                        <option <?php
                                if ($key->id == $dataRow->parent_id) {
                                    echo 'selected';
                                } elseif ($dataRow->parent_id == 0) {
                                    echo '';
                                }
                                ?> value="{{$key->id}}">{{ str_repeat("__", $key->level) . $key->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        @else
        <div class="col-4">
            <h5>Thêm danh mục</h5>
            <form action="{{route('danh-muc.store')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tên danh mục</label>
                    <input type="text" class="form-control" onkeyup="ChangeToSlug()" placeholder="Tên danh mục" name="name" id="slug" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Slug</label>
                    <input type="text" class="form-control" id="convert_slug" name="slug" placeholder="Slug danh mục">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Thuộc lớp</label>
                    <select style="color: #666" class="form-select" name="parent_id" aria-label="Default select example">
                        <option selected value="0">--------Danh mục--------</option>
                        @foreach($dataParent as $key)
                        <option value="{{$key->id}}">{{ str_repeat("__", $key->level) . $key->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        @endif
        <div class="col-8">
            <table class="table table-bordered" style="margin-top:30px">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Thuộc lớp</th>
                        <th scope="col">Sửa</th>
                        <th scope="col">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $index = 1; ?>
                    @foreach($dataCate as $key)
                    <tr>
                        <td>{{$index++}}</td>
                        <td>{{$key->name}}</td>
                        <td><?= str_repeat("__", $key->level) . $key->name ?></td>
                        <td><a class="btn btn-warning" href="">Sửa</a></td>
                        <td><a class="btn btn-danger" href="{{ route('danh-muc.destroy' , ['id' => $key->id]) }}" onclick="return confirm('Bạn có muốn xóa danh mục này ?')" href="">Xóa</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <nav style="float: right;" aria-label="Page navigation example">
                {{ $dataLimit->links(); }}
            </nav>
            <style>

            </style>
        </div>
    </div>
</div>
@endsection