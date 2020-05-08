<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = DB::table('posts')
            ->orderBy('updated_at', 'desc')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->select('posts.*',\DB::raw('substr(posts.content, 1, 150) as content_sub_text')
                , \DB::raw(' DATE_FORMAT(posts.created_at, "%M %d %Y") as created_date')
                ,'users.name as user_name')
            ->where('is_publish', '=', 1)
            ->paginate(12);
        return $this->view('index',compact('posts'));
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function ajaxRequest()
    {
        return view('ajaxRequest');
    }



    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function ajaxRequestPost($page_num)
    {
        $posts = DB::table('posts')
            ->orderBy('updated_at', 'desc')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->select('posts.*',\DB::raw('substr(posts.content, 1, 150) as content_sub_text')
                , \DB::raw(' DATE_FORMAT(posts.created_at, "%M %d %Y") as created_date')
                ,'users.name as user_name')
            ->where('is_publish', '=', 1)
            ->skip(12 * $page_num)->take(12)
            ->get();
        return response()->json(['posts'=>$posts]);
    }
    public function ajaxRequestSearch($page_num, $key_search)
    {
        $posts = DB::table('posts')
            ->orderBy('updated_at', 'desc')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->select('posts.*',\DB::raw('substr(posts.content, 1, 150) as content_sub_text')
                , \DB::raw(' DATE_FORMAT(posts.created_at, "%M %d %Y") as created_date')
                ,'users.name as user_name')
            ->where('is_publish', '=', 1)
            ->where(function($query) use ($key_search) {
                $query->where('title', 'like', '%'.$key_search.'%')
                    ->orWhere('content', 'like', '%'.$key_search.'%');
            })
            ->skip(12 * $page_num)->take(12)
            ->get();
        return response()->json(['posts'=>$posts]);
    }

    public function postSearch(Request $request){
        $data = $request->all();
        return redirect()->route('search',$data["key_search"])->with('key_search', $data["key_search"]);
    }
    public function search($key_search){
        $posts = DB::table('posts')
            ->orderBy('updated_at', 'desc')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->select('posts.*',\DB::raw('substr(posts.content, 1, 150) as content_sub_text')
                , \DB::raw(' DATE_FORMAT(posts.created_at, "%M %d %Y") as created_date')
                ,'users.name as user_name')
            ->where('is_publish', '=', 1)
            ->where(function($query) use ($key_search) {
                $query->where('title', 'like', '%'.$key_search.'%')
                    ->orWhere('content', 'like', '%'.$key_search.'%');
            })
            ->paginate(12);
        $key = $key_search;
        return $this->view('search',compact('posts', 'key'));
    }
}
