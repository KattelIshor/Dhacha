<?php

namespace App\Repositories;

use App\Models\Order;
use Illuminate\Support\Carbon;

class DashboardRepository
{
    public function totalSales()
    {
        return Order::select('amount', 'created_at')
            ->where('status_op', 3)
            ->sum('amount');
    }

    public function todaysSales()
    {
        return Order::select('amount', 'created_at')
            ->whereDate('created_at', date('Y-m-d'))
            ->where('status_op', 3)
            ->sum('amount');
    }

    public function currentWeekSales()
    {
        return Order::select('amount', 'created_at')
            ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->where('status_op', 3)
            ->sum('amount');
    }

    public function currentMonthSales()
    {
        return Order::select('amount', 'created_at')
            ->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->where('status_op', 3)
            ->sum('amount');
    }

    public function currentYearSales()
    {
        return Order::select('amount', 'created_at')
            ->whereYear('created_at', date('Y'))
            ->where('status_op', 3)
            ->sum('amount');
    }
}
