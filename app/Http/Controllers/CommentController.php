<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $comments = Comment::with('post')->get();
        return view('pages.comment.index', [
            'comments' => $comments
        ]);
    }

    public function store(Request $request)
    {
        $payload = $request->only(['post_id', 'body', 'is_anonymous']);
        $payload['user_id'] = auth()->user()->id;
        Comment::create($payload);
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {}

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return redirect()->back();
    }
}
