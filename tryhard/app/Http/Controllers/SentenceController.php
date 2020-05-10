<?php

namespace App\Http\Controllers;

use App\Sentence;
use Illuminate\Http\Request;

class SentenceController extends Controller
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
    public function index($key='')
    {
        if(strlen(request()->key) === 0){
            $results = Sentence::latest()->paginate(10);
        }else
        {
            $results = Sentence::where('text', 'like', '%'.request()->key.'%')
                        ->orderBy('text', 'asc')
                        ->take(10)
                        ->paginate(10)
                        ->appends(request()->query());;
        }
        return view('sentences.index',['results' => $results])
                ->with('i', (request()->input('page', 1) - 1) * 10);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sentences.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        switch ($request->input('action')) {
        case 'save':
            // Save model
            $request->validate([
                'text' => 'required'
            ]);

            Sentence::create($request->all());

            return redirect()->route('sentences.index')
                            ->with('success','Sentence created successfully.');
            break;

        case 'search':
            // Search model
            return redirect()->route('sentences.index', ['key' => $request->input('text')]);
            break;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sentence  $sentence
     * @return \Illuminate\Http\Response
     */
    public function show(Sentence $sentence)
    {
        return view('sentences.show',compact('sentence'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sentence  $sentence
     * @return \Illuminate\Http\Response
     */
    public function edit(Sentence $sentence)
    {
        return view('sentences.edit',compact('sentence'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sentence  $sentence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sentence $sentence)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $sentence->update($request->all());

        return redirect()->route('sentences.index')
                        ->with('success','Sentence updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sentence  $sentence
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sentence = Sentence::find($id);
        $sentence->delete();

        return redirect()->route('sentences.index')
                        ->with('success','Sentence deleted successfully');
    }
}
