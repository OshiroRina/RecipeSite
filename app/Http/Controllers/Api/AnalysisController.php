<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\RecipeDetail;
use App\Models\SecondaryCategory;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AnalysisController extends Controller
{
    public function index()
    {

        return Inertia::render('User/FavoriteIndex', [
            // 'favorites' => $favorites,
            // 'user_id' => $user_id
        ]);
    }
}
