<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin;
use Illuminate\Http\Request;

class adminStaff extends Controller
{
    public function index()
    {
        // if (session()->exists('admin_info') == false) {
        //     return redirect()->intended('dang-ky-dang-nhap');
        //     die();
        // }

        $dataStaff = admin::paginate(5);
        return view('admin.adminStaff.adminStaff', [
            'dataStaff' => $dataStaff,
        ]);
    }

    // thêm nhân viên
    public function create(Request $request)
    {
        if ($request->has('img')) {
            $file = $request->img;
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('upload'), $fileName);
        }

        $passwordEncode = password_hash($request->password, PASSWORD_DEFAULT);

        $modelAdmin = new admin();
        $modelAdmin->fill($request->all());
        $modelAdmin->img = $fileName;
        $modelAdmin->password = $passwordEncode;
        $modelAdmin->save();
        return redirect()->back()->with('success', 'Thêm thành công !!!');
    }

    // Xóa nhân viên
    public function delete($id)
    {
        admin::find($id)->delete();
        return redirect()->back()->with('success', 'Xóa thành công');
    }
}
