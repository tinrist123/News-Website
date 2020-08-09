<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
{
    //
    public function getDelete($id)
    {
        $cmt = \App\Comment::findOrFail($id);

        $cmt->delete($id);

        return redirect()->back()->with(['flash_message' => 'Xóa Cmt Thành Công']);
    }

    public function postComment(Request $request, $id)
    {
        $this->validate($request, [
            'txtContent' => 'required'
        ], [
            'txtContent.required' => 'Không thể bình luận trống'
        ]);

        $cmt = new \App\Comment;

        $cmt->NoiDung = $request->txtContent;
        $cmt->idUser = Auth::user()->id;
        $cmt->idTinTuc = $id;

        $cmt->save();

        return redirect()->back()->with(['flash_message' => 'Thêm bình luận thành công']);
    }
}
