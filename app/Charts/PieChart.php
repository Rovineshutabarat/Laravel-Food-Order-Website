<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class PieChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        return $this->chart->pieChart()
            ->setTitle('3 Produk Teratas')
            ->addData([40, 50, 30])
            ->setLabels(['Player 7', 'Player 10', 'Player 9']);
    }
}
