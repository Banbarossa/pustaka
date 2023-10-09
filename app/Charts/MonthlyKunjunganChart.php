<?php

namespace App\Charts;

use App\Models\Kunjungan;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class MonthlyKunjunganChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $months = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December',
        ];
        $year = date('Y');
        $visitorCounts = Kunjungan::selectRaw('MONTH(created_at) as bulan, COUNT(*) as jumlah_pengunjung')
            ->whereYear('created_at', $year)
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        $data = [];
        $xAxisLabels = [];
        foreach ($months as $index => $month) {
            $found = false;
            foreach ($visitorCounts as $count) {
                if ((int) $count->bulan === ($index + 1)) {
                    $data[] = $count->jumlah_pengunjung;
                    $found = true;
                    break;
                }
            }

            if (!$found) {
                $data[] = 0;
            }

            $xAxisLabels[] = $month;
        }
        return $this->chart->barChart()
            ->setTitle('Visitor Season ' . $year)
            ->addData('Visitor', $data)
            ->setXAxis($xAxisLabels);

    }
}
