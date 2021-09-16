<?php

namespace App\Http\Controllers;

use App\Cate_plat;
use App\Category;
use App\Platform;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        //
    }

    public function show()
    {
        $list = Category::all();
        $listCatePlat = Cate_plat::all();

        return view('admin.category.list', ['list' => $list, 'listCatePlat' => $listCatePlat]);
    }

    public function create()
    {
        $listPlatform = Platform::all();
        return view('admin.category.add', ['listPlatform' => $listPlatform]);
    }

    public function add(Request $request)
    {
        $this->validate($request, 
            [
                'category_name' => 'unique:categories,category_name',
                'category_fullname' => 'unique:categories,category_fullname',
            ],
            [
                'category_name.unique' => 'Tên thể loại đã tồn tại',
                'category_fullname.unique' => 'Tên đầy đủ của thể loại đã tồn tại',
            ]
        );
        //Them vao bang categories
        $Category = new Category();
        $Category->category_name = $request->category_name;
        $Category->category_fullname = $request->category_fullname;
        $Category->slug = Str::slug($request->category_name);
        $Category->save();

        //Them vao bang cate_plat
        if (isset($request->category_platform)) {
            $id = Category::where('category_name', $request->category_name)->first();
            foreach ($request->category_platform as $value) {
                $Cate_plat = new Cate_plat();
                $Cate_plat->category_id = $id->category_id;
                $Cate_plat->platform_id = $value;
                $Cate_plat->save();
            }
        }

        return redirect()->route('add-category')->with('noti', 'Đã thêm thành công thể loại mới');
    }

    public function edit($id)
    {
        $listCatePlat = Cate_plat::where(['category_id' => $id])->get();
        $listPlatform = Platform::all();
        $data = Category::find($id);
        return view('admin.category.edit', ['listPlatform' => $listPlatform, 
                                            'data' => $data, 'listCatePlat' => $listCatePlat]);
    }

    public function postEdit(Request $request)
    {
        Cate_plat::where(['category_id' => $request->category_id])->delete();

        $Category = Category::find($request->category_id);
        if (strtolower($Category->category_name)  != strtolower($request->category_name)) {
            $this->validate($request, 
                [
                    'category_name' => 'unique:categories,category_name',
                    'category_fullname' => 'unique:categories,category_fullname',
                ],
                [
                    'category_name.unique' => 'Tên thể loại đã tồn tại',
                    'category_fullname.unique' => 'Tên đầy đủ của thể loại đã tồn tại',
                ]
            );
        }
        
        $Category->category_name = $request->category_name;
        $Category->category_fullname = $request->category_fullname;
        $Category->slug = Str::slug($request->category_name);
        $Category->save();
        if (isset($request->category_platform)) {
            foreach ($request->category_platform as $value) {
                $Cate_plat = new Cate_plat();
                $Cate_plat->category_id = $request->category_id;
                $Cate_plat->platform_id = $value;
                $Cate_plat->save();
            }
        }
        
        return redirect()->route('edit-category', ['id' => $request->category_id])
                         ->with('noti', 'Đã sửa thành công thể loại');
    }

    public function destroy($id)
    {
        $data = Category::find($id);

        $data->delete();
        
        return redirect()->route('category-list')->with('noti', 'Đã xóa thành công thể loại');
    }
}
