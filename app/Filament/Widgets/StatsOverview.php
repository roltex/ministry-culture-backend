<?php

namespace App\Filament\Widgets;

use App\Models\News;
use App\Models\Project;
use App\Models\Competition;
use App\Models\Vacancy;
use App\Models\Legislation;
use App\Models\SubordinateInstitution;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('ყველა სიახლეები', News::count())
                ->description('გამოქვეყნებული სიახლეები')
                ->descriptionIcon('heroicon-m-newspaper')
                ->color('success')
                ->chart([7, 2, 10, 3, 15, 4, 17]),

            Stat::make('ყველა პროექტები', Project::count())
                ->description('აქტიური პროექტები')
                ->descriptionIcon('heroicon-m-rectangle-stack')
                ->color('info')
                ->chart([17, 16, 14, 15, 14, 13, 12]),

            Stat::make('აქტიური კონკურსები', Competition::where('is_active', true)->count())
                ->description('აქტიური კონკურსები')
                ->descriptionIcon('heroicon-m-trophy')
                ->color('warning')
                ->chart([15, 4, 10, 2, 12, 4, 7]),

            Stat::make('აქტიური ვაკანსიები', Vacancy::where('is_active', true)->count())
                ->description('სამუშაო შესაძლებლობები')
                ->descriptionIcon('heroicon-m-briefcase')
                ->color('danger')
                ->chart([3, 4, 5, 6, 3, 5, 4]),

            Stat::make('სამართლებრივი დოკუმენტები', Legislation::count())
                ->description('გამოქვეყნებული კანონმდებლობა')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('primary')
                ->chart([2, 3, 4, 3, 5, 4, 6]),

            Stat::make('სსიპები', SubordinateInstitution::count())
                ->description('სამინისტროს სსიპები')
                ->descriptionIcon('heroicon-m-building-office')
                ->color('secondary')
                ->chart([8, 9, 10, 11, 12, 13, 14]),

            Stat::make('ადმინისტრატორები', User::where('is_admin', true)->count())
                ->description('ადმინისტრაციული მომხმარებლები')
                ->descriptionIcon('heroicon-m-users')
                ->color('gray')
                ->chart([1, 2, 3, 2, 4, 3, 5]),

            Stat::make('ყველა მომხმარებლები', User::count())
                ->description('რეგისტრირებული მომხმარებლები')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('slate')
                ->chart([5, 6, 7, 8, 9, 10, 11]),
        ];
    }
} 