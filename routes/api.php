<?php


use App\Http\Controllers\PostApiController;
use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// Index
// Route::get('/posts', [PostApiController::class, 'index']);
// //New
// Route::post('/posts', [PostApiController::class, 'create']);
// //Update
// Route::put('/posts/{post}', [PostApiController::class, 'update']);
// //Show
// Route::get('/posts/{post}', [PostApiController::class, 'show']);
// //Delete
// Route::delete('/posts/{post}', [PostApiController::class, 'destroy']);

Route::resource('posts',PostApiController::class);
Route::get('/posts/search/{title}', [PostApiController::class, 'search']);

Route::resource('categories',CategoryController::class);
Route::get('categories/{id}/posts', function ($id) {
    $category = Category::findOrFail($id);
    return $category->posts;
});
