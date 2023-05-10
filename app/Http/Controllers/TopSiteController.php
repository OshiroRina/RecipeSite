<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Recipe;
use App\Models\RecipeDetail;
use App\Models\SecondaryCategory;

class TopSiteController extends Controller
{
    public function index()
    {
        $secondary_categories = SecondaryCategory::select('id','name')->get();

        return Inertia::render('User/RecipeIndex', [
            'secondary_categories' => $secondary_categories,
        ]);

    }

    public function show(Request $request)
    {
        $categories = Recipe::with('secondary_category','recipe_details')
        ->searchCategory($request->search_category)
        ->get();

        // dd($categories);

        return Inertia::render('User/RecipeDetail', [
            'categories' => $categories,
        ]);

    }
}