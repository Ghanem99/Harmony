<?php

namespace App\Filament\Widgets;

use App\Models\Survey;
use App\Models\Article;
use App\Models\Podcast;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Articles', Article::count())
                ->color('success')
                ->description('All articles in the system')
                ->chart([7, 6, 5, 4, 3, 2, 1]), // TODO: replace with actual date,
            Stat::make('Podcasts', Podcast::count())
                ->color('primary')
                ->description('All podcasts in the system')
                ->chart([1, 2, 3, 4, 5, 6, 7]),
            Stat::make('Surveys', Survey::count())
                ->color('warning')
                ->description('All surveys in the system')
                ->chart([3, 2, 1, 2, 3, 4, 5]),
        ];
    }
}
