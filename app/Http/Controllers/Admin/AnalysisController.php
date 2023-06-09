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

        // $startDate="2023-05-01";
        // $endDate = "2023-06-31";

        // $periodQuery = User::createdDate($startDate,$endDate)
        // ->groupBy('created_at')
        // ->selectRaw('created_at , count(users.created_at) as count,DATE_FORMAT(created_at,"%Y%m") as date');

        // $data = DB::table($periodQuery)
        // ->groupBy('date')
        // ->selectRaw('date , sum(count) as total')
        // ->get();

        // $labels = $data->pluck('date');
        // $counts = $data->pluck('total');

        // dd($labels,$counts);

        return Inertia::render('Admin/Analysis/Index', [
            'countries' => $countries,
            'user_count' => $user_count,
        ]);
    }
}
