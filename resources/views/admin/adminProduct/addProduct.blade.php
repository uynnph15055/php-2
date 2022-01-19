@extends('admin.layout.admin')
@section('title', 'Danh sách danh mục')
@section('main_content')
<style>
    input[type="checkbox"] {
        display: none;
    }

    .label {
        color: #ff5622;
        /* font-weight: 600; */
        border: 1px solid #ff5622;
        padding: 6px;
        cursor: pointer;
        margin-left: 10px;
        border-radius: 6px;
    }

    .label:hover {
        background-color: #ff5622;
        color: white;
        transition: all ease-in-out 0.3s;
    }

    input[type="checkbox"]:checked+.label {
        background-color: #ff5622;
        color: white;
    }

    .checked {
        background-color: #ff5622;
        padding: 6px;
        cursor: pointer;
        margin-left: 10px;
        border-radius: 6px;
        color: white;
        border: 1px solid #ff5622;
    }
</style>
<div class="container">
    <h4 class="text-center">THÊM SẢN PHẨM</h4>
    @if(isset($rowProduct))
    <form action="{{ route('san-pham.update') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="row">
            <div class="col">
                <input type="text" value="{{$rowProduct->id}}" name="id" hidden>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tên sản phẩm</label>
                    <input type="text" class="form-control" onkeyup="ChangeToSlug()" placeholder="Tên sản phẩm" name="name" value="{{$rowProduct->name}}" value="{{ old('name') }}" id="slug" aria-describedby="emailHelp">
                    @error('name')
                    <div style="color:red">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Đường dẫn</label>
                    <input type="text" class="form-control" id="convert_slug" name="slug" value="{{$rowProduct->slug}}" placeholder="Slug sản phẩm">
                    @error('slug')
                    <div style="color:red">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Ảnh chính</label>
                    <br>
                    <input type="file" name="img" placeholder="Ảnh chính">
                    @error('img')
                    <div style="color:red">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Ảnh phụ</label>
                    <br>
                    <input type="file" multiple="multiple" name="img_sub[]">
                    @error('img_sub')
                    <div style="color:red">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3" style="margin-top: 40px;">
                    <label for="exampleInputPassword1" class="form-label">Số lượng</label>
                    <br>
                    <input type="text" value="{{$rowProduct->quantity}}" name="quantity" placeholder="Giá sản phẩm" class="form-control">
                    @error('quantity')
                    <div style="color:red">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tên danh mục</label>
                    <select class="form-select" name="cate_id" aria-label="Default select example">
                        <option value="">--------Danh mục--------</option>
                        @foreach($cate as $key)
                        <option <?php
                                if ($key->id == $rowProduct->cate_id) {
                                    echo 'selected';
                                }
                                ?> value="{{$key->id}}">{{$key->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Chọn size</label>
                    <div class="_size-radio">
                        @foreach($dataSize as $key => $value)
                        <input type="checkbox" value="{{$value}}" name="size[]" id="size_five">
                        <label <?php
                                if (strlen(strstr($rowProduct->size, $value)) > 0) {
                                    echo 'class="label checked"';
                                } else {
                                    echo 'class="label"';
                                }
                                ?> for="size_five">{{$value}}</label>
                        @endforeach
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Giá</label>
                    <br>
                    <input type="text" value="{{$rowProduct->price}}" name="price" placeholder="Giá sản phẩm" class="form-control">
                    @error('price')
                    <div style="color:red">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Giá khuyến mại</label>
                    <br>
                    <input type="text" value="{{$rowProduct->priceSale}}" name="price_sale" placeholder="Giá khuyến mại" class="form-control">
                    @error('price_sale')
                    <div style="color:red">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Số lượt views</label>
                    <br>
                    <input type="text" name="number_views" value="{{$rowProduct->number_views}}" placeholder="Số lượt views" class="form-control">
                    @error('number_views')
                    <div style="color:red">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Mô tả</label>
                    <br>
                    <textarea placeholder="Thêm câu hỏi vào đây" name="description" id="summernote">{{$rowProduct->description}}</textarea>
                    @error('description')
                    <div style="color:red">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <button class="btn btn-primary">Sửa khóa học</button>
    </form>
    @else
    <form action="{{ route('san-pham.them') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tên sản phẩm</label>
                    <input type="text" class="form-control" onkeyup="ChangeToSlug()" placeholder="Tên sản phẩm" name="name" value="{{ old('name') }}" id="slug" aria-describedby="emailHelp">
                    @error('name')
                    <div style="color:red">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Đường dẫn</label>
                    <input type="text" class="form-control" id="convert_slug" value="{{ old('slug') }}" name="slug" placeholder="Slug sản phẩm">
                    @error('slug')
                    <div style="color:red">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Ảnh chính</label>
                    <br>
                    <input type="file" name="img" placeholder="Ảnh chính">
                    @error('img')
                    <div style="color:red">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Ảnh phụ</label>
                    <br>
                    <input type="file" multiple="multiple" name="img_sub[]">
                    @error('img_sub')
                    <div style="color:red">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3" style="margin-top: 40px;">
                    <label for="exampleInputPassword1" class="form-label">Số lượng</label>
                    <br>
                    <input type="text" name="quantity" value="{{ old('quantity') }}" placeholder="Giá sản phẩm" class="form-control">
                    @error('quantity')
                    <div style="color:red">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tên danh mục</label>
                    <select class="form-select" name="cate_id" aria-label="Default select example">
                        <option selected value="">--------Danh mục--------</option>
                        @foreach($cateAll as $key)
                        <option value="{{$key->id}}">{{$key->name}}</option>
                        @endforeach
                    </select>
                    @error('cate_id')
                    <div style="color:red">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Chọn size</label>
                    <div class="product__size-radio">
                        <input type="checkbox" value="38" name="size[]" id="size_five">
                        <label class="label" for="size_five">38</label>
                        <input type="checkbox" value="39" name="size[]" id="size_one">
                        <label class="label" for="size_one">39</label>
                        <input type="checkbox" value="40" name="size[]" id="size_two">
                        <label class="label" for="size_two">40</label>
                        <input type="checkbox" value="41" name="size[]" id="size_three">
                        <label class="label" for="size_three">41</label>
                        <input type="checkbox" value="42" name="size[]" id="size_four">
                        <label class="label" for="size_four">42</label>
                        <input type="checkbox" value="43" name="size[]" id="size_six">
                        <label class="label" for="size_six">43</label>
                    </div>
                    @error('size')
                    <div style="color:red">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Giá</label>
                    <br>
                    <input type="text" name="price" value="{{ old('price') }}" placeholder="Giá sản phẩm" class="form-control">
                    @error('price')
                    <div style="color:red">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Giá khuyến mại</label>
                    <br>
                    <input type="text" name="price_sale" value="{{ old('price_sale') }}" placeholder="Giá khuyến mại" class="form-control">
                    @error('price_sale')
                    <div style="color:red">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Số lượt views</label>
                    <br>
                    <input type="text" name="number_views" value="{{ old('number_views') }}" placeholder="Số lượt views" class="form-control">
                    @error('number_views')
                    <div style="color:red">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Mô tả</label>
                    <br>
                    <textarea placeholder="Thêm câu hỏi vào đây" name="description" id="summernote">{{ old('description') }}</textarea>
                    @error('description')
                    <div style="color:red">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <button class="btn btn-primary">Thêm khóa học</button>
    </form>
    @endif
</div>
<script>
    $('#summernote').summernote({
        placeholder: 'Nhập đề bài ...',
        tabsize: 2,
        height: 120,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
</script>
@endsection