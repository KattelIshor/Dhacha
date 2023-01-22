<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\DashboardRepository;

class DashboardController extends Controller
{
    public $dashboard;

    public function __construct(DashboardRepository $dashboard)
    {
        $this->middleware('auth:admin');
        $this->dashboard = $dashboard;
    }

    public function index()
    {
        $totalSales = $this->dashboard->totalSales();

        $todaysSales = $this->dashboard->todaysSales();

        $currentWeekSales = $this->dashboard->currentWeekSales();

        $currentMonthSales = $this->dashboard->currentMonthSales();

        $currentYearSales = $this->dashboard->currentYearSales();

        return view(
            'backend.dashboard',
            compact(
                'totalSales',
                'todaysSales',
                'currentWeekSales',
                'currentMonthSales',
                'currentYearSales'
            )
        );
    }
}
