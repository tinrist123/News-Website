<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\TinTuc;
use App\Http\Requests\TinTucRequest;
use Illuminate\Support\Str;

class TinTucController extends Controller
{
    //
    public function getList()
    {
        $tintuc = TinTuc::all();
        return view('admin.tintuc.list', compact('tintuc'));
    }

    public function getAdd()
    {
        $parent_theloai = \App\TheLoai::select('id', 'Ten')->get()->toArray();
        $parent_loaitin = \App\LoaiTin::select('id', 'Ten')->get()->toArray();

        return view('admin.tintuc.add', compact('parent_theloai', 'parent_loaitin'));
    }

    public function postAdd(TinTucRequest $request)
    {

        $tintuc = new TinTuc;

        $tintuc->TieuDe = $request->txtTieuDe;
        $tintuc->TieuDeKhongDau = convert_vi_to_en($request->txtName);
        $tintuc->TomTat = $request->txtTieuDe;
        $tintuc->NoiDung = $request->txtTieuDe;
        $tintuc->NoiBat = $request->rdoLevel;
        $tintuc->idLoaiTin = $request->loaitin_id;
        if ($request->hasFile('fImages')) {
            $file = $request->fImages;
            $name = $file->getClientOriginalName();
            $img_name = Str::random(4) . "_" . $name;
            while (file_exists("public/upload/tintuc/" . $img_name)) {
                $img_name = Str::random(4) . "_" . $name;
            }

            $file->move('public/upload/tintuc', $img_name);
            $tintuc->Hinh = $img_name;
        } else {
            $tintuc->Hinh = "";
        }

        $tintuc->save();

        return redirect()->route('admin.tintuc.getList')->with(['flash_message' => 'Thêm Thành Công']);
    }

    public function getDelete($id)
    {
        $tintuc = TinTuc::findOrFail($id);

        $tintuc->delete($id);

        return redirect()->route('admin.tintuc.getList')->with(['flash_message' => 'Xóa Thành Công']);
    }

    public function getEdit($id)
    {
        $tintuc = TinTuc::findOrFail($id);

        $parent_theloai = \App\TheLoai::select('id', 'Ten')->get()->toArray();
        $parent_loaitin = \App\LoaiTin::select('id', 'Ten')->get()->toArray();

        $idLoaiTin = $tintuc->loaitin->id;

        $idTheLoai = $tintuc->loaitin->theloai->id;

        return view('admin.tintuc.edit', compact('tintuc', 'idLoaiTin', 'idTheLoai', 'parent_theloai', 'parent_loaitin'));
    }

    public function postEdit(TinTucRequest $request, $id)
    {
        $tintuc = new TinTuc();

        $tintuc->TieuDe = $request->txtTieuDe;
        $tintuc->TieuDeKhongDau = convert_vi_to_en($request->txtName);
        $tintuc->TomTat = $request->txtTieuDe;
        $tintuc->NoiDung = $request->txtTieuDe;
        $tintuc->NoiBat = $request->rdoLevel;
        $tintuc->idLoaiTin = $request->loaitin_id;
        if ($request->hasFile('fImages')) {
            $file = $request->fImages;
            $name = $file->getClientOriginalName();
            $img_name = Str::random(4) . "_" . $name;
            while (file_exists("public/upload/tintuc/" . $img_name)) {
                $img_name = Str::random(4) . "_" . $name;
            }

            $file->move('public/upload/tintuc', $img_name);
            $tintuc->Hinh = $img_name;
        } else {
            $tintuc->Hinh = "";
        }

        $tintuc->save();

        return redirect()->route('admin.tintuc.getList')->with(['flash_message' => 'Sửa Thành Công']);
    }

    public function getLoaiTin($id)
    {
        $theloai = \App\TheLoai::findOrFail($id);
        $loaitin = $theloai->loaitin->toArray();
        echo json_encode($loaitin);
    }
}
