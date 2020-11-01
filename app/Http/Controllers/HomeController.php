<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::with('category')->whereNull('deleted_at')
            ->where('status', 1)
            ->get();
        return view('home', [
            'posts' => $posts
        ]);
    }

    
    public function show($slug)
    {
        $post = Post::with(['category', 'comments', 'user'])
            ->where('slug', $slug)
            ->firstOrFail();
        return view('show', [
            'post' => $post
        ]);
    }
}
