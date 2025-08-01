<?php

namespace App\Filament\Providers;

use Filament\Panel\Panel;
use Filament\Panel\PanelProvider;
use App\Filament\Pages\AboutMinistry;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->pages([
                AboutMinistry::class,
            ]);
    }
} 