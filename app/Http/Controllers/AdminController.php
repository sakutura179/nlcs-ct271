<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        //
    }

    public function home($id)
    {
        if (Auth::guard('admin')->user()->username == $id) {
            return view('admin.layout.home');
        } else {
            return redirect()->route('login');  
        }
    }

    public function create()
    {
        //
    }

}
