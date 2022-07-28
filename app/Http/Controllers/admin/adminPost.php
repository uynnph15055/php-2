<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\post;
use Illuminate\Http\Request;

class adminPost extends Controller
{
    public function index()
    {
        if (session()->exists('admin_info') == false) {
            return redirect()->intended('dang-ky-dang-nhap');
            die();
        }

        $post = post::paginate(2);
        return view('admin.adminPost.adminPost', [
            'post' => $post,
        ]);
    }

    public function store()
    {
        return view('admin.adminPost.addPost', []);
    }

    public function create(Request $request)
    {
        if ($request->has('img')) {
            $file = $request->img;
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('upload'), $fileName);
        }

        $model = new post();
        $model->fill($request->all());
        $model->img = $fileName;
        $model->save();

        return redirect()->route('tin-tuc.index')->with('success', 'Thêm thành công');
    }

    public function delete($id)
    {
        post::find($id)->delete();
        return redirect()->back()->with('success', 'Xóa thành công');
    }

    public function edit($id)
    {
        if (session()->exists('admin_info') == false) {
            return redirect()->intended('dang-ky-dang-nhap');
            die();
        }

        $rowPost = post::find($id);
        // dd($rowPost->id);
        return view('admin.adminPost.addPost', [
            'rowPost' => $rowPost,
        ]);
    }

    public function update(Request $request)
    {
        
        $rowPost = post::find($request->id);
        $fileName = '';
        if ($request->has('img')) {
            $file = $request->img;
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('upload'), $fileName);
        } else {
            $fileName = $rowPost->img;
        }

        $model = post::find($request->id);
        $model->img = $fileName;
        $model->fill($request->all());
        $model->save();
        return redirect()->route('tin-tuc.index')->with('success', 'Sửa thành công');
    }
}
