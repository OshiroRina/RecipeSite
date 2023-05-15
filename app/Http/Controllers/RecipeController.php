<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Recipe;
use App\Models\RecipeDetail;
use App\Models\SecondaryCategory;

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
        $categories = Recipe::with('secondary_category','recipe_details')
        ->searchCategory($request->search_category)
        ->searchWord($request->search_word)
        ->get();

        // dd($categories);

        return Inertia::render('User/RecipeSearch', [
            'categories' => $categories,
        ]);

    }

    public function show($id)
    {
        $recipe = Recipe::with('secondary_category','recipe_details')
        ->where('id',$id)
        ->first();

        return Inertia::render('User/RecipeDetail', [
            'recipe' => $recipe,
        ]);
    }
}
