<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('client/Css/register.css') }}">
    <link rel="stylesheet" href="{{ asset('client/Css/base.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
</head>

<body>
    <marquee class="info_shop" width="100%" direction="left">
        <p style="font-style: italic;">Trở lại với đường đua thời trang, Qcshop mang đến thiết kế
            sơ mi
            trắng White Lotus gói trọn nét đẹp văn hóa truyền thống trong một thiết kế hiện đại đầy tinh
            tế. Đây là chiếc áo không thể thiếu của quý ông trên hành trình chinh phục thành công.
            Là một thương hiệu nội địa nhưng luôn mang trong mình giấc mơ vươn tầm thế giới, Qcshop đã
            và đang hiện thực hóa mục tiêu này bằng những bước chuyển mình cụ thể và đầy .</p>
    </marquee>
    <div class="container">
        <div class="maketing_sale-bg">
            <div class="maketing_img-bg">
                <img class="maketing_img" src="{{ asset('client/image/z3045370937426_848afb53933de912418e75a3f81d8533.jpg') }}" alt="">
            </div>
        </div>
        <div class="wrap-bg">
            <div class="wrap_form-bg">
                <div class="wrap_form-end">
                    <div class="wrap_form-status">
                        <h2 class="status-register">Đăng ký</h2>
                        <h3 id="login-click" class="status-login"><a href="">Đăng nhập</a></h3>
                    </div>
                    <form action="{{route('register')}}" class="form" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="input-bg">
                            <input id="name" type="text" name="name" placeholder="Tên đăng nhập">
                            @error('name')
                            <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-bg">
                            <label class="choose-imge" for="choose-image">Chọn ảnh</label>
                            <input name="img" id="choose-image" type="file">
                            @error('img')
                            <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-bg">
                            <input type="text" name="email" placeholder="Email của bạn">
                            @error('email')
                            <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-bg">
                            <input type="text" name="password" placeholder="Mật khẩu">
                            @error('password')
                            <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-bg">
                            <input type="text" name="address" placeholder="Địa chỉ">
                            @error('address')
                            <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-bg">
                            <input type="text" name="phone" placeholder="Số điện thoại">
                            @error('phone')
                            <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                        <p class="note">Hãy nhập đầy đủ thông tin để chúng tôi cấp tài khoản cho bạn <a href="">Qcshop</a></p>
                        <div class="btn-bg">
                            <a href=""><i class="fab fa-google-plus-g"></i> GOOGLE</a>
                            <button class="btn-enter">Đăng ký</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="wrap_form-login">
                <div class="wrap_form-end">
                    <div class="wrap_form-status">
                        <h2 class="status-register">Đăng nhập</h2>
                        <h3 style="margin-top: 7px;" id="register-click" class="status-login"><a href="">Đăng ký</a>
                        </h3>
                    </div>
                    <form action="{{ route('login') }}" class="form" method="POST">
                        @csrf
                        <div class="input-bg">
                            <input type="text" name="email" placeholder="Email của bạn">
                        </div>
                        <div class="input-bg">
                            <input type="password" name="password" placeholder="Password của bạn">
                        </div>
                        <p class="note">Hãy nhập đầy đủ thông tin để đăng nhập vào hệ thống <a href="">Qcshop</a></p>
                        <div class="btn_bg-login ">
                            <a href="">Trở lại</a>
                            <button class="btn-enter">Đăng Nhập</button>
                        </div>
                    </form>
                    <div class="btn-bg" style="margin-top: -14px;">
                        <a href=""><i class="fab fa-google-plus-g"></i> GOOGLE</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="{{ asset('client/Js/form.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(function() {
        <?php if (session()->exists('error')) { ?>

            Swal.fire({
                icon: 'warning',
                title: '<?= session('error') ?>',
                timer: 3000,

            })

        <?php
            session()->forget('error');
        } elseif (session()->exists('success')) { ?>
            Swal.fire({

                icon: 'success',
                title: '<?= session('success') ?>',
                showConfirmButton: false,
                timer: 1500

            })

        <?php session()->forget('success');
        }
        ?>
    });


 
</script>

</html>