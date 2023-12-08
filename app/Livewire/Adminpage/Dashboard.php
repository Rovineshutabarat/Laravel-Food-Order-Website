<?php

namespace App\Livewire\Adminpage;

use Livewire\Component;
use App\Charts\AreaChart;
use App\Charts\LineChart;
use App\Charts\DonutChart;
use App\Charts\PieChart;
use Illuminate\Support\Facades\DB;

class Dashboard extends Component
{
    public function render(AreaChart $areaChart, PieChart $pieChart)
    {
        return view(
            'livewire.adminpage.dashboard',
            [
                'areaChart' => $areaChart->build(),
                'pieChart' => $pieChart->build(),
                'total_produk' => DB::table('product')->count(),
                'total_pengguna' => DB::table('user')->count(),
                'total_order' => DB::table('orders')
                    ->where('status', 'Unpaid')
                    ->count(),
                'total_pemasukan' => DB::table('orders')
                    ->where('status', 'Paid')
                    ->sum('amount')
            ]
        );
    }
}
