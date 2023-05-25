<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Recipe;
use App\Models\RecipeDetail;
use App\Models\PrimaryCategory;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    public function index()
    {
        $primary_categories = PrimaryCategory::select('id','name')->get();

        return Inertia::render('User/RecipeIndex', [
            'primary_categories' => $primary_categories,
        ]);

    }

    public function search(Request $request)
    {
        $categories = Recipe::with('primary_category','recipe_details','favorites')
        ->searchCategory($request->search_category)
        ->searchWord($request->search_word)
        ->get();

        $user_id = Auth::id();

        return Inertia::render('User/RecipeSearch', [
            'categories' => $categories,
            'user_id' => $user_id
        ]);

    }

    public function show($id)
    {
        $recipe = Recipe::with('primary_category','recipe_details')
        ->where('id',$id)
        ->first();

        //戻るボタン表示分け
        $pre_url = url()->previous();
        $url='';
        if(strpos($pre_url,'recipeSearch') == true){
            $url = 'recipeSearch';
        }elseif(strpos($pre_url,'favorite') == true){
            $url = 'favorite';
        }else{
            $url ='';
        }

        return Inertia::render('User/RecipeDetail', [
            'recipe' => $recipe,
            'url' => $url
        ]);
    }
}
