<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\judge;
use Illuminate\Http\Request;

class adminAssess extends Controller
{
    // public function __construct()
    // {
    //     if (session()->exists('admin_info') == false) {
    //         return redirect()->intended('dang-ky-dang-nhap');
    //         die();
    //     }
    // }
    public function index()
    {
        if (session()->exists('admin_info') == false) {
            return redirect()->intended('dang-ky-dang-nhap');
            die();
        }

        $dataAssess  = judge::paginate(5);
        // dd($dataAssess);
        return view('admin.adminAssess.listAssess', [
            'dataAssess' => $dataAssess,
        ]);
    }

    public function destroy($id)
    {
        judge::find($id)->delete();
        return redirect()->back()->with('success', 'Xóa thành công');
    }

    public function update(Request $request)
    {
        $model = judge::find($request->assess_id);
        $model->status = $request->status;
        $model->save();
        return redirect()->intended('/quan-tri/danh-gia')->with('success', 'Sửa thành công');
    }
}
