<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostApiController extends Controller
{
    public function index()
    {
        return Post::all();
    }
    public function store (Request $request)
    {
        request()->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
    
        return Post::create($request->all());
    }
    public function update (Request $request, $post)
    {
        $post = Post::find($post);
        $post->update($request->all());
        return $post;
    }
    public function show (Post $post)
    {
        return Post::find($post);
    }
    public function destroy (Post $post)
    {
        return Post::destroy($post);
    }
}
