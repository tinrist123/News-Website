<?php

namespace App\Http\Controllers;

use App\Http\Requests\SlideRequest;
use Illuminate\Http\Request;
use App\Slide;
use Illuminate\Support\Str;

class SlideController extends Controller
{
    //
    public function getList()
    {
        $slide = Slide::all();


        return view('admin.slide.list', compact('slide'));
    }

    public function getAdd()
    {
        return view('admin.slide.add');
    }

    public function postAdd(SlideRequest $request)
    {
        $slide = new Slide;

        $slide->Ten = $request->txtTen;
        $slide->NoiDung = $request->txtContent;
        $slide->link = $request->txtLink;

        if ($request->hasFile('fImages')) {
            $file = $request->fImages;
            $name = $file->getClientOriginalName();
            $img_name = Str::random(4) . "_" . $name;
            while (file_exists("public/upload/slide/" . $img_name)) {
                $img_name = Str::random(4) . "_" . $name;
            }

            $file->move('public/upload/slide', $img_name);
            $slide->Hinh = $img_name;
        }

        $slide->save();

        return redirect()->route('admin.slide.getList')->with(['flash_message' => 'Thêm Thành Công']);
    }

    public function getDelete($id)
    {
        $slide = Slide::findOrFail($id);

        $slide->delete($id);

        return redirect()->route('admin.slide.getList')->with(['flash_message' => 'Xóa Thành Công']);
    }

    public function getEdit($id)
    {
        $slide_clicked = Slide::findOrFail($id);
        return view('admin.slide.edit', compact('slide_clicked'));
    }

    public function postEdit(Request $request, $id)
    {


        $this->validate($request, [
            'txtTen' => 'required|min:3|max:100|',
            'txtContent' => 'required|min:3|max:100|',
            'txtLink' => 'required',
        ], [
            'txtTen.required' => 'Bạn Chưa Nhập Tên Thể Loại !',
            'txtTen.min' => 'Tên thể loại phải có độ dài từ 3-100 !',
            'txtTen.max' => 'Tên thể loại phải có độ dài từ 3-100 !',
            'txtContent.required' => 'Vui Lòng nhập tiêu đề !',
            'txtLink.required' => 'Vui lòng nhập đường link !',
        ]);

        $slide = Slide::findOrFail($id);

        $slide->Ten = $request->txtTen;
        $slide->NoiDung = $request->txtContent;
        $slide->link = $request->txtLink;

        if ($request->hasFile('fImages')) {
            $file = $request->fImages;
            $name = $file->getClientOriginalName();
            unlink('public/upload/slide/' . $slide->Hinh);
            $img_name = Str::random(4) . "_" . $name;
            while (file_exists("public/upload/slide/" . $img_name)) {
                $img_name = Str::random(4) . "_" . $name;
            }
            $file->move('public/upload/slide', $img_name);
            $slide->Hinh = $img_name;
        }

        $slide->save();

        return redirect()->route('admin.slide.getList')->with(['flash_message' => 'Sửa Thành Công']);
    }
}
