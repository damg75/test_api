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
    public function create ()
    {
        request()->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required'
        ]);
    
        return Post::create([
            'title' => request('title'),
            'content' => request('content'),
            'category_id' => request('category_id'),
        ]);
    }
    public function update (Request $request, $slug)
    {
        $post = Post::find($slug);
        $success = $post -> update($request->all());
    
        return [
           'success' => $success 
        ]; //JSON
    }
    public function show (Post $post)   
    {
        return Post::find($post);
    }
    public function destroy (Post $post)
    {
        $success = $post -> delete();

        return [
           'success' => $success 
        ]; //JSON
    }
}
