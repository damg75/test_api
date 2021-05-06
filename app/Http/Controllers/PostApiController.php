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
            'content' => 'required'
        ]);
    
        return Post::create([
            'title' => request('title'),
            'content' => request('content'),
        ]);
    }
    public function update (Post $post)
    {
        request()->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
        
        $success = $post -> update([
            'title' => request('title'),
            'content' => request('content'),
        ]);
    
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
