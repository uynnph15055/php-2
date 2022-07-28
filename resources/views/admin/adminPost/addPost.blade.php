@extends('admin.layout.admin')
@section('title' , 'Quản lý bài viết')
@section('main_content')
<style>
    #description {
        width: 100%;
        height: 200px;
    }

    .content {
        width: 100%;
    }
</style>
@if(isset($rowPost))
<div class="container">
    <h4 class="text-center">SỬA BÀI VIẾT</h4>
    <form action="{{ route('tin-tuc.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-4">
                <input type="text" hidden value="{{$rowPost->id}}" name="id" class="form-control">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Tiêu đề</label>
                    <br>
                    <input type="text" onkeyup="ChangeToSlug()" value="{{$rowPost->title}}" id="slug" name="title" placeholder="Tiêu đề bài biết" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Slug</label>
                    <br>
                    <input type="text" id="convert_slug" value="{{$rowPost->slug}}" name="slug" placeholder="Đường dẫn bài viết" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Ảnh</label>
                    <br>
                    <input type="file" name="img" class="form-control">
                </div>
                <label for="exampleInputPassword1" class="form-label">Giới thiệu</label>
                <div class="form-floating">
                    <textarea class="form-control" name="description" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 150px">{{$rowPost->description}}</textarea>
                    <label for="floatingTextarea2">Giới thiệu</label>
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Nội dung</label>
                    <br>
                    <textarea placeholder="Thêm câu hỏi vào đây" class="content" name="content" id="summernote">{{$rowPost->content}}</textarea>
                </div>
            </div>
        </div>
        <button class="btn btn-success">Thêm bài viết</button>
    </form>
</div>
@else
<div class="container">
    <h4 class="text-center">THÊM BÀI VIẾT</h4>
    <form action="{{ route('tin-tuc.create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-4">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Tiêu đề</label>
                    <br>
                    <input type="text" onkeyup="ChangeToSlug()" id="slug" name="title" placeholder="Tiêu đề bài biết" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Slug</label>
                    <br>
                    <input type="text" id="convert_slug" name="slug" placeholder="Đường dẫn bài viết" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Ảnh</label>
                    <br>
                    <input type="file" name="img" class="form-control">
                </div>
                <label for="exampleInputPassword1" class="form-label">Giới thiệu</label>
                <div class="form-floating">
                    <textarea class="form-control" name="description" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 150px"></textarea>
                    <label for="floatingTextarea2">Giới thiệu</label>
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Nội dung</label>
                    <br>
                    <textarea placeholder="Thêm câu hỏi vào đây" class="content" name="content" id="summernote"></textarea>
                </div>
            </div>
        </div>
        <button class="btn btn-success">Thêm bài viết</button>
    </form>
</div>
@endif
<script>
    $('#summernote').summernote({
        placeholder: 'Nhập đề bài ...',
        tabsize: 2,
        height: 400,
        width: 700,
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