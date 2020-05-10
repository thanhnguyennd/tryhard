<?php

namespace App\Http\Controllers;

use App\Helpers\Envato\UrlId;
use App\User_post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use \Datetime;

class UserPostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($search_key = "")
    {
        $user_posts = DB::table('user_posts')
            ->where('user_id', '=', Auth::user()->id)
            ->orderBy('updated_at', 'desc')
            ->paginate(10);

        return view('user_posts.index',compact('user_posts'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user_posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image_thumb' => 'mimes:jpeg,png,jpg,gif,svg |max:2048',
        ]);
        $data = $request->all();
        if ($request->hasFile('image_thumb')) {
            $file_name = $this->unique_image(9);
            $imageName = $file_name.'.'.request()->image_thumb->getClientOriginalExtension();
            request()->image_thumb->move(public_path('images/video_thumbs/'), $imageName);
            $data['image_thumb'] = $imageName;
        }
        $data['user_id'] = Auth::user()->id;
        $user_post = User_post::create($data);
        $user_post->update(["encrypt_id" => UrlId::encrypt($user_post->id, 2)]);

        return redirect()->route('user_posts.index')
                        ->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User_post  $user_post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_post = User_post::find(Crypt::decrypt($id));
        return view('user_posts.show',compact('user_post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User_post  $user_post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_post = User_post::find(Crypt::decrypt($id));
        return view('user_posts.edit',compact('user_post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User_post  $user_post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User_post $user_post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image_thumb' => 'mimes:jpeg,png,jpg,gif,svg |max:2048',
        ]);
        $data = $request->all();
        if ($request->hasFile('image_thumb')) {
            $file_name = $this->unique_image(9);
            $imageName = $file_name.'.'.request()->image_thumb->getClientOriginalExtension();
            request()->image_thumb->move(public_path('images/video_thumbs/'), $imageName);
            $data['image_thumb'] = $imageName;
        }
        $user_post->update($data);

        return redirect()->route('user_posts.index')
                        ->with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User_post  $user_post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_post = User_post::find(Crypt::decrypt($id));
        if($user_post->user_id == Auth::user()->id){
            $image_path = "/images/image_thumb/".$user_post->image_thumb;  // Value is not URL but directory
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
            $user_post->delete();
            return redirect()->route('user_posts.index')
                ->with('success','Post deleted successfully');
        }
    }
    /**
     * Public the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function publish(Request $request, $id){
        $user_post = User_post::find(Crypt::decrypt($id));
        if($user_post->user_id == Auth::user()->id){
            $data = $request->all();
            $data['updated_at'] = new DateTime();
            $user_post->update($data);

            if($data['is_publish'] == 1){
                return redirect()->route('user_posts.index')
                    ->with('success','Post public successfully');
            }else{
                return redirect()->route('user_posts.index')
                    ->with('success','Post lock successfully');
            }
        }
    }


    function unique_image($limit)
    {
      return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
    }
}
