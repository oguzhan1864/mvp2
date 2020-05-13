<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class DrawingsController extends Controller
{
    // public function index()
    // {
    //     return view('drawings');
    // }

    public function feed()
    {
        if (Auth::check()) {
            $result = \App\Posts::all();
            return view('drawings', ['posts' => $result]);
        } else {
            return view('drawings');
        }
    }

    public function addPosts(Request $request)
    {
        $post = new \App\Posts;
        $post->content = $request->content;
        $post->save();

        $result = \App\Posts::all();
            return redirect('/drawings');
    }

    public function editPost(Request $request, $id)
    {
        $post = \App\Posts::find($id);
        $post->content = $request->content;
        $post->save();
            return redirect('/drawings');
    }

    public function editForm($id)
    {
        return view ('editForm', ['id' => $id]);

    }

    public function deletePost($id)
    {
        $post = \App\Posts::find($id);
        $post->delete();
        $result = \App\Posts::all();
            return redirect('/drawings');
    }

    function comment(Request $request)
    {
        $comment = new \App\Comments;
        $comment->content = $request->content;
        $comment->save();
            return redirect('/drawings');
    }

    public function like($id)
    {
        $like = new \App\Likes;
        $like->user_id = Auth::id();
        $like->post_id = $id;

        if ($like->save()) {
            return json_encode([
                'status' => 'success'
            ]);

        }
            return json_encode([
                'status' => 'failed'
            ]);
    }

}
