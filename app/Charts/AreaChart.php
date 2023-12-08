<?php

namespace App\Charts;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class AreaChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\AreaChart
    {
        $dateLabels = [];
        $orderCounts = [];

        // Loop through the last 7 days
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i)->startOfDay();
            $formattedDate = $date->format('l');

            $totalPaidOrders = DB::table('orders')
                ->where('status', '=', 'Paid')
                ->whereDate('created_at', $date)
                ->count();

            $dateLabels[] = $formattedDate;
            $orderCounts[] = $totalPaidOrders;
        }

        // Your chart building logic
        return $this->chart->areaChart()
            ->setTitle('Penjualan Minggu Ini')
            ->setHeight(310)
            ->setWidth(580)
            ->setToolbar("Toolbar")
            ->setSubtitle('Data Grafik Penjualan Minggu Ini.')
            ->addData('Total Penjualan : ', $orderCounts)
            ->setXAxis($dateLabels);
    }
}
