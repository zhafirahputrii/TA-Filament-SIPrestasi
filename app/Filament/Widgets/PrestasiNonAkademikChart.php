<?php

namespace App\Filament\Widgets;

use App\Models\PrestasiNonAkademik;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class PrestasiNonAkademikChart extends ChartWidget
{
    protected static ?string $heading = 'Prestasi Non Akademik Chart';

    protected function getData(): array
    {
        $data = Trend::model(PrestasiNonAkademik::class)
        ->between(
            start: now()->startOfYear(),
            end: now()->endOfYear(),
        )
        ->perMonth()
        ->count();
 
    return [
        'datasets' => [
            [
                'label' => 'Prestasi Non Akademik',
                'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
            ],
        ],
        'labels' => $data->map(function(TrendValue $value) {
            $date = Carbon::createFromFormat('Y-m', $value->date);
            $formattedDate = $date->format('M');

            return $formattedDate;
        }),
    ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
