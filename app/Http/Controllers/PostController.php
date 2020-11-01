<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $validation_message = [
        'category_id.exists' => 'Category not exists',
        'title.required' => 'Title must be filled',
        'body.required' => 'Content must be filled',
        'body.string' => 'Content must be a text',
        'status.required' => 'Status must be filled',
    ];
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::with('category')->get();
        return view('pages.post.index', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        $categories = Category::whereNull('deleted_at')->get();
        return view('pages.post.create', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'bail|required',
            'body' => 'bail|required|string'
        ], $this->validation_message);

        $payload = $request->only(['category_id', 'title', 'slug', 'body']);
        $payload['user_id'] = auth()->user()->id;
        if (!$payload['slug']) {
            $payload['slug'] = Post::generateSlug($payload['title']);
        } else {
            $payload['slug'] = Post::generateSlug($payload['slug'], false);
        }
        Post::create($payload);
        return redirect()->route('posts');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::whereNull('deleted_at')->get();
        return view('pages.post.edit', [
            'post' => $post,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'bail|required',
            'body' => 'bail|required|string',
            'status' => 'bail|required'
        ], $this->validation_message);

        $payload = $request->only(['category_id', 'title', 'body', 'status']);

        $post = Post::findOrFail($id);
        
        $post->update($payload);
        
        return redirect()->route('posts');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post->delete();

        return redirect()->back();
    }
}
