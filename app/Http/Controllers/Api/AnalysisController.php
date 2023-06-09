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
        // ユーザー登録月のデータ取得
        $periodQuery = User::createdDate($request->startDate, $request->endDate)
            ->groupBy('created_at')
            ->selectRaw('created_at , count(users.created_at) as count,DATE_FORMAT(created_at,"%Y%m") as date');

        // 月ごとに合計し、グループ化
        $data = DB::table($periodQuery)
            ->groupBy('date')
            ->selectRaw('date , sum(count) as total')
            ->get();

        // グラフ作成用にデータをそれぞれ抽出
        $labels = $data->pluck('date');
        $counts = $data->pluck('total');

        return response()->json([
            'data' => $data,
            'labels' => $labels,
            'counts' => $counts,
        ], Response::HTTP_OK);
    }
}
