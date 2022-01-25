<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\customer;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;

class Form extends Controller
{
    public function index()
    {
        return view('client.form', []);
    }

    // Đang ký
    public function register(Request $request)
    {
        if (empty($request->name) || empty($request->email) || empty($request->password) || empty($request->phone) || empty($request->address)) {
            session()->put('error',  'Bạn đang bỏ trống dữ liệu !!!');
            return redirect()->intended('dang-ky-dang-nhap');
        }

        if ($request->has('img')) {
            $file = $request->img;
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('upload', $fileName));
        } else {
            session()->put('error',  'Bạn chưa chọn ảnh !!!');
            return redirect()->intended('dang-ky-dang-nhap');
        }

        $checkMail = customer::where('email', '=', $request->email)->get();
        if (!$checkMail) {
            session()->put('error',  'Email này đã tồn tại !!!');
            return redirect()->intended('dang-ky-dang-nhap');
        }

        $codeRand = rand(100000, 999999);

        $passNew = password_hash($request->password, PASSWORD_DEFAULT);
        $temporary = [
            'name' => $request->name,
            'img' => $fileName,
            'email' => $request->email,
            'password' => $passNew,
            'address' => $request->address,
            'phone' => $request->phone,
            'codeRand' => $codeRand,
        ];

        $InforTemporary  = implode("|", array_values($temporary));

        // dd($InforTemporary);

        Cookie::queue(
            'data_check',
            $InforTemporary,
            3600
        );
        try {
            Mail::send('mailConfirm', $temporary, function ($message) {
                global $request;
                $message->from('courseift123@gmail.com',  'QcShop');
                $message->to($request->email,  $request->name);
                $message->subject('Mã xác nhận của bạn là : ');
            });

            return redirect()->intended('dang-ky/xac-nhan');
        } catch (Exception $e) {
            session()->put('error',  'Gửi mail lỗi !!!');
            return redirect()->intended('dang-ky-dang-nhap');
        }
    }

    // Trang xác nhận
    public function pageConfirm()
    {
        return view('client.confirm', []);
    }

    // Kiểm tra mã xác nhận

    public function confirm(Request $request)
    {
        if (empty($request->confirm)) {
            session()->put('error', 'Bạn đang bỏ trống dữ liệu !!!');
            return redirect()->intended('/dang-ky/xac-nhan');
        }

        $dataCookie = Cookie::get('data_check');
        $dataCheck = explode('|', filter_var(trim($dataCookie, '|')));

        $codeCookie = end($dataCheck);
        // dd($codeCookie);
        if ($request->confirm == $codeCookie) {
            unset($dataCheck[6]);

            $model = new customer();
            $model->name = $dataCheck[0];
            $model->img = $dataCheck[1];
            $model->email = $dataCheck[2];
            $model->password = $dataCheck[3];
            $model->address = $dataCheck[4];
            $model->phone =  $dataCheck[5];
            $model->save();

            session()->put('success', 'Xác nhận thành công !!!');
            session()->put('login', 'ok');
            return redirect()->intended('/dang-ky-dang-nhap');
        } else {
            session()->put('error', 'Mã xác nhận sai !!!');
            return redirect()->intended('/dang-ky/xac-nhan');
            die();
        }
    }

    // Đăng nhập
    public function login(Request $request)
    {
        if (empty($request->email) || empty($request->password)) {
            session()->put('error',  'Bạn đang bỏ trống dữ liệu !!!');
            return redirect()->intended('dang-ky-dang-nhap');
            die();
        }

        $dataCustomer = customer::where('email', '=', $request->email)->get();

        if (password_verify($request->password, $dataCustomer[0]->password)) {
            session()->put('user_info',  $dataCustomer[0]);
            return redirect()->route('home')->with('success', 'Đăng nhập thành công');
            die();
        } else {
            session()->put('error',  'Kiểm tra lại tài khoản !!!');
            return redirect()->intended('dang-ky-dang-nhap');
            die();
        }
    }

    // Đăng xuất
    public function logOut()
    {
        session()->forget('user_info');
        session()->forget('login');
        return redirect()->back()->with('success',  'Tài khoản đã đăng xuất !!!');
        die();
    }
}
