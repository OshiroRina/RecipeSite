<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;

class AnalysisController extends Controller
{
    public function index()
    {
        //ユーザー登録者国別グラフ用データ
        $countries = User::groupBy('country')->pluck('country');

        $user_count = DB::table('users')
            ->select('users.country', DB::raw("count(users.country) as count"))
            ->groupBy('country')
            ->pluck('count');

        return Inertia::render('Admin/Analysis/Index', [
            'countries' => $countries,
            'user_count' => $user_count
        ]);
    }
}
