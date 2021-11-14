<?php

namespace App\Http\Controllers;

use App\Author;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthorController extends Controller
{
    public function home($id)
    {
        if (Auth::guard('author')->user()->username == $id) {
            return view('author.layout.home');
        } else {
            return redirect()->route('login');  
        }
    }

    public function index()
    {
        //
    }

    public function show()
    {
        $list = Author::all();
        return view('admin.author.list', ['list' => $list]);
    }

    public function create()
    {
        return view('admin.author.add');
    }

    public function add(Request $request)
    {
        $this->validate($request, 
            [
                'username' => 'unique:authors,username|unique:viewers,username|unique:admins,username',
                'email' => 'unique:authors,email',
            ],
            [
                'username.unique' => 'Tài khoản đã được sử dụng',

                'email.unique' => 'Email đã được sử dụng',
            ]
        );

        $Author = new Author();
        $Author->username = $request->username;
        $Author->password = bcrypt($request->password);
        $Author->role_id = 2;
        $Author->fullname = $request->fullname;
        $Author->email = $request->email;
        $Author->birth_day = Carbon::parse($request->birth_day);
        $Author->address = $request->address;
        $Author->phone_no = $request->phone_no;
        $Author->posts = $request->posts;
        $Author->level = $request->level;
        $Author->salary = $request->level*1.1*7000000;
        $Author->b_account_no = $request->b_account_no;

        $Author->save();

        return redirect()->route('add-author')->with('noti', 'Đã thêm tác giả mới');
    }

    public function edit($id)
    {
        $author = Author::find($id);
        return view('author.edit', ['author' => $author]);
    }

    public function postEdit(Request $request)
    {
        $author = Author::find($request->username);
        if ($request->changePass == "on") {
            if (Hash::check($request->old_password, $author->password)) { // Hàm kiểm tra mật khẩu cũ và mật khẩu trong csdl có trùng k
                $author->password = bcrypt($request->password);
            } else {
                return redirect()->route('edit-author', ['id' => $author->username])
                         ->with('error', 'Mật khẩu cũ không khớp');
            }
        }

        if ($request->changeName == "on") {
            $author->fullname = $request->fullname;
        }

        if ($request->changeEmail == "on") {
            $this->validate($request, 
                [
                    'email' => 'unique:authors,email',
                ],
                [
                    'email.unique' => 'Email đã được sử dụng',
                ]
            );
            $author->email = $request->email;
        }

        if ($request->changeBirth == "on") {
            $author->birth_day = Carbon::parse($request->birth_day);
        }

        if ($request->changeAddress == "on") {
            $author->address = $request->address;
        }

        if ($request->changePhone == "on") {
            $author->phone_no = $request->phone_no;
        }

        if ($request->changeBank == "on") {
            $author->b_account_no = $request->b_account_no;
        }

        $author->save();

        if ($request->changePass == "on") {
            return redirect()->route('logout');
        }
        
        return redirect()->route('edit-author', ['id' => $author->username])
                         ->with('noti', 'Chỉnh sửa thông tin thành công');
    }

    public function destroy($id)
    {
        $data = Author::find($id);

        $data->delete();
        
        return redirect()->route('author-list')->with('noti', 'Đã xóa thành công tác giả');
    }
}
