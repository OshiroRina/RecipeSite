<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Recipe;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/searchRecipes', function (Request $request) {
    return  Recipe::with('primary_category','recipe_details','favorites')
    ->searchCategory($request->search_category)
    ->searchWord($request->search_word)
    ->SearchCategoryAnd($request->primary_category,$request->secondary_category)
    ->orderBy('created_at','desc');
});

Route::post('/favorite', function (Request $request) {

    $favorite_status = "";

    $favorite = Favorite::where('user_id', Auth::id())
        ->where('recipe_id', $request->recipe_id)
        ->first();

    // すでにお気に入り登録している場合は削除する
    if (!empty($favorite)) {
        $favorite_status = "登録済";
    } else {
        // 登録されていない場合はレコード追加
        $favorite_status = "未登録";
    }

    return $favorite_status;
});


// お気に入りボタンを押したときの動作
Route::post('/favorite/create', function (Request $request) {

    // $favorite_status = $request->favorite;
    $user_id = Auth::id();

    $favorite = Favorite::where('user_id', Auth::id())
            ->where('recipe_id', $request->recipe_id)
            ->first();

    // すでにお気に入り登録している場合は削除する
    if (!empty($favorite)) {
        $favorite->delete();
        $favorite_status = "未登録";
    } else {
        // 登録されていない場合はレコード追加
        Favorite::create([
            'user_id' => $user_id,
            'recipe_id' => $request->recipe_id,
        ]);
        $favorite_status = "登録済";
    }
    return $favorite_status;
});
