<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\RecipeDetail;
use App\Models\SecondaryCategory;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class FavoriteController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();

        $favorites = Recipe::with('primary_category', 'recipe_details', 'favorites')
            ->whereHas('favorites', function ($query) use ($user_id) {
                $query->where('user_id', $user_id);
            })
            ->get();

        return Inertia::render('User/FavoriteIndex', [
            'favorites' => $favorites,
            'user_id' => $user_id
        ]);
    }
}
