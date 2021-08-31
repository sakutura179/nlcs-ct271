<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\RecoveryPassword;
use App\Viewer;

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
        $this->validate($request, 
            [
                'email' => 'required',
            ]);
        $recoveryCode = Str::random(5);
        Mail::to($request['email'])->send(new RecoveryPassword($recoveryCode));

        return view('recoveryPass.confirmCode', 
                    ['recoveryCode' => $recoveryCode, 'email' => $request['email']]);
    }

    // xac nhan ma xac nhan
    public function postCode(Request $request)
    {
        if ($request['code'] == $request['recovery']) {
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
