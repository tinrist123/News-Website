<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;

class TheLoaiController extends Controller
{
    //

    public function getList()
    {
        $theloai = TheLoai::all();
        return view('admin.theloai.list', compact('theloai'));
    }

    public function getAdd()
    {
        return view('admin.theloai.add');
    }

    public function postAdd(Request $request)
    {
        $this->validate($request, [
            'txtName' => 'required|min:3|max:100|unique:theloai,Ten'
        ], [
            'txtName.required' => 'Bạn Chưa Nhập Tên Thể Loại !',
            'txtName.min' => 'Tên thể loại phải có độ dài từ 3-100 !',
            'txtName.max' => 'Tên thể loại phải có độ dài từ 3-100 !',
            'txtName.unique' => 'Tên thể loại đã tồn tại !',
        ]);

        $theloai = new TheLoai;

        $theloai->Ten = $request->txtName;
        $theloai->TenKhongDau = convert_vi_to_en($request->txtName);

        $theloai->save();

        return redirect()->route('admin.theloai.getList')->with(['flash_message' => 'Thêm Thành Công']);
    }

    public function getDelete($id)
    {
        $theloai = TheLoai::findOrFail($id);

        $theloai->delete($id);

        return redirect()->route('admin.theloai.getList')->with(['flash_message' => 'Xóa Thành Công']);
    }

    public function getEdit($id)
    {
        $theloai_clicked = Theloai::findOrFail($id);
        return view('admin.theloai.edit', compact('theloai_clicked'));
    }

    public function postEdit(Request $request, $id)
    {
        $this->validate($request, [
            'txtName' => 'required|min:3|max:100|'
        ], [
            'txtName.required' => 'Bạn Chưa Nhập Tên Thể Loại !',
            'txtName.min' => 'Tên thể loại phải có độ dài từ 3-100 !',
            'txtName.max' => 'Tên thể loại phải có độ dài từ 3-100 !',
            'txtName.unique' => 'Tênx thể loại đã tồn tại !',
        ]);

        $theloai = TheLoai::findOrFail($id);

        $theloai->Ten = $request->txtName;
        $theloai->TenKhongDau = convert_vi_to_en($request->txtName);

        $theloai->save();

        return redirect()->route('admin.theloai.getList')->with(['flash_message' => 'Sửa Thành Công']);
    }
}
