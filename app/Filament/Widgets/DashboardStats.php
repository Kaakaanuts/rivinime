<?php

namespace App\Filament\Widgets;

use App\Models\Anime;
use App\Models\Genre;
use App\Models\Studio;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            // Widget Total Anime
            Stat::make('Total Anime', Anime::count()),

            // Widget Total Genre
            Stat::make('Total Genre', Genre::count()),

            // Widget Total Studio
            Stat::make('Total Studio', Studio::count()),
        ];
    }
}
