<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\News;
use App\Platform;

class PageController extends Controller
{
    public function mainPage()
    {
        $trending = News::where(['trending' => 1])->orderBy('news_id', 'desc')->get();
        $newest = News::orderBy('news_id', 'desc')->take(3)->get();
        $news = News::orderBy('news_id', 'desc')->take(10)->get();
        $platform = Platform::all();
        return view('pages.mainPage', ['trending' => $trending, 'newest' => $newest, 
                                       'news' => $news, 'platform' => $platform]);
    }

    public function search($val)
    {
        if ($val == "null") {
            $news = News::orderBy('news_id', 'desc')->take(10)->get();
            foreach ($news as $item) {
                echo "
                <div class='post'>
                    <a href='post/".$item->slug."' target='_blank'>
                        <img src='".$item->pic."' alt='$item->header'></a>
                    <div class='news-frame'></div>
                    <p><a href='category/".$item->newsBelongsToCategory->slug."' id='category'>".$item->newsBelongsToCategory->category_name."</a>
                    <a href='post/".$item->slug."' target='_blank'>".$item->header."
                    <br><i>Lượt xem: ". $item->view ."<br>".$item->created_at."</i></a>
                    </p>
                </div>";
                
            }
            echo "<div class='more'><button id='more' onclick='more()'>Xem Thêm</button>
                    <div class='btn-frame'></div></div>";
        } else {
            $posts = News::where('header', 'like', '%' . $val . '%')->orderBy('news_id', 'desc')->get();
            if (count($posts) > 0) {
                foreach ($posts as $item) {
                    echo "
                    <div class='post'>
                        <a href='post/".$item->slug."' target='_blank'>
                            <img src='".$item->pic."' alt='$item->header'></a>
                        <div class='news-frame'></div>
                        <p><a href='category/".$item->newsBelongsToCategory->slug."' id='category'>".$item->newsBelongsToCategory->category_name."</a>
                        <a href='post/".$item->slug."' target='_blank'>".$item->header."
                        <br><i>Lượt xem: ". $item->view ."<br>".$item->created_at."</i></a>
                        </p>
                    </div>";
                }
            } else {
                echo "<div class='post none'>KHÔNG CÓ KẾT QUẢ</div>";
            }   
        }
    }

    public function more($val)
    {
        $num = 10*$val;
        $news = News::orderBy('news_id', 'desc')->take($num)->get();
        foreach ($news as $item) {
            echo "
            <div class='post'>
                <a href='post/".$item->slug."' target='_blank'>
                    <img src='".$item->pic."' alt='$item->header'></a>
                <div class='news-frame'></div>
                <p><a href='category/".$item->newsBelongsToCategory->slug."' id='category'>".$item->newsBelongsToCategory->category_name."</a>
                <a href='post/".$item->slug."' target='_blank'>".$item->header."
                <br><i>Lượt xem: ". $item->view ."<br>".$item->created_at."</i></a>
                </p>
            </div>";
        }
        echo "<div class='more'><button id='more' onclick='more()'>Xem Thêm</button>
            <div class='btn-frame'></div></div>";
    }

    public function category($slug)
    {
        if ($slug == 'khac') {
            $header = array(1, 2, 3, 4, 5, 6, 7, 8);
            $news = News::whereNotIn('category_id', $header)->orderBy('news_id', 'desc')->paginate(10);
            return view('pages.categoryPage', ['news' => $news]);
        } else {
            $cate = Category::where(['slug' => $slug])->first(); // lay ra the loai
            if ($cate == null) {
                return redirect('/');
            } else {
                $news = News::where('category_id', $cate->category_id)->orderBy('news_id', 'desc')->paginate(10);
                return view('pages.categoryPage', ['news' => $news, 'category' => $cate]);                 
            }
        }
    }

    public function platform($slug)
    {
        /* 
        |    Ý tưởng: 
        |        Ban đầu tìm ra platform người dùng nhấp vào 
        |        Sau đó từ platform qua quan hệ với category, ta sẽ tìm được những category của nền tảng đó
        |        Tiếp theo, ta sẽ có 1 mảng các thể loại của nền tảng ($id_category)
        |        Từ đó, sử dụng whereIn của model để tìm theo mảng (stackoverflow)
        |        Cuối cùng, sử dụng paginate để phân trang
        |
        |    Do trong bảng news không có id platform, nên phải cần làm như thể này để có thể phân trang được
        */
        $platform = Platform::where(['slug' => $slug])->first(); // lay ra nen tang
        if ($platform == null) {
            return redirect('/');
        }

        $categories = $platform->platformBelongsToCategory; // Lay ra nhung the loai thuoc nen tang $id

        if (count($categories) == 0) { // Neu nen tang chua co the loai nao het
            return view('pages.platformPage', ['news' => $categories, 'platform' => $platform]);
        } else {
            $i = 0; // Bien dem cua mang chua du lieu
            foreach ($categories as $category) { // Moi the loai lay ra id the loai. Sau do gan vao mang id de so sanh o duoi
                $id_category[$i] = $category->category_id;
                $i++; // Sau khi gan thi tang bien dem len
            }

            $news = News::whereIn('category_id', $id_category)->orderBy('news_id', 'desc')->paginate(10); 
            // Su dung whereIn de so sanh gia tri trong cot voi 1 mang
            return view('pages.platformPage', ['news' => $news, 'platform' => $platform]);
        }
    }
}
