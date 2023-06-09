<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class AnalysisController extends Controller
{
    /**
     * ユーザー登録者 登録月取得API
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $startDate="2023-05-01";
        // $endDate = "";

        $periodQuery = User::createdDate($request->startDate, $request->endDate)
            ->groupBy('created_at')
            ->selectRaw('created_at , count(users.created_at) as count,DATE_FORMAT(created_at,"%Y%m") as date');

        $data = DB::table($periodQuery)
            ->groupBy('date')
            ->selectRaw('date , sum(count) as total')
            ->get();
        
        $labels = $data->pluck('date');
        $counts = $data->pluck('total');

        return response()->json([
            'data' => $data,
            'labels' => $labels,
            'counts' => $counts,
        ], Response::HTTP_OK);
    }
}
