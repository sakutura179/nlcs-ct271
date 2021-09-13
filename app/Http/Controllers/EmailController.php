<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\RecoveryPassword;
use App\Viewer;
use Illuminate\Support\Facades\Session;

class EmailController extends Controller
{
    /* Lay lai mat khau qua email */
    // gui ma xac nhan qua email

    public function getRecovery()
    {
        return view('recoveryPass.recoveryPassword');
    }

    public function RecoveryPassword(Request $request)
    {
        $dataV = Viewer::where(['email' => $request->email])->first();
        $dataA = Author::where(['email' => $request->email])->first();
        if ($dataV == null && $dataA == null) {
            return redirect()->route('recovery')->with('error', 'Email không tồn tại');
        }
        $recoveryCode = Str::random(5);
        $request->session()->put('code', $recoveryCode);
        Mail::to($request['email'])->send(new RecoveryPassword($recoveryCode));

        return view('recoveryPass.confirmCode', ['email' => $request['email']]);
    }

    // xac nhan ma xac nhan
    public function postCode(Request $request)
    {
        $code = $request->session()->pull('code');
        if ($request['code'] == $code) {
            return view('recoveryPass.reset', ['email' => $request['email']]);
        } else {
            return redirect()->route('login')->with('alert', 'Đã nhập sai mã xác nhận');
        }
        
    }

    public function postReset(Request $request)
    {
        $data = Viewer::where(['email' => $request->email])->first();
        if ($data != null) {
            $data->password = bcrypt($request->password);
            $data->save();

            return redirect()->route('login')->with('noti', 'Đã đổi mật khẩu thành công');
        }

        $data = Author::where(['email' => $request->email])->first();
        if ($data != null) {
            $data->password = bcrypt($request->password);
            $data->save();

            return redirect()->route('login')->with('noti', 'Đã đổi mật khẩu thành công');
        }
    }
}
