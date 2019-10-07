<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;
use App\News;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        // 投稿日順に並び替える
      $posts = News::all()->sortByDesc('updated_at');
      
      if (count($posts) > 0) {
        
          // shift() 配列の最初のデータを削除し、その値を返すメソッド
          // $postsは代入された最新の記事以外の記事が格納されている
        $headline = $posts->shift();
      } else {
        $headline = null;
      }
        // View テンプレートに headline、 posts、という変数を渡している
      return view('news.index', ['headline' => $headline, 'posts' =>$posts]);
    }
}
