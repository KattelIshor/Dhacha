<?php

namespace App\Interface;

interface DashboardInterface
{
    public function totalSales();
    public function todaysSales();
    public function currentWeekSales();
    public function currentMonthSales();
    public function currentYearSales();
}
