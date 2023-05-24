<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Recipe;
use App\Models\RecipeDetail;
use App\Models\SecondaryCategory;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    public function index()
    {
        $secondary_categories = SecondaryCategory::select('id','name')->get();

        return Inertia::render('User/RecipeIndex', [
            'secondary_categories' => $secondary_categories,
        ]);

    }

    public function search(Request $request)
    {
        $categories = Recipe::with('secondary_category','recipe_details','favorites')
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
        $recipe = Recipe::with('secondary_category','recipe_details')
        ->where('id',$id)
        ->first();

        //戻るボタン表示分け
        $pre_url = url()->previous();
        if(strpos($pre_url,'recipeSearch') == true){
            $url = 'recipeSearch';
        }else{
            $url = 'favorite';
        }

        return Inertia::render('User/RecipeDetail', [
            'recipe' => $recipe,
            'url' => $url
        ]);
    }
}
