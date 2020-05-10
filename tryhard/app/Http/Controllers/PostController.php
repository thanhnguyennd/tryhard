<?php

namespace App\Http\Controllers;


use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use \Datetime;
use App\Helpers\Envato\UrlId;

class PostController extends Controller
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
    public function index()
    {
        if(!$this->roleAdmin()){
            return redirect('/login');
        }
        $posts = DB::table('posts')
                ->orderBy('updated_at', 'desc')
                ->paginate(10);

        return view('posts.index',compact('posts'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!$this->roleAdmin()){
            return redirect('/login');
        }
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$this->roleAdmin()){
            return redirect('/login');
        }
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
        $post = Post::create($data);
        $post->update(["encrypt_id" => UrlId::encrypt($post->id, 1)]);

        return redirect()->route('posts.index')
                        ->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$this->roleAdmin()){
            return redirect('/login');
        }
        $post = Post::find(Crypt::decrypt($id));
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$this->roleAdmin()){
            return redirect('/login');
        }
        $post = Post::find(Crypt::decrypt($id));
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if(!$this->roleAdmin()){
            return redirect('/login');
        }
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
        $post->update($data);

        return redirect()->route('posts.index')
                        ->with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$this->roleAdmin()){
            return redirect('/login');
        }
        $post = Post::find(Crypt::decrypt($id));
        $image_path = "/images/image_thumb/".$post->image_thumb;  // Value is not URL but directory
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $post->delete();

        return redirect()->route('posts.index')
                        ->with('success','Post deleted successfully');
    }
    /**
     * Public the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function publish(Request $request, $id){
        if(!$this->roleAdmin()){
            return redirect('/login');
        }
        $user_post = Post::find(Crypt::decrypt($id));
        if($user_post->user_id == Auth::user()->id){
            $data = $request->all();
            $data['updated_at'] = new DateTime();
            $user_post->update($data);

            if($data['is_publish'] == 1){
                return redirect()->route('posts.index')
                    ->with('success','Post public successfully');
            }else{
                return redirect()->route('posts.index')
                    ->with('success','Post lock successfully');
            }
        }
    }
    function unique_image($limit)
    {
      return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
    }
}
