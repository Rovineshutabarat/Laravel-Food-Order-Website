<?php

namespace App\Livewire\Adminpage;

use App\Charts\AreaChart;
use App\Charts\DonutChart;
use App\Charts\LineChart;
use Livewire\Component;

class Dashboard extends Component
{
    public function render(AreaChart $areaChart, DonutChart $donutChart)
    {
        return view(
            'livewire.adminpage.dashboard',
            [
                'areaChart' => $areaChart->build(),
                'donutChart' => $donutChart->build(),
            ]
        );
    }
}
