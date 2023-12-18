<?php

namespace App\Charts;

use App\Models\PengajuanSuratTugas;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class SuratTugasChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        $suratTugas = PengajuanSuratTugas::get();

        $data = [
            $suratTugas->where('status_surtug', 0)->count(),
            $suratTugas->where('status_surtug', 1)->count(),
            $suratTugas->where('status_surtug', 2)->count(),
        ];

        $label = [
            'Diajukan',
            'Disetujui',
            'Ditolak',
        ];

        return $this->chart->donutChart()
            ->setTitle('')
            ->setSubtitle('')
            ->addData($data)
            ->setLabels($label);
    }
}
