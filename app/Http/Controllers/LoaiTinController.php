<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;

class LoaiTinController extends Controller
{
    //
    public function getList()
    {
        $loaitin = LoaiTin::all();


        return view('admin.loaitin.list', compact('loaitin'));
    }

    public function getAdd()
    {
        $parent_theloai = \App\TheLoai::select('id', 'Ten')->get()->toArray();
        return view('admin.loaitin.add', compact('parent_theloai'));
    }

    public function postAdd(Request $request)
    {
        $this->validate($request, [
            'txtName' => 'required|min:3|max:100|unique:theloai,Ten',
            'sltTheloai_id' => 'required'
        ], [
            'txtName.required' => 'Bạn Chưa Nhập Tên Thể Loại !',
            'txtName.min' => 'Tên thể loại phải có độ dài từ 3-100 !',
            'txtName.max' => 'Tên thể loại phải có độ dài từ 3-100 !',
            'txtName.unique' => 'Tên thể loại đã tồn tại !',
            'sltTheloai_id.required' => 'Xin mời nhập loại thể loại !'
        ]);

        $theloai = new LoaiTin;

        $theloai->Ten = $request->txtName;
        $theloai->idTheLoai = $request->sltTheloai_id;
        $theloai->TenKhongDau = convert_vi_to_en($request->txtName);

        $theloai->save();

        return redirect()->route('admin.loaitin.getList')->with(['flash_message' => 'Thêm Thành Công']);
    }

    public function getDelete($id)
    {
        $loaitin = LoaiTin::findOrFail($id);

        $loaitin->delete($id);

        return redirect()->route('admin.loaitin.getList')->with(['flash_message' => 'Xóa Thành Công']);
    }

    public function getEdit($id)
    {
        $parent_theloai = \App\TheLoai::select('id', 'Ten')->get()->toArray();
        $loaitin_clicked = LoaiTin::findOrFail($id);
        return view('admin.loaitin.edit', compact('loaitin_clicked', 'parent_theloai'));
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

        $loaitin = LoaiTin::findOrFail($id);

        $loaitin->Ten = $request->txtName;
        $loaitin->idTheLoai = $request->sltTheloai_id;
        $loaitin->TenKhongDau = convert_vi_to_en($request->txtName);

        $loaitin->save();

        return redirect()->route('admin.loaitin.getList')->with(['flash_message' => 'Sửa Thành Công']);
    }
}
