<?php

namespace App\Http\Controllers;

use App\Viewer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ViewerController extends Controller
{
    public function home($id)
    {
        if (Auth::guard('viewer')->user()->username == $id) {
            return view('viewer.layout.home');
        } else {
            return redirect()->route('login');  
        }
    }

    public function show()
    {
        $list = Viewer::all();
        return view('admin.viewer.list', ['list' => $list]);
    }

    public function create()
    {
        return view('signin');
    }

    public function add(Request $request)
    {
       $this->validate($request, 
            [
                'username' => 'unique:viewers,username',
                'email' => 'unique:viewers,email',
            ],
            [
                'username.unique' => 'Tài khoản đã được sử dụng',

                'email.unique' => 'Email đã được sử dụng',
            ]
        );

        $viewer = new Viewer();
        $viewer->username = $request->username;
        $viewer->password = bcrypt($request->password);
        $viewer->role_id = 3;
        $viewer->fullname = $request->fullname;
        $viewer->email = $request->email;
        $viewer->birth_day = Carbon::parse($request->birth_day);

        $viewer->save();

        return redirect()->route('login')->with('noti', 'Đã đăng ký tài khoản thành công.');
    }

    public function edit($id)
    {
        $viewer = Viewer::find($id);

        return view('viewer.edit', ['viewer' => $viewer]);
    }

    public function postEdit(Request $request)
    {
        $viewer = Viewer::find($request->username);
        if ($request->changePass == "on") {
            if (Hash::check($request->old_password, $viewer->password)) { // Hàm kiểm tra mật khẩu cũ và mật khẩu trong csdl có trùng k
                if (!Hash::check($request->password, $viewer->password)) { // Hàm kiểm tra mật khẩu mới và mật khẩu trong csdl có trùng k
                    $viewer->password = bcrypt($request->password);
                } else {
                    return redirect()->route('edit-viewer', ['id' => $viewer->username])
                         ->with('error', 'Mật khẩu mới không được trùng với mật khẩu cũ');
                }
            } else {
                return redirect()->route('edit-viewer', ['id' => $viewer->username])
                         ->with('error', 'Mật khẩu cũ không khớp');
            }
        }

        if ($request->changeName == "on") {
            $viewer->fullname = $request->fullname;
        }

        if ($request->changeEmail == "on") {
            $this->validate($request, 
                [
                    'email' => 'unique:viewers,email',
                ],
                [
                    'email.unique' => 'Email đã được sử dụng',
                ]
            );
            $viewer->email = $request->email;
        }

        if ($request->changeBirth == "on") {
            $viewer->birth_day = Carbon::parse($request->birth_day);
        }

        if ($request->changeAddress == "on") {
            $viewer->address = $request->address;
        }

        if ($request->changePhone == "on") {
            $viewer->phone_no = $request->phone_no;
        }

        if ($request->changeBank == "on") {
            $viewer->b_account_no = $request->b_account_no;
        }

        $viewer->save();

        if ($request->changePass == "on") {
            return redirect()->route('logout');
        }
        
        return redirect()->route('edit-viewer', ['id' => $viewer->username])
                         ->with('noti', 'Chỉnh sửa thông tin thành công');
    }

    public function destroy($id)
    {
        $data = Viewer::find($id);

        $data->delete();
        
        return redirect()->route('viewer-list')->with('noti', 'Đã xóa thành công người dùng');
    }
}
