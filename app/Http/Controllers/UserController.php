<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class UserController extends Controller
{
    //
    public function getList()
    {
        $listUser = User::select('id', 'name', 'quyen', 'email')->orderBy('id', 'DESC')->get()->toArray();

        return view('admin.user.list', compact('listUser'));
    }
    public function getAdd()
    {
        return view('admin.user.add');
    }
    public function postAdd(UserRequest $request)
    {
        $user = new User();

        $user->name = $request->txtUser;
        $user->password = Hash::make($request->txtPass);
        $user->email = $request->txtEmail;
        $user->remember_token = $request->_token;
        $user->quyen = $request->rdoLevel;


        $user->save();

        return redirect()->route('admin.user.list')->with(['flash_message' => 'Thêm Thành Công User']);
    }
    public function getDelete($id)
    {
        $user_current_login = Auth::user();
        $user = User::findOrFail($id);

        if ($user_current_login->quyen < $user->quyen) {
            $user->delete($id);
            return redirect()->route('admin.user.list')->with(['flash_message' => "Xóa Thành Công $user->name"]);
        } else {
            return redirect()->route('admin.user.list')->with(['flash_message' => "Không đủ quyền để xóa $user->name", 'atr' => 'danger']);
        }
    }

    public function getEdit($id)
    {
        $user_current_login = Auth::user();
        $user = User::findOrFail($id)->toArray();
        $nameEdited = $user['name'];
        if ($user_current_login->quyen != 3 && ($user_current_login->quyen <= $user['quyen'] && $user_current_login->id == $user['id'])) {
            return view('admin.user.edit', compact('user', 'id'));
        } else {
            return redirect()->route('admin.user.list')->with(['flash_message' => "Không đủ quyền để sửa $nameEdited ", 'atr' => 'danger']);
        }
    }
    public function postEdit($id, Request $request)
    {
        if ($user = User::findOrFail($id)) {
            if ($request->input('txtPass')) {
                $this->validate($request, [
                    'txtRePass' => 'same:txtRePass'
                ], [
                    'txtRePass.same' => 'hai mật khẩu không trùng nhau'
                ]);
                $pass = $request->input('txtPass');
                $user->password = Hash::make($pass);
            }
            $user->email = $request->txtEmail;
            $user->quyen = $request->rdoLevel;
            $user->remember_token = $request->_token;
            $user->save();

            return redirect()->route('admin.user.list')->with(['flash_message' => "Cập Nhập thành công $user->name"]);
        }
    }

    public function getlLoginAdmin()
    {
        return view('admin.login');
    }
    public function postLoginAdmin(LoginRequest $request)
    {
        $auth = $request->only('txtUser', 'txtPass', 'quyen');
        $auth['quyen'] = 1;
        if (Auth::attempt(['email' => $auth['txtUser'], 'password' => $auth['txtPass'], 'quyen' => $auth['quyen']])) {
            return redirect()->route('admin.user.list');
        } else {
            return redirect()->back()->with(['flash_message' => 'Sai tài khoản hoặc mật khẩu!!']);
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->to('admin/dangnhap');
    }

    public function postLogin(LoginRequest $request)
    {
        $auth = $request->only('txtUser', 'txtPass', 'quyen');

        if (Auth::attempt(['email' => $auth['txtUser'], 'password' => $auth['txtPass'], 'quyen' => 0])) {
            return redirect('/');
        } else {
            return redirect()->back()->with(['flash_message' => "Sai tài khoản hoặc mật khẩu"]);
        }
    }

    public function postUser(Request $request, $id)
    {
        if ($user = User::findOrFail($id)) {
            if ($request->input('txtPass')) {
                $this->validate($request, [
                    'txtRePass' => 'same:txtPass'
                ], [
                    'txtRePass.same' => 'hai mật khẩu không trùng nhau'
                ]);
                $pass = $request->input('txtPass');
                $user->password = Hash::make($pass);
            }

            $this->validate($request, [
                'txtName' => 'required'
            ], [
                'txtName.required' => 'Vui lòng đừng để trống tên!!'
            ]);
            $user->name = $request->txtName;
            $user->remember_token = $request->_token;
            $user->save();

            return redirect()->back()->with(['flash_message' => "Cập Nhập thành công $user->name"]);
        }
    }

    public function postRes(RegisterRequest $request)
    {
        $newUser = new User;

        $newUser->name = $request->txtName;
        $newUser->email = $request->txtEmail;
        $newUser->password = Hash::make($request->txtPass);
        $newUser->remember_token = $request->_token;

        $newUser->save();

        return redirect()->to('login')->with(['flash_message' => 'Đăng Kí Thành Công', 'atr' => 'success']);
    }
}
