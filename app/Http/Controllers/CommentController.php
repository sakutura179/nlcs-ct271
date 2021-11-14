<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function show($id)
    {
        $list = Comment::where(['news_id' => $id])->get();
        return view('admin.news.comment', ['list' => $list]);
    }

    public function authorShow($id)
    {
        $list = Comment::where(['news_id' => $id])->get();
        return view('author.news.comment', ['list' => $list]);
    }

    public function add(Request $request)
    {
        $comment = new Comment();
        $comment->news_id = $request->news_id;
        $comment->username = $request->viewer_id;
        $comment->content = $request->comment;

        $comment->save();

        $comments = Comment::where(['news_id' => $comment->news_id])->orderBy('comment_id', 'desc')->get();
        foreach ($comments as $value) { // Tai lai danh sach comment bang AJAX sau khi them
            echo "
            <div class='comment' id='".$value->comment_id."'>
                <p class='comment-header'>". $value->commentBelongsToViewer->fullname ."
                    <small> ". $value->created_at ."</small></p>
                <p class='comment-content'>". $value->content ."</p>";
                if ($value->username == $comment->username) {
                    echo "
                    <p><a onclick='editComment(".$value->comment_id.")' style='color: blue; cursor: pointer;'> 
                            Sửa bình luận <i class='fa fa-pencil' aria-hidden='true'></i> </a>
                       <a onclick='deleteComment(".$value->comment_id.")' style='color: blue; cursor: pointer;'> 
                            Xóa bình luận <i class='fa fa-trash' aria-hidden='true'></i> </a></p>";
                }
            echo "</div>";
        }
    }

    public function getEdit($id, $csrf) // Ham hien thi textarea truc tiep
    {
        $comment = Comment::find($id);
        $link = "http://localhost/viewer/";
        echo "
        <form action='".$link."edit-comment' method='POST' id='edit-comment-form'>  <!-- Hien thi form -->
            <input type='hidden' name='_token' value='".$csrf."'> <!-- csrf token -->
            <textarea name='comment' id='comment'>".$comment->content."</textarea>
            <input type='hidden' name='comment_id' value='".$comment->comment_id."'> <!-- id cua comment de gui den POST sua -->
            <input type='submit' value='Bình luận' id='comment-btn'>
        </form>
        <script> 
            $(function() { // Code để tải lại comment sau khi sửa (Sau khi nhan du lieu ve tu POST sua)
                $('#edit-comment-form').submit(function (e) { // Khi submit form thì function này sẽ chạy
                    e.preventDefault();
                                                    
                    var actionURL = e.currentTarget.action; // Lấy ra đường dẫn của action
                
                    $.ajax({
                        url: actionURL,
                        type: 'post', // Kiểu truyền
                        data: $('#edit-comment-form').serialize(), // Dữ liệu (Truy cập bằng biến post)
                        success: function(data) { // Nếu xử lý thành công thì ...
                            $('#comments-container').html(data);
                        }
                    })
                });
            });
        </script>";
    }

    public function edit(Request $request) // POST sua
    {
        $comment = Comment::find($request->comment_id);
        $comment->content = $request->comment;
        $comment->save();

        $comments = Comment::where(['news_id' => $comment->news_id])->orderBy('comment_id', 'desc')->get();
        foreach ($comments as $value) { // Tai lai danh sach comment bang AJAX sau khi sua
            echo "
            <div class='comment' id='".$value->comment_id."'>
                <p class='comment-header'>". $value->commentBelongsToViewer->fullname ."
                    <small> ". $value->created_at ."</small></p>
                <p class='comment-content'>". $value->content ."</p>";
                if ($value->username == $comment->username) {
                    echo "
                    <p><a onclick='editComment(".$value->comment_id.")' style='color: blue; cursor: pointer;'> 
                            Sửa bình luận <i class='fa fa-pencil' aria-hidden='true'></i> </a>
                       <a onclick='deleteComment(".$value->comment_id.")' style='color: blue; cursor: pointer;'> 
                            Xóa bình luận <i class='fa fa-trash' aria-hidden='true'></i> </a></p>";
                }
            echo "</div>";
        }
    }

    public function delete($id)
    {
        $data = Comment::find($id);
        $news_id = $data->news_id; // Gan truoc de sau khi xoa con su dung duoc nua
        $username = $data->username;

        $data->delete();

        $comments = Comment::where(['news_id' => $news_id])->orderBy('comment_id', 'desc')->get();
        foreach ($comments as $value) { // Tai lai danh sach comment bang AJAX sau khi xoa
            echo "
            <div class='comment' id='".$value->comment_id."'>
                <p class='comment-header'>". $value->commentBelongsToViewer->fullname ."
                    <small> ". $value->created_at ."</small></p>
                <p class='comment-content'>". $value->content ."</p>";
                if ($value->username == $username) {
                    echo "
                    <p><a onclick='editComment(".$value->comment_id.")' style='color: blue; cursor: pointer;'> 
                            Sửa bình luận <i class='fa fa-pencil' aria-hidden='true'></i> </a>
                       <a onclick='deleteComment(".$value->comment_id.")' style='color: blue; cursor: pointer;'> 
                            Xóa bình luận <i class='fa fa-trash' aria-hidden='true'></i> </a></p>";
                }
            echo "</div>";
        }
    }

    public function adminDelete($id)
    {
        // Xoa truc tiep tu trang bai viet
        $data = Comment::find($id);
        $news_id = $data->news_id; // Gan truoc de sau khi xoa con su dung duoc nua

        $data->delete();

        $comments = Comment::where(['news_id' => $news_id])->orderBy('comment_id', 'desc')->get();
        foreach ($comments as $value) { // Tai lai danh sach comment bang AJAX sau khi xoa
            echo "
            <div class='comment' id='".$value->comment_id."'>
                <p class='comment-header'>". $value->commentBelongsToViewer->fullname ."
                    <small> ". $value->created_at ."</small></p>
                <p class='comment-content'>". $value->content ."</p>
                <p><a onclick='adminDeleteComment(".$value->comment_id.")' style='color: blue; cursor: pointer;'> 
                        Xóa bình luận <i class='fa fa-trash' aria-hidden='true'></i> </a></p>
            </div>";
        }
    }

    public function destroy($idc, $id)
    {
        // Xoa tu bang comment cua giao dien admin
        $data = Comment::find($idc);
        $data->delete();

        return redirect()->route('list-comment', ['id' => $id])->with('noti', 'Đã xóa bình luận');
    }

    public function authorDestroy($idc, $id)
    {
        // Xoa tu bang comment cua giao dien author
        $data = Comment::find($idc);
        $data->delete();

        return redirect()->route('author-list-comment', ['id' => $id])->with('noti', 'Đã xóa bình luận');
    }
}
