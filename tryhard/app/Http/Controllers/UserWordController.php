<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserWordController extends Controller
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
        if(strlen($search_key) > 0){
            $user_words = DB::table('user_words')
                ->orderBy('updated_at', 'desc')
                ->where('user_id', '=', Auth::user()->id)
                ->where(function($query) use ($search_key) {
                    $query->where('word_content', 'like', '%'.$search_key.'%')
                    ->orWhere('word_description', 'like', '%'.$search_key.'%');
                })
                ->paginate(10);
        }else{
            $user_words = DB::table('user_words')
                ->orderBy('updated_at', 'desc')
                ->where('user_id', '=', Auth::user()->id)
                ->paginate(10);
        }

        return view('user_words.index',compact('user_words'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function search(Request $request){
        $data = $request->all();
        return redirect()->route('user_words.index',$data["search_key"]);
    }
    public function getListWords(Request $request)
    {
        if (Auth::check()) {
            // The user is logged in...
            $list_words = DB::table('user_words')
                ->select('user_words.id','user_words.post_id','user_words.word_content','user_words.word_description')
                ->where('user_id', Auth::id())
                ->orderBy('updated_at', 'desc')
                ->get();
            return response()->json(['success'=>$list_words]);
        }
        return response()->json(['success'=>'false']);
    }
    public function data($search_key = "")
    {
        if(strlen($search_key) > 0){
            $user_words = DB::table('user_words')
                ->orderBy('updated_at', 'desc')
                ->where('user_id', '=', Auth::user()->id)
                ->where(function($query) use ($search_key) {
                    $query->where('word_content', 'like', '%'.$search_key.'%')
                        ->orWhere('word_description', 'like', '%'.$search_key.'%');
                })
                ->paginate(10);
        }else{
            $user_words = DB::table('user_words')
                ->orderBy('updated_at', 'desc')
                ->where('user_id', '=', Auth::user()->id)
                ->paginate(10);
        }

        return view('user_words.data',compact('user_words'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }
    public function  getData(){
        if (Auth::check()) {
            DB::statement(DB::raw('set @row:=0'));
            // The user is logged in...
            $list_words = DB::table('user_words')
                ->selectRaw('*, @row:=@row+1 as no')
                ->where('user_id', Auth::id())
                ->orderBy('updated_at', 'desc')
                ->get();
            return response()->json(['data'=>$list_words]);
        }
        return response()->json(['data'=>'false']);
    }
}
