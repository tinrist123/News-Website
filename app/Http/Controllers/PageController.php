<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\TheLoai;
use App\Slide;
use App\LoaiTin;
use App\TinTuc;
use App\User;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    //
    public function __construct()
    {
        $theloai = TheLoai::all();
        $slide = Slide::all();
        view()->share('theloai', $theloai);
        view()->share('slide', $slide);
    }

    function homePage()
    {

        return view('front.pages.home');
    }

    function contact()
    {

        return view('front.pages.contact');
    }

    function loaitin($id)
    {
        $loaitin = LoaiTin::find($id);
        $tintuc = TinTuc::where('idLoaiTin', $id)->paginate(5);
        return view('front.pages.category', compact('loaitin', 'tintuc'));
    }

    function detialTinTuc($id)
    {
        $tintuc = TinTuc::findOrFail($id);
        $comments = $tintuc->comment->sortByDesc('created_at');

        $tinlienquan = TinTuc::where('idLoaiTin', $tintuc->idLoaiTin)->take(6)->get();

        $tinnoibat = TinTuc::where('NoiBat', 1)->take(7)->get();
        return view('front.pages.detail', compact('tintuc', 'tinlienquan', 'tinnoibat', 'comments'));
    }

    public function getLogin()
    {
        return view('front.pages.login');
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function getUser($id)
    {
        $user = User::findOrFail($id);

        return view('front.pages.account', compact('user'));
    }

    public function getRes()
    {
        return view('front.pages.register');
    }

    public function timkiem(Request $request)
    {
        $keyword = $request->keyword;

        $tintuc = TinTuc::where('TieuDe', 'like', "%$keyword%")->orWhere('TomTat', 'like', "%$keyword%")->take(30)->paginate(5);

        return view('front.pages.search', compact('keyword', 'tintuc'));
    }
}
