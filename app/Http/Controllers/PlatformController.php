<?php

namespace App\Http\Controllers;

use App\Platform;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PlatformController extends Controller
{
    public function index()
    {
        //
    }

    public function show()
    {
        $list = Platform::all();
        return view('admin.platform.list', ['list' => $list]);
    }

    public function create()
    {
        return view('admin.platform.add');
    }

    public function add(Request $request)
    {
        $this->validate($request, 
            [
                'platform_name' => 'unique:platforms,platform_name',
            ],
            [
                'platform_name.unique' => 'Tên nền tảng đã tồn tại',
            ]
        );
        $Platform = new Platform();
        $Platform->platform_name = $request->platform_name;
        $Platform->slug = Str::slug($request->platform_name);
        $Platform->save();

        return redirect()->route('add-platform')->with('noti', 'Đã thêm thành công nền tảng mới');
    }

    public function edit($id)
    {
        $data = Platform::find($id);
        return view('admin.platform.edit', ['data' => $data]);
    }

    public function postEdit(Request $request)
    {
        $Platform = Platform::find($request->platform_id);
        if (strtolower($Platform->platform_name)  != strtolower($request->platform_name)) {
            $this->validate($request, 
                [
                    'platform_name' => 'unique:platforms,platform_name',
                ],
                [
                    'platform_name.unique' => 'Tên nền tảng đã tồn tại',
                ]
            );
        }
        
        $Platform->platform_name = $request->platform_name;
        $Platform->slug = Str::slug($request->platform_name);
        $Platform->save();

        return redirect()->route('edit-platform', ['id' => $request->platform_id])
                         ->with('noti', 'Đã sửa thành công nền tảng');
    }

    public function destroy($id)
    {
        $data = Platform::find($id);

        $data->delete();
        
        return redirect()->route('platform-list')->with('noti', 'Đã xóa thành công nền tảng');
    }
}
