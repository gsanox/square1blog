<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Carbon\Carbon;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $order = $request->has('order') ? $request->input('order') : 'asc';
        $posts = Post::orderBy('publication_date', $order)->paginate(5);
        return view('post.index', compact('posts'));
    }

    /**
     * Display a listing of the resource.
     * Own blog posts
     *
     * @return \Illuminate\Http\Response
     */
    public function myPosts(Request $request)
    {
        $order = $request->has('order') ? $request->input('order') : 'asc';
        $posts = Post::orderBy('publication_date', $order)
        ->where('user_id', auth()->user()->id)
        ->paginate(5);
        return view('post.admin', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->publication_date = Carbon::now();
        $post->user_id = auth()->user()->id;
        $post->save();

        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Post::find($id)) {
            $post = Post::find($id)->with('user')->first();
            return view('post.show', compact('post'));
        } else {
            $error = 'Post not found';
            return view('post.show', compact('error'));
        } 
    }

}



