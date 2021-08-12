<?php

namespace App\Http\Controllers;

use App\Author;
use App\Category;
use App\Comment;
use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        //
    }

    public function show() // Xem toan bo bai viet (admin)
    {
        $list = News::all();
        return view('admin.news.list', ['list' => $list]);
    }

    public function authorShow($id) // Moi author chi duoc xem bai viet cua ho
    {
        $list = News::where(['username' => $id])->get();
        return view('author.news.list', ['list' => $list]);
    }

    public function create() //Danh cho author
    {
        $listCategory = Category::all();
        return view('author.news.add', ['listCategory' => $listCategory]);
    }

    public function add(Request $request) // author them bai viet moi (author)
    {
        $this->validate($request, 
            [
                'header' => 'unique:news,header',
            ], 
            [
                'header.unique' => 'Tiêu đề đã được sử dụng',
            ]);
        $News = new News();
        $News->category_id = $request->category_id;
        $News->username = $request->username;
        $News->header = $request->header;
        $News->content = $request->content;
        // Luu hinh anh
        $file = $request->file('pic');
        $hinh = str_random(5)."_".$file->getClientOriginalName(); // Dat ten lai cho file hinh
        while (file_exists("upload/img".$hinh)) {
            $hinh = str_random(5)."_".$file->getClientOriginalName(); // Neu trung ten, tiep tuc dat lai
        }
        $file->move("upload/img/", $hinh); // upload file len server
        $News->pic = "upload/img/".$hinh; // luu duong dan vao csdl

        $News->trending = 0;
        $News->view = 0;
        $News->save();

        // Tang bai viet cua author len 1
        $Author = Author::find($request->username); 
        $Author->posts += 1;
        if ($Author->posts % 10 == 0) {
            $Author->level += 1;
            $Author->salary = $Author->level*1.1*7000000;
        }
        $Author->save();

        return redirect()->route('author-add-news')->with('noti', 'Đã thêm bài viết mới');
    }

    public function trending($id) // Ham su dung de set trending cho bai viet (admin)
    {
        $News = News::find($id);

        if ($News->trending == 0) {
            $News->trending = 1;
            echo "Có";
        } else {
            $News->trending = 0;
            echo "Không";
        }
        $News->save();
    }

    public function edit($id) // Ham su dung de author chinh sua bai viet cua minh (author)
    {
        $listCategory = Category::all();
        $data = News::find($id);
        return view('author.news.edit', ['listCategory' => $listCategory, 'data' => $data]);
    }

    public function postEdit(Request $request) // Ham su dung de author chinh sua bai viet cua minh (author)
    {
        $News = News::find($request->news_id);
        if ($News->header != $request->header) {
            $this->validate($request, 
                [
                    'header' => 'unique:news,header',
                ],
                [
                    'header.unique' => 'Tiêu đề đã được sử dụng',
                ]
            );
        }

        $News->category_id = $request->category_id;
        $News->header = $request->header;
        $News->content = $request->content;
        // upload lai hinh neu author co tai hinh moi len
        if ($request->hasFile('pic')) {
            $file = $request->file('pic');
            $hinh = str_random(5)."-".$file->getClientOriginalName(); // Dat ten lai cho file hinh moi
            while (file_exists("upload/img".$hinh)) {
                $hinh = str_random(5)."-".$file->getClientOriginalName(); // Neu trung ten, tiep tuc dat lai
            }
            $file->move("upload/img/", $hinh); // upload hinh moi len server
            unlink($News->pic); // Xoa hinh cu tren server
            $News->pic = "upload/img/".$hinh; // luu duong dan moi vao csdl            
        }

        $News->save();

        return redirect()->route('author-edit-news', ['id' => $request->news_id])
                         ->with('noti', 'Đã chỉnh sửa bài viết');
    }

    public function destroy($id) // (admin)
    {
        $data = News::find($id);
        unlink($data->pic); // Xoa hinh tren server
        
        $author = Author::where(['username' => $data->username])->first();
        $author->posts -= 1;
        $author->save();

        $data->delete();
        
        return redirect()->route('news-list')->with('noti', 'Đã xóa thành công bài viết');
    }

    public function post($id)
    {
        $data = News::find($id);
        $data->view += 1;
        $data->save();

        // Lay 5 do se co truong hop co 1 bai trung voi bai hien tai
        // Do do, neu lay 4 thi se chi hien thi duoc 3 bai viet
        // Neu ca 5 bai deu khong phai bai hien tai, thi da co cach de in 4 bai ben view
        $related = News::where(['category_id' => $data->category_id])->orderBy('news_id', 'desc')->take(5)->get();
        $comments = Comment::where(['news_id' => $data->news_id])->orderBy('comment_id', 'desc')->get();
        return view('layouts.view', ['data' => $data, 'related' => $related, 'comments' => $comments]);
    }
}
