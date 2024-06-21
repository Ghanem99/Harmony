<?php

namespace App\Filament\Widgets;

use App\Models\Plan;
use App\Models\User;
use App\Models\Breath;
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
                ->description('All Articles in the system')
                ->chart([7, 6, 5, 4, 3, 2, 1]), 
            Stat::make('Podcasts', Podcast::count())
                ->color('primary')
                ->description('All Podcasts in the system')
                ->chart([1, 2, 3, 4, 5, 6, 7]),
            Stat::make('Surveys', Survey::count())
                ->color('warning')
                ->description('All surveys in the system')
                ->chart([3, 2, 1, 2, 3, 4, 5]),
            Stat::make('Users', User::count())
                ->color('warning')
                ->description('All Users in the system')
                ->chart([3, 2, 1, 2, 3, 4, 5]),
            Stat::make('Breaths', Breath::count())
                ->color('warning')
                ->description('All Breaths in the system')
                ->chart([3, 2, 1, 2, 3, 4, 5]),
            Stat::make('Plans', Plan::count())
                ->color('warning')
                ->description('All Generated Plans in the system')
                ->chart([3, 2, 1, 2, 3, 4, 5]),
        ];
    }
}
