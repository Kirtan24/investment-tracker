<?php

namespace App\Http\Controllers;

use App\Models\Investment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Count by type (Donut Chart)
        $typeCounts = Investment::select('type')
            ->where('user_id', Auth::id())
            ->selectRaw('COUNT(*) as total')
            ->groupBy('type')
            ->pluck('total', 'type');

        // Total amount by type (Bar Chart)
        $amountsByType = Investment::select('type')
            ->where('user_id', Auth::id())
            ->selectRaw('SUM(amount_invested) as total')
            ->groupBy('type')
            ->pluck('total', 'type');

        // Monthly Trend (Line Chart)
        $monthlyData = Investment::selectRaw("DATE_FORMAT(investment_date, '%Y-%m') as month")
            ->where('user_id', Auth::id())
            ->selectRaw('SUM(amount_invested) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month');


        // dd($typeCounts, $amountsByType, $monthlyData);

        return view('pages.dashboard.dashboard', [
            'typeCounts' => $typeCounts,
            'amountsByType' => $amountsByType,
            'monthlyData' => $monthlyData,
        ]);
    }
}
