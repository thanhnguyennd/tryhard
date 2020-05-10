<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\User_word;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $post = Post::find($id);
        $user_hot_posts = DB::table('posts')
                ->join('users', 'users.id', '=', 'posts.user_id')
                ->select('posts.*', 'users.name as user_name')
                ->where('user_id', $post->user_id)
                ->orderBy('view_count','ASC')
                ->skip(0)
                ->take(5)
                ->get();
        return $this->view('videos.index',compact('post','user_hot_posts'));
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function ajaxRequest()
    {
        return view('videos.ajaxRequest');
    }



    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function ajaxRequestPost(Request $request)
    {
        $input = $request->all();
        return response()->json(['success'=>'Got Simple Ajax Request success.']);
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function store(Request $request)
    {
        // The user is logged in...
        if (Auth::check()) {
            $data = $request->all();
            $data['user_id'] = Auth::id();
            if($data['is_update'] === false){
                unset($data['is_update']);
                return response()->json(['success'=>'update success.']);
            }
            else{
                unset($data['is_update']);
                $wordRecord = DB::table('user_words')
                ->select('user_words.id','user_words.word_content','user_words.word_description')
                ->where(
                    [
                        ['user_id', '=', Auth::id()],
                        ['id', '=', $data['id']],
                    ]
                );
                $id = User_word::create($data)->id;
                $wordRecord->update($data);
                return response()->json(['success'=>'insert success.','id' => $id]);
            }
        }
        return response()->json(['success'=>'insert failed.']);
    }

    public function delete(Request $request){
        // The user is logged in...
        if (Auth::check()) {
            $data = $request->all();
            $wordRecord = DB::table('user_words')
                ->select('user_words.id','user_words.word_content','user_words.word_description')
                ->where(
                    [
                        ['user_id', '=', Auth::id()],
                        ['id', '=', $data['id']],
                    ]
                );
            if($wordRecord != null){
                $wordRecord->delete();
            }
            return response()->json(['success'=>'save success.']);
        }
    }
}
